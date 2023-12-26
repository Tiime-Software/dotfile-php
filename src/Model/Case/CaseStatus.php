<?php

declare(strict_types=1);

namespace Dotfile\Model\Case;

/**
 * @see https://docs.dotfile.com/reference/cases-guide#case-lifecycle
 */
enum CaseStatus: string
{
    /**
     * Entities in the case are under investigation, we collect document, process data, ask questions to them and review all information.
     */
    case Open = 'open';

    /**
     * Everything is approved, we have process and review all checks are approved. The case (customer) is verified and ready to access your service.
     */
    case Approved = 'approved';

    /**
     * Some checks are rejected and the case (customer) is identify as not compliant and cannot access your service.
     */
    case Rejected = 'rejected';
}
