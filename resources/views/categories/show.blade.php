@extends('layouts.adminlte')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Knowledgebase</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('kb.knowledge.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $category->name }}</li>
                </ol>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <p>Category: {{$category->name}} has {{ $category->articles_count }} resources available. </p>
            </div>
            <div class="col-8">
                @if(isset($category->articles))
                <div class="row">
                    @foreach($category->articles as $article)
                    <div class="col-sm-6 col-md-4 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <a href="{{ route('kb.articles.show', [$article->slug, $article->id]) }}">{{ $article->title }}</a>
                                </h6>
                                <br>
                                <span class="card-date">{{date('d-m-Y', strtotime($article->created_at))}}</span>
                                <p class="card-text">{{ Str::limit($article->short_text, 50) }}</p>
                                <a href="{{ route('kb.articles.show', [$article->slug, $article->id]) }}" class="btn btn-primary float-right">Read More...</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection