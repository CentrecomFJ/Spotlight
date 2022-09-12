@extends('layouts.adminlte')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Load Quiz</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Load Quiz</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Query Form</h4>
                        <div class="col-md-12 alert-info "> Upload a csv file containing your quiz questions and answers, Follow the format <a href="http://10.0.129.1/images/csv_format.jpg">Click View format </a> </div>
                    </div>
                    {{-- <div class="col-md-12 alert-info "> Upload a csv file containing your quiz questions and answers, Follow the format  <a href="http://10.0.129.1/images/csv_format.jpg">Click View format </a> </div> --}}
                    <br>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.quizz.loader-submit') }}" class="dropzoned" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="upload_media" class="col-md-4 col-form-label text-md-left">Upload Media</label>

                                <div class="col-md-6">
                                    {{-- <div class="form-group">

                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-default btn-file"><input type="file" name="file" id="imgInp">

                                                </span>
                                            </span>
                                            <input type="text" class="form-control" readonly>
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <!-- <label for="customFile">Custom File</label> -->
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="imgInp" name="file">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>

                            {{--<div class="form-group row">--}}
                            {{--<label for="category" class="col-lg-2 col-sm-12 col-form-label text-md-left">Category:</label>--}}

                            {{--<div class="col-lg-5 col-sm-12 ">--}}
                            {{--<div class="form-group">--}}
                            {{--<select class="form-control" name="category" id="category">--}}
                            {{--<option value="1">Image/(jpg,gif,png,mp4)</option>--}}
                            {{--<option value="2">Pdf</option>--}}
                            {{--<option value="3">Word document</option>--}}
                            {{--<option value="4">Excel File</option>--}}
                            {{--<option value="5">Letter</option>--}}
                            {{--<option value="6">Case study</option>--}}
                            {{--<option value="7">Magazine</option>--}}
                            {{--<option value="8">White Paper</option>--}}
                            {{--</select>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- <script src="/ckeditor/ckeditor.js"></script>
<script src="/ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="/ckeditor/samples/css/samples.css">
<link rel="stylesheet" href="/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css"> --}}
{{-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<script src="/js/dropzone.js"></script>
<link rel="stylesheet" href="/css/dropzone.css"> --}}

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
