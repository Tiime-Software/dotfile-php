<?php

declare(strict_types=1);

namespace Dotfile\Model\Check;

/**
 * @see https://docs.dotfile.com/reference/checks-guide#check-status
 */
enum CheckStatus: string
{
    /**
     * The check data are ready to be submitted via the API, Console App or the Case portal.
     */
    case InProgress = 'in_progress';

    /**
     * The submitted data of the check are being processed and validated.
     */
    case Processing = 'processing';

    /**
     * The check needs to be reviewed manually on the Console App.
     */
    case NeedReview = 'need_review';

    /**
     * The check has been approved.
     */
    case Approved = 'approved';

    /**
     * The check has been rejected.
     */
    case Rejected = 'rejected';

    /**
     * The check has expired (the expiration date has been reached).
     */
    case Expired = 'expired';
}
