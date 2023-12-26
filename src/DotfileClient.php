<?php

declare(strict_types=1);

namespace Dotfile;

use Dotfile\Service\CaseService;
use Dotfile\Service\CompanyService;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\BackedEnumNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class DotfileClient
{
    public readonly CaseService $case;
    public readonly CompanyService $company;

    public function __construct(
        HttpClientInterface $httpClient,
        SerializerInterface $serializer = null,
    ) {
        $encoder = [new JsonEncoder()];
        $extractor = new PropertyInfoExtractor([], [new PhpDocExtractor(), new ReflectionExtractor()]);
        $normalizer = [
            new BackedEnumNormalizer(),
            new ArrayDenormalizer(),
            new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter(), null, $extractor),
        ];

        $serializer = new Serializer($normalizer, $encoder);

        $this->case = new CaseService($httpClient, $serializer);
        $this->company = new CompanyService($httpClient, $serializer);
    }

    public static function createFromApiKey(string $apiKey): self
    {
        return new self(HttpClient::createForBaseUri('https://api.dotfile.com/v1/', [
            'headers' => [
                'X-DOTFILE-API-KEY' => $apiKey,
                'accept' => 'application/json',
            ],
        ]));
    }
}
