<?php

declare(strict_types=1);

namespace Dotfile\Model\Company;

use Dotfile\Model\Address;
use Dotfile\Model\BankingInformation;

/**
 * Input used to create a company.
 *
 * @see https://docs.dotfile.com/reference/company-create-one
 */
class CompanyCreateInput
{
    /**
     * Case id where the company is created.
     */
    public string $caseId;

    /**
     * Name for the company (at most 160 characters).
     */
    public string $name;

    /**
     * Commercial name for the company (at most 160 characters).
     */
    public ?string $commercialName = null;

    public string $registrationNumber;

    /**
     * Date in format ISO 8601(yyyy-MM-dd eg 2023-01-31).
     */
    public ?\DateTimeImmutable $registrationDate = null;

    /**
     * Default: not_reported.
     */
    public ?CompanyStatus $status = null;

    public ?string $legalForm = null;

    /**
     * ISO 3166-1 alpha-2 country code (eg FR).
     */
    public string $country;

    public ?Address $address = null;

    /**
     * @var Classification[]|null
     */
    public ?array $classifications = null;

    public ?BankingInformation $bankingInformation = null;

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
}
