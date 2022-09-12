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
                    <li class="breadcrumb-item active">{{ $tag->name }}</li>
                </ol>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                @if(isset($categories))
                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-sm-4 col-md-4">
                        <a href="{{ route('kb.categories.show', [$category->slug, $category->id]) }}">
                            <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="fas fa-info-circle"></i></span>
                                <div class="info-box-content">
                                    <h3 class="text-center"><strong>{{ $category->name}}</strong></h3>
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