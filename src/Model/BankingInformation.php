<?php

declare(strict_types=1);

namespace Dotfile\Model;

/**
 * Used in company or individuals creation.
 *
 * @see https://docs.dotfile.com/reference/company-create-one
 * @see https://docs.dotfile.com/reference/individual-create-one
 */
class BankingInformation
{
    /**
     * ISO 13616 IBAN (eg: IE12BOFI90000112345678).
     */
    public ?string $iban = null;

    /**
     * ISO 9362 BIC (eg: DEUTDEFF).
     */
    public ?string $bic = null;
}
