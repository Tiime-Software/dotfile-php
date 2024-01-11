<?php

declare(strict_types=1);

namespace Dotfile\Model\Filters\CaseAllInput;

enum StatusOperator: string
{
    case EQ = 'eq';
    case NOT_EQ = 'not_eq';
    case IN = 'in';
    case NOT_IN = 'not_in';
}
