<?php

declare(strict_types=1);

namespace Dotfile\Tests\FunctionalTests;

use Dotfile\DotfileClient;
use Dotfile\Model\Case\CaseAllInput;
use Dotfile\Model\Case\CaseList;
use Dotfile\Model\Case\CaseMinimal;
use Dotfile\Model\Pagination;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class CaseGetAllTest extends TestCase
{
    public function testCaseGet(): void
    {
        $client = new DotfileClient(new MockHttpClient([
            new MockResponse((string) file_get_contents(__DIR__.'/../fixtures/case_get_all_with_minimal_data_response.json')),
        ]));

        $caseList = $client->case->getAll(new CaseAllInput());

        $this->assertInstanceOf(CaseList::class, $caseList);

        $this->assertIsArray($caseList->data);
        $this->assertCount(3, $caseList->data);

        $this->assertInstanceOf(CaseMinimal::class, $caseList->data[0]);
        $this->assertInstanceOf(CaseMinimal::class, $caseList->data[1]);
        $this->assertInstanceOf(CaseMinimal::class, $caseList->data[2]);

        $this->assertInstanceOf(Pagination::class, $caseList->pagination);
        $this->assertIsInt($caseList->pagination->count);
        $this->assertIsInt($caseList->pagination->page);
        $this->assertIsInt($caseList->pagination->limit);
    }
}
