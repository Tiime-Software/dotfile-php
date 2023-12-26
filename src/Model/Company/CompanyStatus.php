<?php

declare(strict_types=1);

namespace Dotfile\Model\Company;

/**
 * @see https://docs.dotfile.com/reference/company-create-one
 */
enum CompanyStatus: string
{
    case NotReported = 'not_reported';
    case Live = 'live';
    case Closed = 'closed';
}
