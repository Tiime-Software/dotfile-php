<?php

declare(strict_types=1);

namespace Dotfile\Model\Individual;

use Dotfile\Model\Address;
use Dotfile\Model\BankingInformation;

/**
 * Input used to create an individual.
 *
 * @see https://docs.dotfile.com/reference/individual-create-one
 */
class IndividualCreateInput
{
    /**
     * Case id where the individual is created.
     */
    public string $caseId;

    /**
     * @var Role[]
     */
    public array $roles;

    public string $firstName;

    /**
     * May contain multiple middle names.
     */
    public ?string $middleName = null;

    public string $lastName;

    public ?string $maidenName = null;

    /**
     * Required if individual has role applicant.
     * Must be a valid email as defined in the HTML spec (eg. must match the following JavaScript-compatible regular expression: /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/).
     */
    public ?string $email = null;

    /**
     * Date in format ISO 8601(yyyy-MM-dd eg 2023-01-31).
     */
    public ?\DateTimeImmutable $birthDate = null;

    /**
     * ISO 3166-1 alpha-2 country code (eg FR).
     */
    public ?string $birthCountry = null;
    public ?string $birthPlace = null;
    public ?Address $address = null;
    public ?BankingInformation $bankingInformation = null;
    public ?string $taxIdentificationNumber = null;
    public ?string $socialSecurityNumber = null;

    /**
     * E.164 phoneNumber (eg +XXXXXXXXXXX).
     */
    public ?string $phoneNumber = null;
    public ?string $position = null;
    public ?float $ownershipPercentage = null;

    /**
     * Optional custom properties in a format of key (string) / value (string|boolean|[string]|null) for this individual.
     *
     * @see https://docs.dotfile.com/reference/cases-guide#custom-properties
     *
     * @var array<string, string|boolean|string[]|null>
     */
    public ?array $customProperties = null;
}
