<?php

declare(strict_types=1);

namespace Dotfile\Model\Case;

/**
 * Response when a case have been created.
 *
 * @see https://docs.dotfile.com/reference/cases-guide#risk-object
 */
class Risk
{
    public string $id;
    public RiskMode $mode;
    public RiskLevel $level;
    public ?string $comment;
    public ?float $score;
    /**
     * @var array<string, int>
     */
    public ?array $components;
    /**
     * @var string[]
     */
    public ?array $flags;
    public \DateTimeImmutable $createdAt;
    public \DateTimeImmutable $updatedAt;
}
