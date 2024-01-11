<?php

declare(strict_types=1);

namespace Dotfile\Model\Filters\CaseAllInput;

enum SortOperator: string
{
    case UPDATED_AT = 'updated_at';
    case CREATED_AT = 'created_at';
    case LAST_ACTIVITY_AT = 'last_activity_at';
    case NAME = 'name';
}
