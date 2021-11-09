<ul>
    @forelse ($articles as $article)
        <li>{{ $article->title }}</li>
    @empty
        <li>No  articles found</li>
    @endforelse
</ul>

