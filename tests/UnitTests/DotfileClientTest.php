<?php

declare(strict_types=1);

namespace App\Tests\UnitTests;

use Dotfile\DotfileClient;
use Dotfile\Service\CaseService;
use PHPUnit\Framework\TestCase;

class DotfileClientTest extends TestCase
{
    public function testInstanciation(): void
    {
        $client = DotfileClient::createFromApiKey('FAKE_API_KEY');

        $this->assertInstanceOf(DotfileClient::class, $client);
        $this->assertInstanceOf(CaseService::class, $client->case);
    }
}
