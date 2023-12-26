<?php

declare(strict_types=1);

namespace Dotfile\Model\Case;

/**
 * Input used to create a case.
 *
 * @see https://docs.dotfile.com/reference/case-create-one
 */
class CaseCreateInput
{
    /**
     * Name for the case (at most 180 characters).
     */
    public string $name;

    /**
     * Optional status for this case. Defaults to open.
     */
    public ?CaseStatus $status = null;

    /**
     * Optional external id for this case. You can use that to reference an entity of your system. Must be unique if set.
     */
    public ?string $externalId = null;

    /**
     * Optional template id to attach template to this case.
     */
    public ?string $templateId = null;

    /**
     * Optional metadata in a format of key (string) / value (string) for this case.
     *
     * @see https://docs.dotfile.com/reference/cases-guide#metadata
     *
     * @var array<string, string>
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
     * Optional tags for this case. Either tag id, or tag label. Tag labels are case insensitive.
     *
     * @var string[]
     */
    public ?array $tags = null;
}
