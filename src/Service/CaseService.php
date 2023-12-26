<?php

declare(strict_types=1);

namespace Dotfile\Service;

use Dotfile\Model\Case\CaseCreated;
use Dotfile\Model\Case\CaseCreateInput;
use Dotfile\Model\Case\RiskLevel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

class CaseService extends AbstractService
{
    public function create(CaseCreateInput $input): CaseCreated
    {
        $body = $this->serializer->serialize($input, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $response = $this->client->request(Request::METHOD_POST, 'cases', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => $body,
        ]);

        $caseCreated = $this->serializer->deserialize($this->getContent($response), CaseCreated::class, 'json');

        if (null !== $caseCreated->risk) {
            if (RiskLevel::NotDefined === $caseCreated->risk->level) {
                $caseCreated->risk = null;
            }
        }

        return $caseCreated;
    }
}
