<?php

declare(strict_types=1);

namespace Dotfile\Service;

use Dotfile\Model\Individual\Individual;
use Dotfile\Model\Individual\IndividualCreateInput;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

class IndividualService extends AbstractService
{
    public function create(IndividualCreateInput $input): Individual
    {
        $body = $this->serializer->serialize($input, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $response = $this->client->request(Request::METHOD_POST, 'individuals', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => $body,
        ]);

        return $this->serializer->deserialize($this->getContent($response), Individual::class, 'json');
    }
}
