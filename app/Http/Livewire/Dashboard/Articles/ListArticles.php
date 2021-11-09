<?php

declare(strict_types=1);

namespace App\Http\Livewire\Dashboard\Articles;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ListArticles extends Component
{
    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.dashboard.articles.list-articles', [
            'articles' => $this->getArticles(),
        ]);
    }

    /**
     * @return Collection
     */
    public function getArticles(): Collection
    {
        return Article::query()
            ->latest()
            ->where('user_id', auth()->id())
            ->get();
    }
}
