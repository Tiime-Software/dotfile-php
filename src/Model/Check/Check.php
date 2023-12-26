<?php

declare(strict_types=1);

namespace Dotfile\Model\Check;

/**
 * A representation of a check.
 *
 * @see https://docs.dotfile.com/reference/checks-guide
 */
class Check
{
    public string $id;
    public ?string $individualId = null;
    public ?string $companyId = null;
    public CheckStatus $status;
    public CheckType $type;
    public ?string $subtype = null;
    public \DateTimeImmutable $createdAt;
    public \DateTimeImmutable $updatedAt;
    public \DateTimeImmutable $lastActivityAt;
}
