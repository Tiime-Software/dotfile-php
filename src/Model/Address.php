<?php

declare(strict_types=1);

namespace Dotfile\Model;

/**
 * Used in company or individuals creation.
 *
 * @see https://docs.dotfile.com/reference/company-create-one
 * @see https://docs.dotfile.com/reference/individual-create-one
 */
class Address
{
    public ?string $streetAddress = null;
    public ?string $streetAddress2 = null;
    public ?string $postalCode = null;
    public ?string $city = null;
    public ?string $state = null;
    public ?string $region = null;
    /**
     * ISO 3166-1 alpha-2 country code (eg FR).
     */
    public ?string $country = null;
}
