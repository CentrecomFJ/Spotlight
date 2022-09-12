@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><a href="{{ route('admin.admin.home') }}">Home</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if(isset($articles))
                <h2>Latest Updates</h2>
                <div class="row">
                    @foreach($articles as $article)
                    <div class="col-sm-6 col-md-3 mt-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="position-relative p-3">
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon bg-danger">
                                            New
                                        </div>
                                    </div>
                                </div>
                                <h6 class="card-title">
                                    <a href="{{ route('kb.articles.show', [$article->slug, $article->id]) }}">{{ $article->title }}</a>
                                </h6>
                            </div>
                            <div class="card-body">
                                <span class="card-date text-primary">Updated at: {{date('d-m-Y H:i:s', strtotime($article->updated_at))}}</span>
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
@section('scripts')
@parent
@endsection
