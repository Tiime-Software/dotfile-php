<?php

declare(strict_types=1);

namespace Dotfile\Model\Case;

/**
 * @see https://docs.dotfile.com/reference/cases-guide#risk-object
 */
enum RiskLevel: string
{
    /**
     * @deprecated Should not be used anymore!
     * @see https://docs.dotfile.com/reference/case-create-one
     */
    case NotDefined = 'not_defined';

    case Low = 'low';
    case Medium = 'medium';
    case High = 'high';
    case Prohibited = 'prohibited';
}
