<?php

declare(strict_types=1);

namespace Dotfile\Model\Individual;

use Dotfile\Model\Address;
use Dotfile\Model\BankingInformation;
use Dotfile\Model\Check\Check;

/**
 * A representation of a individual.
 *
 * @see https://docs.dotfile.com/reference/individual-create-one
 * @see https://docs.dotfile.com/reference/individual-get-one
 * @see https://docs.dotfile.com/reference/individual-update-one
 */
class Individual
{
    public string $id;
    public string $caseId;

    /**
     * @var Role[]
     */
    public array $roles;

    public string $firstName;
    public ?string $middleName = null;
    public string $lastName;
    public ?string $maidenName = null;
    public ?string $email = null;
    public ?\DateTimeImmutable $birthDate = null;
    public ?string $birthCountry = null;
    public ?string $birthPlace = null;
    public ?Address $address = null;
    public ?BankingInformation $bankingInformation = null;
    public ?string $taxIdentificationNumber = null;
    public ?string $socialSecurityNumber = null;
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

    /**
     * @var Check[]
     */
    public array $checks = [];

    public \DateTimeImmutable $createdAt;
    public \DateTimeImmutable $updatedAt;
    public \DateTimeImmutable $lastActivityAt;
}
