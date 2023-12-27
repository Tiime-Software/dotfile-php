<?php

declare(strict_types=1);

namespace App\Tests\FunctionalTests;

use Dotfile\DotfileClient;
use Dotfile\Model\Address;
use Dotfile\Model\BankingInformation;
use Dotfile\Model\Company\Company;
use Dotfile\Model\Company\CompanyCreateInput;
use Dotfile\Model\Company\CompanyStatus;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class CompanyCreateTest extends TestCase
{
    public function testCompanyCreateWithMinimumValidData(): void
    {
        $client = new DotfileClient(new MockHttpClient([
            new MockResponse((string) file_get_contents(__DIR__.'/../fixtures/company_create_with_minimal_data_response.json')),
        ]));

        $input = new CompanyCreateInput();
        $input->caseId = '39cbd6d5-4da5-4d94-ae71-84895c5e552a';
        $input->name = 'A new company created from tests';
        $input->registrationNumber = '02513194000022';
        $input->country = 'FR';

        $company = $client->company->create($input);

        $this->assertInstanceOf(Company::class, $company);
        $this->assertSame('39cbd6d5-4da5-4d94-ae71-84895c5e552a', $company->caseId);
        $this->assertSame('A new company created from tests', $company->name);
        $this->assertNull($company->commercialName);
        $this->assertSame('02513194000022', $company->registrationNumber);
        $this->assertNull($company->registrationDate);
        $this->assertSame(CompanyStatus::NotReported, $company->status);
        $this->assertNull($company->legalForm);
        $this->assertSame('FR', $company->country);
        $this->assertInstanceOf(Address::class, $company->address);
        $this->assertNull($company->address->streetAddress);
        $this->assertNull($company->address->streetAddress2);
        $this->assertNull($company->address->postalCode);
        $this->assertNull($company->address->city);
        $this->assertNull($company->address->state);
        $this->assertNull($company->address->region);
        $this->assertNull($company->address->country);
        $this->assertInstanceOf(BankingInformation::class, $company->bankingInformation);
        $this->assertNull($company->bankingInformation->iban);
        $this->assertNull($company->bankingInformation->bic);
        $this->assertNull($company->shareCapital);
        $this->assertNull($company->taxIdentificationNumber);
        $this->assertNull($company->websiteUrl);
        $this->assertNull($company->employerIdentificationNumber);
        $this->assertSame(['a_custom_property' => null], $company->customProperties);
        $this->assertSame([], $company->checks);
        $this->assertInstanceOf(\DateTimeImmutable::class, $company->createdAt);
        $this->assertInstanceOf(\DateTimeImmutable::class, $company->updatedAt);
        $this->assertInstanceOf(\DateTimeImmutable::class, $company->lastActivityAt);
    }
}
