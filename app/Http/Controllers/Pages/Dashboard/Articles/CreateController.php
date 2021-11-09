<?php

declare(strict_types=1);

namespace App\Http\Controllers\Pages\Dashboard\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     * @return View
     */
    public function __invoke(Request $request): View
    {
        return view('pages.dashboard.articles.create');
    }
}
