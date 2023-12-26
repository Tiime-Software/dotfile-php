<?php

declare(strict_types=1);

namespace App\Tests\FunctionalTests;

use Dotfile\DotfileClient;
use Dotfile\Model\Case\CaseCreated;
use Dotfile\Model\Case\CaseCreateInput;
use Dotfile\Model\Case\CaseStatus;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class CaseCreateTest extends TestCase
{
    public function testCaseCreateWithMinimumValidData(): void
    {
        $client = new DotfileClient(new MockHttpClient([
            new MockResponse((string) file_get_contents(__DIR__.'/../fixtures/case_create_with_minimal_data_response.json')),
        ]));

        $input = new CaseCreateInput();
        $input->name = 'A new case created from tests';

        $caseCreated = $client->case->create($input);

        $this->assertInstanceOf(CaseCreated::class, $caseCreated);
        $this->assertSame('A new case created from tests', $caseCreated->name);
        $this->assertSame(CaseStatus::Open, $caseCreated->status);
        $this->assertNull($caseCreated->externalId);
        $this->assertNull($caseCreated->templateId);
        $this->assertSame([], $caseCreated->flags);
        $this->assertSame([], $caseCreated->tags);
        $this->assertNull($caseCreated->risk);
        $this->assertNull($caseCreated->metadata);
        $this->assertSame(['a_custom_property' => null], $caseCreated->customProperties);
        $this->assertInstanceOf(\DateTimeImmutable::class, $caseCreated->createdAt);
        $this->assertInstanceOf(\DateTimeImmutable::class, $caseCreated->updatedAt);
        $this->assertInstanceOf(\DateTimeImmutable::class, $caseCreated->lastActivityAt);
    }
}
