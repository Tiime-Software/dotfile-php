<?php

declare(strict_types=1);

namespace Dotfile\Model\Case;

use Dotfile\Model\Pagination;

class CaseList
{
    /**
     * @var CaseMinimal[]
     */
    public array $data;

    public Pagination $pagination;
}
