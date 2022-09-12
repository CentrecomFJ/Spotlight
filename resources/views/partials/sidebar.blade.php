<div class="sidebar-item">
    <h5 class="title">Popular Articles</h5>
    <div class="list-group">
    @foreach ($popularArticles as $article)
        <a href="{{ route('kb.articles.show', [$article->slug, $article->id]) }}" class="list-group-item list-group-item-action">
            <i class="fa fa-file-text-o"></i> {{ $article->title }}
        </a>
    @endforeach
    </div>
</div>
<div class="sidebar-item">
    <h5 class="title">Latest Articles</h5>
    <div class="list-group">
    @foreach ($latestArticles as $article)
        <a href="{{ route('kb.articles.show', [$article->slug, $article->id]) }}" class="list-group-item list-group-item-action">
            <i class="fa fa-file-text-o"></i> {{ $article->title }}
        </a>
    @endforeach
    </div>
</div>