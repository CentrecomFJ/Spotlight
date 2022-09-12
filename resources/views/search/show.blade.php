@extends('layouts.main')

@section('content')
<div class="col-md-12 mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">
                    <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Search Results</li>
        </ol>
    </nav>
</div>

<div class="col-sm-12 col-md-12" id="fb-heading-search" data-keyword="{{ $keywords }}">
    <p>Search results for <span class="text-white bg-dark"><em>&nbsp;{{$keywords}}&nbsp;</em></span></p>
    <h4 class="padding-left-35">
        <small>{{ $articles->total() }} results were found using the search term provided</small>
    </h4>

</div>

@foreach($articles as $article)
<div class="col-sm-6 col-md-4 mt-2">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">
                <a href="{{ route('kb.articles.show', [$article->slug, $article->id]) }}">{{ $article->title }}</a>
            </h6>
            <span class="card-date">{{date('d-m-Y', strtotime($article->created_at))}}</span>
            <p class="card-text">{{ Str::limit($article->full_text, 50) }}</p>
            <a href="{{ route('kb.articles.show', [$article->slug, $article->id]) }}" class="btn btn-secondary float-right">Read More...</a>
        </div>
    </div>
</div>
@endforeach
<!-- PAGINATION -->
{{ $articles->withQueryString()->links('partials.pagination') }}
<!-- END PAGINATION -->
<script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var keywords = $("#fb-heading-search").data("keyword");
        $("#main-search-input").val(keywords);
    });
</script>
@endsection