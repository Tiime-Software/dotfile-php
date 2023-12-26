<?php

declare(strict_types=1);

namespace App\Tests\UnitTests;

use Dotfile\DotfileClient;
use Dotfile\Service\CaseService;
use Dotfile\Service\CompanyService;
use PHPUnit\Framework\TestCase;

class DotfileClientTest extends TestCase
{
    public function testInstanciation(): void
    {
        $client = DotfileClient::createFromApiKey('FAKE_API_KEY');

        $this->assertInstanceOf(DotfileClient::class, $client);
        $this->assertInstanceOf(CaseService::class, $client->case);
        $this->assertInstanceOf(CompanyService::class, $client->company);
    }
}
