<?php

declare(strict_types=1);

namespace Dotfile\Model\Company;

use Dotfile\Model\Address;
use Dotfile\Model\BankingInformation;
use Dotfile\Model\Check\Check;
use Dotfile\Model\CompanyData\DocumentOrder;

/**
 * A representation of a company.
 *
 * @see https://docs.dotfile.com/reference/company-create-one
 * @see https://docs.dotfile.com/reference/company-get-one
 * @see https://docs.dotfile.com/reference/company-update-one
 */
class Company
{
    public string $id;
    public string $caseId;
    public string $name;
    public ?string $commercialName = null;
    public string $registrationNumber;
    public ?\DateTimeImmutable $registrationDate = null;
    public ?CompanyStatus $status = null;
    public ?string $legalForm = null;

    /**
     * ISO 3166-1 alpha-2 country code (eg FR).
     */
    public string $country;

    public Address $address;

    /**
     * @var Classification[]|null
     */
    public ?array $classifications = null;

    public BankingInformation $bankingInformation;

    public ?string $shareCapital = null;
    public ?string $taxIdentificationNumber = null;
    public ?string $websiteUrl = null;
    public ?string $employerIdentificationNumber = null;

    /**
     * Optional custom properties in a format of key (string) / value (string|boolean|[string]|null) for this company.
     *
     * @see https://docs.dotfile.com/reference/cases-guide#custom-properties
     *
     * @var array<string, string|boolean|string[]|null>
     */
    public ?array $customProperties = null;

    /**
     * @var DocumentOrder[]
     */
    public array $documentOrders;

    /**
     * @var Check[]
     */
    public array $checks = [];

    public \DateTimeImmutable $createdAt;
    public \DateTimeImmutable $updatedAt;
    public \DateTimeImmutable $lastActivityAt;
}
