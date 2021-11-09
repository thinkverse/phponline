<?php

declare(strict_types=1);

namespace Domains\Publishing\Factories;

use Domains\Publishing\ValueObjects\ArticleValueObject;

class ArticleFactory
{
    public static function make(array $attributes): ArticleValueObject
    {
        return new ArticleValueObject(
            title: $attributes['title'],
            excerpt: $attributes['excerpt'],
            content: $attributes['content'],
            category: $attributes['category'],
        );
    }
}
