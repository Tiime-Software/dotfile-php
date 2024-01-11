<?php

declare(strict_types=1);

namespace Dotfile\Model\Filters\CaseAllInput;

enum NameOperator: string
{
    case EQ = 'eq';
    case NOT_EQ = 'not_eq';
    case LIKE = 'like';
    case ILIKE = 'ilike';
}
