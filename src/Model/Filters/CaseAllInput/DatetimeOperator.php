<?php

declare(strict_types=1);

namespace Dotfile\Model\Filters\CaseAllInput;

enum DatetimeOperator: string
{
    case EQUAL = 'eq';
    case NOT_EQUAL = 'not_eq';
    case GREATER_THAN = 'gt';
    case GREATER_THAN_OR_EQUAL = 'gte';
    case LESS_THAN = 'lt';
    case LESS_THAN_OR_EQUAL = 'lte';
}
