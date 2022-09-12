@extends('layouts.adminlte')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>FAQ</h1>
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
            <div class="col-12" id="faq-accordion">
                @foreach($categories as $category)
                <div class="row">
                    @foreach($category->faqQuestions as $question)
                    <div class="col-6">
                       
                        <div class="card card-primary card-outline">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapse{{ $question->id }}">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        {{ $question->question }}
                                    </h4>
                                </div>
                            </a>
                            <div id="collapse{{ $question->id }}" class="collapse show" data-parent="#faq-accordion">
                                <div class="card-body">
                                    {{ $question->answer }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection