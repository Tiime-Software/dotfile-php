<?php

declare(strict_types=1);

namespace Dotfile\Model\Filters\CaseAllInput;

enum NameOperator: string
{
    case EQUAL = 'eq';
    case NOT_EQUAL = 'not_eq';
    case LIKE = 'like';
    case ILIKE = 'ilike';
}
