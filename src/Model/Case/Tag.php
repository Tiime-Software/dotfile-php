<?php

declare(strict_types=1);

namespace Dotfile\Model\Case;

/**
 * Response when a tag has been added to a case.
 *
 * @see https://docs.dotfile.com/reference/case-tag-create-case-tags
 */
class Tag
{
    public string $id;

    public string $label;
}
