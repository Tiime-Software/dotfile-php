<?php

declare(strict_types=1);

namespace Dotfile\Tests\UnitTests\Model\Case;

use Dotfile\Model\Case\CaseAllInput;
use Dotfile\Model\Filters\CaseAllInput\DatetimeOperator;
use Dotfile\Model\Filters\CaseAllInput\ExternalIdOperator;
use Dotfile\Model\Filters\CaseAllInput\NameOperator;
use Dotfile\Model\Filters\CaseAllInput\StatusOperator;
use Dotfile\Model\Filters\CaseAllInput\TagsOperator;
use PHPUnit\Framework\TestCase;

class CaseGetAllInputTest extends TestCase
{
    public function testUriWithAllFields(): void
    {
        $input = new CaseAllInput();
        $input->externalId = '090909';
        $input->externalIdOperator = ExternalIdOperator::NOT_EQUAL;
        $input->name = 'I search a specific case';
        $input->nameOperator = NameOperator::ILIKE;
        $input->tags = ['Tag1', 'Tag2'];
        $input->tagsOperator = TagsOperator::ARRAY_OVERLAP;
        $input->status = 'open';
        $input->statusOperator = StatusOperator::NOT_IN;
        $input->createdAt = new \DateTimeImmutable('2023-01-01');
        $input->createdAtOperator = DatetimeOperator::NOT_EQUAL;
        $input->updatedAt = new \DateTimeImmutable('2023-01-02');
        $input->updatedAtOperator = DatetimeOperator::NOT_EQUAL;
        $input->lastActivityAt = new \DateTimeImmutable('2023-01-03');
        $input->lastActivityAtOperator = DatetimeOperator::NOT_EQUAL;

        $this->assertSame(
            expected: '?external_id.not_eq=090909&name.ilike=I%20search%20a%20specific%20case&tags.array_overlap=Tag1%2CTag2&status.not_in=open&created_at.not_eq=2023-01-01&updated_at.not_eq=2023-01-02&last_activity_at.not_eq=2023-01-03&sort=updated_at&page=1&limit=20',
            actual: $input->convertToQueryString()
        );
    }

    public function testUriWithoutFields(): void
    {
        $input = new CaseAllInput();

        $this->assertSame('?sort=updated_at&page=1&limit=20', $input->convertToQueryString());
    }
}
