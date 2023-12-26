<?php

declare(strict_types=1);

namespace App\Tests\DotfileClientTest;

use Dotfile\DotfileClient;
use PHPUnit\Framework\TestCase;

class DotfileClientTest extends TestCase
{
    public function testInstanciation(): void
    {
        $client = new DotfileClient();

        $this->assertInstanceOf(DotfileClient::class, $client);
    }
}
