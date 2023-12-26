<?php

declare(strict_types=1);

namespace Dotfile\Model\Company;

/**
 * May be used to create a company.
 *
 * @see https://docs.dotfile.com/reference/company-create-one
 */
class Classification
{
    public string $type;
    public string $code;
    public ?string $description = null;
}
