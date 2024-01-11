<?php

declare(strict_types=1);

namespace Dotfile\Model\Case;

use Dotfile\Model\Filters\CaseAllInput\DatetimeOperator;
use Dotfile\Model\Filters\CaseAllInput\ExternalIdOperator;
use Dotfile\Model\Filters\CaseAllInput\NameOperator;
use Dotfile\Model\Filters\CaseAllInput\SortOperator;
use Dotfile\Model\Filters\CaseAllInput\StatusOperator;
use Dotfile\Model\Filters\CaseAllInput\TagsOperator;
use League\Uri\Modifier;

/**
 * Input used to get all cases.
 *
 * @see https://docs.dotfile.com/reference/case-get-many
 */
class CaseAllInput
{
    /**
     * Filter items by the external_id.{operator} field. You can use the eq and not_eq operators, the eq operator
     * being the default.
     */
    public ?string $externalId = null;
    public ExternalIdOperator $externalIdOperator = ExternalIdOperator::EQUAL;

    /**
     * Filter items by the name.{operator} field. You can use the eq, not_eq, like and ilike operators, the eq operator
     * being the default.
     */
    public ?string $name = null;
    public NameOperator $nameOperator = NameOperator::EQUAL;

    /**
     * Filter items by the tags.{operator} field. You can use the array_contains, array_not_contains and array_overlap
     * operators.
     *
     * Comma separated for multiple values (array_contains, array_not_contains and array_overlap).
     *
     * @var array<string>
     */
    public ?array $tags = null;
    public TagsOperator $tagsOperator = TagsOperator::ARRAY_CONTAINS;

    /**
     * Filter items by the status.{operator} field. You can use the eq, not_eq, in and not_in operators, the eq operator
     * being the default.
     *
     * Comma separated for multiple values (in and not_in).
     */
    public ?string $status = null;
    public StatusOperator $statusOperator = StatusOperator::EQUAL;

    /**
     * Filter items by the created_at.{operator} field. You can use the eq, not_eq, gt, gte, lt and lte operators, the
     * eq operator being the default.
     */
    public ?\DateTimeImmutable $createdAt = null;
    public DatetimeOperator $createdAtOperator = DatetimeOperator::EQUAL;

    /**
     * Filter items by the updated_at.{operator} field. You can use the eq, not_eq, gt, gte, lt and lte operators, the
     * eq operator being the default.
     */
    public ?\DateTimeImmutable $updatedAt = null;
    public DatetimeOperator $updatedAtOperator = DatetimeOperator::EQUAL;

    /**
     * Filter items by the last_activity_at.{operator} field. You can use the eq, not_eq, gt, gte, lt and lte operators,
     * the eq operator being the default.
     */
    public ?\DateTimeImmutable $lastActivityAt = null;
    public DatetimeOperator $lastActivityAtOperator = DatetimeOperator::EQUAL;

    /**
     * Use this parameter to sort query results. If not specified, sorted in ascending order with values of field
     * updated_at. Available fields are created_at, last_activity_at, name and updated_at.
     */
    public SortOperator $sortOperator = SortOperator::UPDATED_AT;

    public int $page = 1;

    public int $limit = 20;

    public function convertToQueryString(): string
    {
        $params = [];

        if (\is_string($this->externalId)) {
            $params[] = ['external_id.'.$this->externalIdOperator->value, $this->externalId];
        }

        if (\is_string($this->name)) {
            $params[] = ['name.'.$this->nameOperator->value, $this->name];
        }

        if (\is_array($this->tags)) {
            $params[] = ['tags.'.$this->tagsOperator->value, implode(',', $this->tags)];
        }

        if (\is_string($this->status)) {
            $params[] = ['status.'.$this->statusOperator->value, $this->status];
        }

        if ($this->createdAt instanceof \DateTimeImmutable) {
            $params[] = ['created_at.'.$this->createdAtOperator->value, $this->createdAt->format('Y-m-d')];
        }

        if ($this->updatedAt instanceof \DateTimeImmutable) {
            $params[] = ['updated_at.'.$this->updatedAtOperator->value, $this->updatedAt->format('Y-m-d')];
        }

        if ($this->lastActivityAt instanceof \DateTimeImmutable) {
            $params[] = ['last_activity_at.'.$this->lastActivityAtOperator->value, $this->lastActivityAt->format('Y-m-d')];
        }

        $params[] = ['sort', $this->sortOperator->value];
        $params[] = ['page', (string) $this->page];
        $params[] = ['limit', (string) $this->limit];

        return (string) Modifier::from('')->appendQueryPairs($params);
    }
}
