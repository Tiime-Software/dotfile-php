<?php

declare(strict_types=1);

namespace Dotfile\Service;

use Dotfile\Model\Company\Company;
use Dotfile\Model\Company\CompanyCreateInput;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

class CompanyService extends AbstractService
{
    public function create(CompanyCreateInput $input): Company
    {
        $body = $this->serializer->serialize($input, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $response = $this->client->request(Request::METHOD_POST, 'companies', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => $body,
        ]);

        return $this->serializer->deserialize($this->getContent($response), Company::class, 'json');
    }
}
