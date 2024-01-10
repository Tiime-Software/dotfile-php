<?php

declare(strict_types=1);

namespace Dotfile\Model\Case;

use Dotfile\Model\Company\Company;
use Dotfile\Model\Individual\Individual;

/**
 * Response when a specific case have been retrieved.
 *
 * @see https://docs.dotfile.com/reference/case-get-one
 */
class CaseDetailed
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

    /**
     * @var Individual[]
     */
    public array $individuals;

    /**
     * @var Company[]
     */
    public array $companies;

    public \DateTimeImmutable $createdAt;
    public \DateTimeImmutable $updatedAt;
    public \DateTimeImmutable $lastActivityAt;
}
