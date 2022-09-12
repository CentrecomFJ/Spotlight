@extends('layouts.adminlte')

@section('content')
<style>
    .page-wrapper {
        padding: 10px;
    }

    .page-wrapper .heading {
        border-bottom: 1px solid #dddddd;
        margin-bottom: 15px;
    }

    .page-wrapper .heading .title {
        font-family: 'Roboto', sans-serif !important;
        font-weight: 700 !important;
        color: #565656;
    }

    .page-wrapper .metadata {
        width: 100%;
        color: #686868;
        margin-bottom: 25px;
    }

    .page-wrapper .metadata .info {
        display: inline-block;
        margin-right: 10px;
        background: #ffffff;
        padding: 10px;
        box-shadow: 5px 6px 10px rgba(0, 0, 0, 0.1), 5px 6px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        font-size: 12px;
        transition: ease-in-out .25s;
        border: 1px solid #e8e8e8;
    }

    .page-wrapper .metadata .info i {
        margin-right: 8px;
    }

    .page-wrapper .metadata .info:hover,
    .page-wrapper .metadata .info:focus {
        box-shadow: none;
    }

    .page-wrapper .body {
        font-family: 'Roboto', sans-serif !important;
        color: #686868;
        font-size: 15px;
    }

    .page-wrapper .body img {
        width: 100%;
        max-width: 100%;
        height: auto !important;
        display: block;
        margin-left: auto;
        margin-right: auto;
        border-radius: 15px;
        box-shadow: 5px 6px 10px rgba(0, 0, 0, 0.14), 5px 6px 10px rgba(0, 0, 0, 0.12);
        transition: ease-in-out .21s;
    }

    .page-wrapper .body img:hover,
    .page-wrapper .body img:focus {
        box-shadow: none;
    }
</style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Knowledgebase</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('kb.knowledge.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('kb.categories.show', [$article->category->slug, $article->category->id]) }}">{{ $article->category->name }}</a></li>
                    <li class="breadcrumb-item active">{{ $article->title }}</li>
                </ol>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="page-wrapper">
                            <div class="heading">
                                <h2 class="title">{{ $article->title }}</h2>
                            </div>
                            <div class="metadata">
                                <div class="info date">
                                    <i class="far fa-calendar-alt"></i> {{date('d-m-Y', strtotime($article->created_at))}}
                                </div>
                                @if($article->category->count())
                                <div class="info category">
                                    <a href="{{ route('kb.categories.show', [$article->category->slug, $article->category->id]) }}">
                                        <i class="fas fa-folder-open"></i> {{ $article->category->name }}</a>
                                </div>
                                @endif
                            </div>
                            <div class="body">
                                {!! $article->full_text !!}
                            </div>
                            <div class="tags">
                                @foreach($article->tags as $tag)
                                <a href="{{ route('kb.tags.show', [$tag->slug, $tag->id]) }}"><span class="badge badge-pill badge-primary">{{ $tag->name }}</span></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection