<?php

declare(strict_types=1);

namespace Dotfile\Model\Filters\CaseAllInput;

enum ExternalIdOperator: string
{
    case EQUAL = 'eq';
    case NOT_EQUAL = 'not_eq';
}
