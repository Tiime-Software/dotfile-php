<?php

declare(strict_types=1);

namespace Dotfile\Tests\FunctionalTests;

use Dotfile\DotfileClient;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class CaseDeleteTest extends TestCase
{
    public function testCaseDelete(): void
    {
        $client = new DotfileClient(new MockHttpClient([
            new MockResponse(info: ['http_code' => 204]),
        ]));

        $client->case->delete('946a9af4-67ff-44e6-a0dc-a73e022365ff');

        $this->assertTrue(true);
    }
}
