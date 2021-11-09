<?php

declare(strict_types=1);

use App\Models\User;
use JustSteveKing\StatusCode\Http;
use function Pest\Laravel\get;

it('can load a users profile page', function () {
    $user = User::factory()->create();

    get(
        uri: route('pages:users:profile', $user->handle),
    )->assertStatus(Http::OK);
});
