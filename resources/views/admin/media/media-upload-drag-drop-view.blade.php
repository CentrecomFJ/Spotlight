@extends('layouts.adminlte')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Multiple File Uploader</h1>
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
            <div class="col-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('alert-success'))
                        <div id="success-alert" class="col-md-12">
                            <div class="alert alert-success">
                                {{ session()->get('alert-success') }}
                            </div>
                        </div>
                        @endif
                        <form id="dropper" method="POST" action="{{ route('admin.media-upload-submit') }}" class="dropzone" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="category" class="col-lg-2 col-sm-12 col-form-label text-md-left">Category:</label>

                                <div class="col-lg-5 col-sm-12 ">
                                    <div class="form-group">
                                        <select class="form-control" name="category" id="category">
                                            <option value="1">Image/(jpg,gif,png,mp4)</option>
                                            <option value="2">Pdf</option>
                                            <option value="3">Word document</option>
                                            <option value="4">Excel File</option>
                                            <option value="5">Letter</option>
                                            <option value="6">Case study</option>
                                            <option value="7">Magazine</option>
                                            <option value="8">White Paper</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="/ckeditor/ckeditor.js"></script>
<script src="/ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="/ckeditor/samples/css/samples.css">
<link rel="stylesheet" href="/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<script src="/js/dropzone.js"></script>
<link rel="stylesheet" href="/css/dropzone.css">

<script>
    $(document).ready(function() {
        $(".alert-success").fadeOut(3000);
    });
</script>

<style>
    .dropzone {
        min-height: 450px;
        border: 5px dashed #2eb2ff;
        background: white;
        padding: 20px 20px;
    }

    .dropzone .dz-message .dz-button {
        margin-top: 100px;
    }
</style>

@endsection