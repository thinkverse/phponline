<?php

declare(strict_types=1);

use App\Enums\ArticleStatus;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Domains\Publishing\Actions\CreateNewArticle;
use Domains\Publishing\ValueObjects\ArticleValueObject;
use function Pest\Laravel\actingAs;

it('sets the default status to pending for a non verified user', function (string $title) {
    actingAs(User::factory()->create([
        'verified' => false,
    ]));

    expect(Article::query()->count())->toEqual(0);

    $cateogry = Category::factory()->create();

    CreateNewArticle::handle(
        object: new ArticleValueObject(
            title: $title,
            excerpt: $title,
            content: $title,
            category: $cateogry->id,
        ),
        user: auth()->user(),
    );

    expect(Article::query()->count())->toEqual(1);

    expect(
        Article::query()->first()
    )->title->toEqual($title)->status->toEqual(ArticleStatus::PENDING()->value);


})->with('articles');


it('sets the default status to published for a verified user', function (string $title) {
    actingAs(User::factory()->create([
        'verified' => true,
    ]));

    expect(Article::query()->count())->toEqual(0);

    $cateogry = Category::factory()->create();

    CreateNewArticle::handle(
        object: new ArticleValueObject(
            title: $title,
            excerpt: $title,
            content: $title,
            category: $cateogry->id,
        ),
        user: auth()->user(),
    );

    expect(Article::query()->count())->toEqual(1);

    expect(
        Article::query()->first()
    )->title->toEqual($title)->status->toEqual(ArticleStatus::PUBLISHED()->value);


})->with('articles');
