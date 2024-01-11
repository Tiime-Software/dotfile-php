<?php

declare(strict_types=1);

namespace Dotfile\Model\Filters\CaseAllInput;

enum StatusOperator: string
{
    case EQUAL = 'eq';
    case NOT_EQUAL = 'not_eq';
    case IN = 'in';
    case NOT_IN = 'not_in';
}
