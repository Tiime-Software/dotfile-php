<?php

declare(strict_types=1);

namespace Dotfile\Model\Filters\CaseAllInput;

enum DatetimeOperator: string
{
    case EQ = 'eq';
    case NOT_EQ = 'not_eq';
    case GT = 'gt';
    case GTE = 'gte';
    case LT = 'lt';
    case LTE = 'lte';
}
