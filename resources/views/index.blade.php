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
                    <li class="breadcrumb-item active"><a href="{{ route('kb.knowledge.home') }}">Home</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                @if(isset($tags))
                <div class="row">
                    @foreach($tags as $tag)
                    <div class="col-sm-6 col-md-6">
                        <a href="{{ route('kb.tags.show_categories_by_tag', [$tag->slug, $tag->id]) }}">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fas fa-info-circle"></i></span>
                                <div class="info-box-content">
                                    <h3 class="text-center"><strong>{{ $tag->name}}</strong></h3>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                @endif
                @if(isset($noTagCategories))
                <div class="row">
                    @foreach($noTagCategories as $categories)
                    <div class="col-sm-6 col-md-6">
                        <a href="{{ route('kb.categories.show', [$categories->slug, $categories->id]) }}">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fas fa-info-circle"></i></span>
                                <div class="info-box-content">
                                    <h3 class="text-center"><strong>{{ $categories->name }}</strong></h3>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection