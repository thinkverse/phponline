<?php

declare(strict_types=1);

namespace Domains\Publishing\ValueObjects;

class ArticleValueObject
{
    public function __construct(
        public string $title,
        public string $excerpt,
        public string $content,
        public int $category,
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'category_id' => $this->category,
        ];
    }
}
