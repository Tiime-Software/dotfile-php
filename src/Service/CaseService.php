<?php

declare(strict_types=1);

namespace Dotfile\Service;

use Dotfile\Exception\DotfileApiException;
use Dotfile\Model\Case\CaseCreated;
use Dotfile\Model\Case\CaseCreateInput;
use Dotfile\Model\Case\CaseTags;
use Dotfile\Model\Case\RiskLevel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

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

    public function getTags(string $caseId): CaseTags
    {
        $response = $this->client->request(Request::METHOD_DELETE, 'cases/'.$caseId.'/tags', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);

        return $this->serializer->deserialize($this->getContent($response), CaseTags::class, 'json');
    }

    /**
     * @param array<string> $tags
     *
     * @throws DotfileApiException
     * @throws TransportExceptionInterface
     */
    public function addTags(string $caseId, array $tags): CaseTags
    {
        $body = $this->serializer->serialize(['tags' => $tags], 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $response = $this->client->request(Request::METHOD_POST, 'cases/'.$caseId.'/tags', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => $body,
        ]);

        return $this->serializer->deserialize($this->getContent($response), CaseTags::class, 'json');
    }

    /**
     * @param array<string> $tags
     *
     * @throws DotfileApiException
     * @throws TransportExceptionInterface
     */
    public function removeTags(string $caseId, array $tags): CaseTags
    {
        $body = $this->serializer->serialize(['tags' => $tags], 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $response = $this->client->request(Request::METHOD_DELETE, 'cases/'.$caseId.'/tags', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => $body,
        ]);

        return $this->serializer->deserialize($this->getContent($response), CaseTags::class, 'json');
    }
}
