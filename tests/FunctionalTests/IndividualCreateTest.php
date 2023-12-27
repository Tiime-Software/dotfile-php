<?php

declare(strict_types=1);

namespace App\Tests\FunctionalTests;

use Dotfile\DotfileClient;
use Dotfile\Model\Address;
use Dotfile\Model\BankingInformation;
use Dotfile\Model\Individual\Individual;
use Dotfile\Model\Individual\IndividualCreateInput;
use Dotfile\Model\Individual\Role;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class IndividualCreateTest extends TestCase
{
    public function testIndividualCreateWithMinimumValidData(): void
    {
        $client = new DotfileClient(new MockHttpClient([
            new MockResponse((string) file_get_contents(__DIR__.'/../fixtures/individual_create_with_minimal_data_response.json')),
        ]));

        $input = new IndividualCreateInput();
        $input->caseId = '39cbd6d5-4da5-4d94-ae71-84895c5e552a';
        $input->roles = [Role::Shareholder];
        $input->firstName = 'Rosa';
        $input->lastName = 'Parks';

        $individual = $client->individual->create($input);

        $this->assertInstanceOf(Individual::class, $individual);
        $this->assertSame('39cbd6d5-4da5-4d94-ae71-84895c5e552a', $individual->caseId);
        $this->assertSame([Role::Shareholder], $individual->roles);
        $this->assertSame('Rosa', $individual->firstName);
        $this->assertNull($individual->middleName);
        $this->assertSame('Parks', $individual->lastName);
        $this->assertNull($individual->maidenName);
        $this->assertNull($individual->email);
        $this->assertNull($individual->birthDate);
        $this->assertNull($individual->birthCountry);
        $this->assertNull($individual->birthPlace);
        $this->assertInstanceOf(Address::class, $individual->address);
        $this->assertNull($individual->address->streetAddress);
        $this->assertNull($individual->address->streetAddress2);
        $this->assertNull($individual->address->postalCode);
        $this->assertNull($individual->address->city);
        $this->assertNull($individual->address->state);
        $this->assertNull($individual->address->region);
        $this->assertNull($individual->address->country);
        $this->assertInstanceOf(BankingInformation::class, $individual->bankingInformation);
        $this->assertNull($individual->bankingInformation->iban);
        $this->assertNull($individual->bankingInformation->bic);
        $this->assertNull($individual->taxIdentificationNumber);
        $this->assertNull($individual->socialSecurityNumber);
        $this->assertNull($individual->phoneNumber);
        $this->assertNull($individual->position);
        $this->assertNull($individual->ownershipPercentage);
        $this->assertSame(['a_custom_property' => null], $individual->customProperties);
        $this->assertSame([], $individual->checks);
        $this->assertInstanceOf(\DateTimeImmutable::class, $individual->createdAt);
        $this->assertInstanceOf(\DateTimeImmutable::class, $individual->updatedAt);
        $this->assertInstanceOf(\DateTimeImmutable::class, $individual->lastActivityAt);
    }
}
