<?php

declare(strict_types=1);

namespace Dotfile\Tests\FunctionalTests;

use Dotfile\DotfileClient;
use Dotfile\Model\Case\CaseStatus;
use Dotfile\Model\Case\CaseUpdated;
use Dotfile\Model\Case\CaseUpdateInput;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class CaseUpdateTest extends TestCase
{
    public function testCaseUpdateWithMinimumValidData(): void
    {
        $client = new DotfileClient(new MockHttpClient([
            new MockResponse((string) file_get_contents(__DIR__.'/../fixtures/case_update_with_minimal_data_response.json')),
        ]));

        $input = new CaseUpdateInput();
        $input->name = 'Update case informations from tests';
        $input->status = CaseStatus::Rejected;
        $input->externalId = '0101596';
        $input->metadata = ['metadata_key1' => 'metadata_value1'];

        $caseUpdated = $client->case->update('fd69915d-4f0e-4003-a052-4db596cf090a', $input);

        $this->assertInstanceOf(CaseUpdated::class, $caseUpdated);
        $this->assertSame('Update case informations from tests', $caseUpdated->name);
        $this->assertSame(CaseStatus::Rejected, $caseUpdated->status);
        $this->assertSame('0101596', $caseUpdated->externalId);
        $this->assertNull($caseUpdated->templateId);
        $this->assertSame([], $caseUpdated->flags);
        $this->assertSame([], $caseUpdated->tags);
        $this->assertNull($caseUpdated->risk);
        $this->assertSame(['metadata_key1' => 'metadata_value1'], $caseUpdated->metadata);
        $this->assertSame(['a_custom_property' => null], $caseUpdated->customProperties);
        $this->assertInstanceOf(\DateTimeImmutable::class, $caseUpdated->createdAt);
        $this->assertInstanceOf(\DateTimeImmutable::class, $caseUpdated->updatedAt);
        $this->assertInstanceOf(\DateTimeImmutable::class, $caseUpdated->lastActivityAt);
    }
}
