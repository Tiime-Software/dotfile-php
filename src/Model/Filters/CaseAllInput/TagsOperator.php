<?php

declare(strict_types=1);

namespace Dotfile\Model\Filters\CaseAllInput;

enum TagsOperator: string
{
    case ARRAY_CONTAINS = 'array_contains';
    case ARRAY_NOT_CONTAINS = 'array_not_contains';
    case ARRAY_OVERLAP = 'array_overlap';
}
