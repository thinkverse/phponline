<?php

namespace App\Http\Livewire\Dashboard\Articles;

use App\Models\Category;
use Domains\Publishing\Actions\CreateNewArticle;
use Domains\Publishing\Factories\ArticleFactory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreateForm extends Component
{
    public null|string $title = null;

    public null|string $excerpt = null;

    public null|string $content = null;

    public null|int $category = null;

    protected array $rules = [
        'title' => [
            'required',
            'string',
            'min:2',
            'max:150',
        ],
        'excerpt' => [
            'nullable',
            'string',
            'min:2',
            'max:120',
        ],
        'content' => [
            'required',
            'string',
            'min:2',
        ],
        'category' => [
            'required',
            'int',
            'exists:categories,id',
        ]
    ];

    public function submit()
    {
        $this->validate();

        CreateNewArticle::handle(
            object: ArticleFactory::make(
                attributes: [
                    'title' => $this->title,
                    'excerpt' => $this->excerpt,
                    'content' => $this->content,
                    'category' => $this->category,
                ],
            ),
            user: auth()->user(),
        );

        $this->redirect(
            url: route('pages:dashboard:articles:index'),
        );
    }

    public function render(): View
    {
        return view('livewire.dashboard.articles.create-form', [
            'categories' => Category::query()->get()->toArray(),
        ]);
    }
}
