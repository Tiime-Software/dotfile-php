<?php

declare(strict_types=1);

namespace Dotfile\Model\Case;

/**
 * Response when a case have been updated.
 *
 * @see https://docs.dotfile.com/reference/case-update-one
 */
class CaseUpdated
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

    /**
     * Optional custom properties in a format of key (string) / value (string|boolean|[string]|null) for this case.
     *
     * @see https://docs.dotfile.com/reference/cases-guide#custom-properties
     *
     * @var array<string, string|boolean|string[]|null>
     */
    public ?array $customProperties = null;

    public \DateTimeImmutable $createdAt;
    public \DateTimeImmutable $updatedAt;
    public \DateTimeImmutable $lastActivityAt;
}
