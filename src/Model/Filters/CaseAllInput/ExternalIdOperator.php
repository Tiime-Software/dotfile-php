<?php

declare(strict_types=1);

namespace Dotfile\Model\Filters\CaseAllInput;

enum ExternalIdOperator: string
{
    case EQ = 'eq';
    case NOT_EQ = 'not_eq';
}
