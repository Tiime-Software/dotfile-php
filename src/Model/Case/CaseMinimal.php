<?php

declare(strict_types=1);

namespace Dotfile\Model\Case;

class CaseMinimal
{
    public string $id;
    public string $name;
    public CaseStatus $status;
    public ?string $externalId = null;
    public ?string $templateId = null;

    /**
     * @var CaseFlag[]
     */
    public array $flags;

    /**
     * @var string[]
     */
    public array $tags;
    public ?Risk $risk = null;

    /**
     * Optional metadata in a format of key (string) / value (string) for this case.
     *
     * @see https://docs.dotfile.com/reference/cases-guide#metadata
     *
     * @var array<string, string>|null
     */
    public ?array $metadata = null;

    public \DateTimeImmutable $createdAt;
    public \DateTimeImmutable $updatedAt;
    public \DateTimeImmutable $lastActivityAt;
}
