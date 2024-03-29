<?php

declare(strict_types=1);

namespace Dotfile\Service;

use Dotfile\Exception\DotfileApiException;
use Dotfile\Model\Case\CaseAllInput;
use Dotfile\Model\Case\CaseCreated;
use Dotfile\Model\Case\CaseCreateInput;
use Dotfile\Model\Case\CaseDetailed;
use Dotfile\Model\Case\CaseList;
use Dotfile\Model\Case\CaseTags;
use Dotfile\Model\Case\CaseUpdated;
use Dotfile\Model\Case\CaseUpdateInput;
use Dotfile\Model\Case\RiskLevel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class CaseService extends AbstractService
{
    public function getAll(CaseAllInput $input): CaseList
    {
        $response = $this->client->request(Request::METHOD_GET, 'cases/'.$input->convertToQueryString(), [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);

        $caseList = $this->serializer->deserialize($this->getContent($response), CaseList::class, 'json');

        foreach ($caseList->data as $case) {
            if (null !== $case->risk) {
                if (RiskLevel::NotDefined === $case->risk->level) {
                    $case->risk = null;
                }
            }
        }

        return $caseList;
    }

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

    public function update(string $caseId, CaseUpdateInput $input): CaseUpdated
    {
        $body = $this->serializer->serialize($input, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $response = $this->client->request(Request::METHOD_PATCH, 'cases/'.$caseId, [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => $body,
        ]);

        $caseUpdated = $this->serializer->deserialize($this->getContent($response), CaseUpdated::class, 'json');

        if (null !== $caseUpdated->risk) {
            if (RiskLevel::NotDefined === $caseUpdated->risk->level) {
                $caseUpdated->risk = null;
            }
        }

        return $caseUpdated;
    }

    public function get(string $caseId): CaseDetailed
    {
        $response = $this->client->request(Request::METHOD_GET, 'cases/'.$caseId, [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);

        $caseDetailed = $this->serializer->deserialize($this->getContent($response), CaseDetailed::class, 'json');

        if (null !== $caseDetailed->risk) {
            if (RiskLevel::NotDefined === $caseDetailed->risk->level) {
                $caseDetailed->risk = null;
            }
        }

        return $caseDetailed;
    }

    public function delete(string $caseId): void
    {
        $response = $this->client->request(Request::METHOD_DELETE, 'cases/'.$caseId, [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);

        $this->getContent($response);
    }

    public function getTags(string $caseId): CaseTags
    {
        $response = $this->client->request(Request::METHOD_GET, 'cases/'.$caseId.'/tags', [
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
