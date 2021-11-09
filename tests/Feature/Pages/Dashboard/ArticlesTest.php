<?php

declare(strict_types=1);

use App\Http\Livewire\Dashboard\Articles\CreateForm;
use App\Http\Livewire\Dashboard\Articles\ListArticles;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use JustSteveKing\StatusCode\Http;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('can load the dashboard articles page', function () {
    actingAs(
        user: User::factory()->create(),
    );

    get(
        uri: route('pages:dashboard:articles:index'),
    )->assertStatus(
        status: Http::OK,
    );
});

it('redirects from the dashboard articles page if not logged in', function () {
    get(
        uri: route('pages:dashboard:articles:index'),
    )->assertStatus(
        status: Http::FOUND,
    );
});

it('can load the livewire component to see a users articles listed', function () {
    actingAs(User::factory()->create());

    $article = Article::factory()->create([
        'user_id' => auth()->id(),
    ]);

    $secondArticle = Article::factory()->create();

    Livewire::test(
        name: ListArticles::class,
    )->assertSee(
        values: $article->title,
    )->assertDontSee(
        values: $secondArticle->title,
    );
});

it('can load the create form for articles', function () {
    actingAs(User::factory()->create());

    expect(Article::query()->count())->toEqual(0);

    $category = Category::factory()->create();

    get(
        uri: route('pages:dashboard:articles:create'),
    )->assertStatus(
        status: Http::OK,
    );

    Livewire::test(
        name: CreateForm::class
    )->assertSeeText(
        value: 'Create a new Article',
    )->set(
        name: 'title',
        value: 'Test Article',
    )->set(
        name: 'excerpt',
        value: 'This is the excerpt for the article.',
    )->set(
        name: 'content',
        value: 'This is some article content, isnt it lovely',
    )->set(
        name: 'category',
        value: $category->id,
    )->call('submit')->assertHasNoErrors();

    expect(Article::query()->count())->toEqual(1);
});
