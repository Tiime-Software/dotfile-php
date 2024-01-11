<?php

declare(strict_types=1);

namespace Dotfile\Model;

class Pagination
{
    /**
     * Current page number.
     */
    public int $page;

    /**
     * Item count per page.
     */
    public int $limit;

    /**
     * Total items count.
     */
    public int $count;
}
