<?php

declare(strict_types=1);

namespace Dotfile\Model\Case;

/**
 * @see https://docs.dotfile.com/reference/cases-guide#case-flags
 */
enum CaseFlag: string
{
    /**
     * When applicant has actions for the first time and need to upload documents or verify it’s identity.
     */
    case ForFirstCollect = 'for_first_collect';

    /**
     *  Review is ready for the reviewer, no actions left from the applicant.
     */
    case ForReview = 'for_review';

    /**
     *  Recollection is ready for the applicant because all checks have been reviewed and there are some recollection needed (checks rejected or expired), no actions left from the reviewer.
     */
    case ForRecollection = 'for_recollection';

    /**
     * When there is no actions left from any users and all checks are approved.
     */
    case AllChecksApproved = 'all_checks_approved';
}
