<?php

declare(strict_types=1);

namespace Dotfile\Tests\FunctionalTests;

use Dotfile\DotfileClient;
use Dotfile\Model\Case\CaseTags;
use Dotfile\Model\Case\Tag;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class CaseGetTagsTest extends TestCase
{
    public function testCaseGetTagsWithEmptyList(): void
    {
        $client = new DotfileClient(new MockHttpClient([
            new MockResponse((string) file_get_contents(__DIR__.'/../fixtures/case_get_tags_with_empty_list.json')),
        ]));

        $caseTags = $client->case->getTags('39cbd6d5-4da5-4d94-ae71-84895c5e552a');

        $this->assertInstanceOf(CaseTags::class, $caseTags);
        $this->assertCount(0, $caseTags->tags);
    }

    public function testCaseGetTagsWithOneTag(): void
    {
        $client = new DotfileClient(new MockHttpClient([
            new MockResponse((string) file_get_contents(__DIR__.'/../fixtures/case_get_tags_with_one_tag.json')),
        ]));

        $caseTags = $client->case->getTags('39cbd6d5-4da5-4d94-ae71-84895c5e552a');

        $this->assertInstanceOf(CaseTags::class, $caseTags);
        $this->assertCount(1, $caseTags->tags);

        $this->assertInstanceOf(Tag::class, $caseTags->tags[0]);

        $this->assertEquals('ea5c5935-2ec8-4519-a526-7ab25c71ac4e', $caseTags->tags[0]->id);
        $this->assertEquals('A faire', $caseTags->tags[0]->label);
    }

    public function testCaseGetTagsWithMultipleTag(): void
    {
        $client = new DotfileClient(new MockHttpClient([
            new MockResponse((string) file_get_contents(__DIR__.'/../fixtures/case_get_tags_with_multiple_tag.json')),
        ]));

        $caseTags = $client->case->getTags('39cbd6d5-4da5-4d94-ae71-84895c5e552a');

        $this->assertInstanceOf(CaseTags::class, $caseTags);
        $this->assertCount(2, $caseTags->tags);

        $this->assertInstanceOf(Tag::class, $caseTags->tags[0]);
        $this->assertEquals('ea5c5935-2ec8-4519-a526-7ab25c71ac4e', $caseTags->tags[0]->id);
        $this->assertEquals('A faire', $caseTags->tags[0]->label);

        $this->assertInstanceOf(Tag::class, $caseTags->tags[1]);
        $this->assertEquals('4332ea39-32a0-4127-88fc-8d25654dde83', $caseTags->tags[1]->id);
        $this->assertEquals('Demander confirmation', $caseTags->tags[1]->label);
    }
}
