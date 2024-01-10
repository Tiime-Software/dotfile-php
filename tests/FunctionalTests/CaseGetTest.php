<?php

declare(strict_types=1);

namespace Dotfile\Tests\FunctionalTests;

use Dotfile\DotfileClient;
use Dotfile\Model\Case\CaseDetailed;
use Dotfile\Model\Case\CaseFlag;
use Dotfile\Model\Case\CaseStatus;
use Dotfile\Model\Company\Company;
use Dotfile\Model\Individual\Individual;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class CaseGetTest extends TestCase
{
    public function testCaseUpdateWithMinimumValidData(): void
    {
        $client = new DotfileClient(new MockHttpClient([
            new MockResponse((string) file_get_contents(__DIR__.'/../fixtures/case_get_with_minimal_data_response.json')),
        ]));

        $caseDetailed = $client->case->get('946a9af4-67ff-44e6-a0dc-a73e022365ff');

        $this->assertInstanceOf(CaseDetailed::class, $caseDetailed);
        $this->assertSame('946a9af4-67ff-44e6-a0dc-a73e022365ff', $caseDetailed->id);
        $this->assertSame('A case created from tests', $caseDetailed->name);
        $this->assertSame(CaseStatus::Open, $caseDetailed->status);
        $this->assertSame('06042010', $caseDetailed->externalId);
        $this->assertSame('78bb7107-afd9-4681-9093-42ead2c14f68', $caseDetailed->templateId);
        $this->assertCount(1, $caseDetailed->flags);
        $this->assertSame(CaseFlag::ForFirstCollect, $caseDetailed->flags[0]);
        $this->assertCount(1, $caseDetailed->tags);
        $this->assertSame('A faire', $caseDetailed->tags[0]);
        $this->assertNull($caseDetailed->risk);
        $this->assertSame(['metadata_key1' => 'metadata_value1'], $caseDetailed->metadata);
        $this->assertSame(['a_custom_property' => null], $caseDetailed->customProperties);
        $this->assertInstanceOf(\DateTimeImmutable::class, $caseDetailed->createdAt);
        $this->assertInstanceOf(\DateTimeImmutable::class, $caseDetailed->updatedAt);
        $this->assertInstanceOf(\DateTimeImmutable::class, $caseDetailed->lastActivityAt);

        $this->assertCount(1, $caseDetailed->individuals);
        $this->assertInstanceOf(Individual::class, $caseDetailed->individuals[0]);
        $this->assertSame('fae4446d-915f-4417-9412-895f07edf37d', $caseDetailed->individuals[0]->id);
        $this->assertSame('946a9af4-67ff-44e6-a0dc-a73e022365ff', $caseDetailed->individuals[0]->caseId);
        $this->assertSame('IndividualFirstName', $caseDetailed->individuals[0]->firstName);
        $this->assertSame('IndividualLastName', $caseDetailed->individuals[0]->lastName);

        $this->assertCount(1, $caseDetailed->companies);
        $this->assertInstanceOf(Company::class, $caseDetailed->companies[0]);
        $this->assertSame('a5569aaa-fd71-494c-895c-c374a4470a86', $caseDetailed->companies[0]->id);
        $this->assertSame('946a9af4-67ff-44e6-a0dc-a73e022365ff', $caseDetailed->companies[0]->caseId);
        $this->assertSame('CompanyA', $caseDetailed->companies[0]->name);
        $this->assertNull($caseDetailed->companies[0]->commercialName);
    }
}
