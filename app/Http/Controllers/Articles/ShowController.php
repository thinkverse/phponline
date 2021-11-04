<?php

declare(strict_types=1);

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use JustSteveKing\StatusCode\Http;

class ShowController extends Controller
{
    public function __invoke(Request $request, User $user, Article $article): View
    {
        if ($article->user_id !== $user->id) {
            abort(Http::NOT_FOUND);
        }

        $article->author = $user;

        return view('articles.show', [
            'article' => $article,
        ]);
    }
}
