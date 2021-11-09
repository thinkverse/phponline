<?php

declare(strict_types=1);

use App\Models\User;
use JustSteveKing\StatusCode\Http;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('redirects to login if not authenticated', function () {
    get(
        uri: route('pages:dashboard:index'),
    )->assertStatus(
        status: Http::FOUND,
    );
});

it('can load the dashboard page', function () {
    actingAs(User::factory()->create());

    get(
        uri: route('pages:dashboard:index'),
    )->assertStatus(
        status: Http::OK,
    );
});
