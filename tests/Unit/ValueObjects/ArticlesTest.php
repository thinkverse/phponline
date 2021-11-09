<?php

declare(strict_types=1);

use Domains\Publishing\ValueObjects\ArticleValueObject;

it('can create a new article value object', function (string $title) {
    expect(
        new ArticleValueObject(
            title: $title,
            excerpt: $title,
            content: $title,
            category: 1,
        ),
    )->toBeInstanceOf(ArticleValueObject::class)->title->toEqual($title);
})->with('articles');
