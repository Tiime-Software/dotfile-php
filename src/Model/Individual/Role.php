<?php

declare(strict_types=1);

namespace Dotfile\Model\Individual;

/**
 * @see https://docs.dotfile.com/reference/individual-create-one
 */
enum Role: string
{
    case Applicant = 'applicant';
    case BeneficialOwner = 'beneficial_owner';
    case LegalRepresentative = 'legal_representative';
    case Shareholder = 'shareholder';
}
