<?php

declare(strict_types=1);

use App\Models\Article;
use JustSteveKing\StatusCode\Http;
use function Pest\Laravel\get;

it('can load a specific article from an author', function () {
    $article = Article::factory()->create();

    get(
        uri: route('articles:show', [
            $article->author->handle,
            $article->slug,
        ])
    )->assertStatus(Http::OK);
});
