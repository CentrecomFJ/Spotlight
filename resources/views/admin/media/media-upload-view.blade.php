@extends('layouts.adminlte')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Single Upload Media</h1>
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
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('alert-success'))
                        <div id="success-alert" class="col-md-12">
                            <div class="alert alert-success">
                                {{ session()->get('alert-success') }}
                            </div>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('admin.media-upload-submit') }}" class="dropzone" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="Description" class="col-md-4 col-form-label text-md-left">Description:</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-left">Category:</label>

                                <div class="col-md-6">
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

                            <div class="form-group row">
                                <label for="upload_media" class="col-md-4 col-form-label text-md-left">Upload Media</label>

                                <div class="col-md-6">
                                    <div class="form-group">

                                        <div class="input-group">
                                            <div class="custom-file">
                                            <label class="custom-file-label" for="imgInp">Choose file</label>
                                                <input type="file" class="custom-file-input" name="file" id="imgInp">                                                
                                            </div>
                                        </div>
                                        <!-- <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-default btn-file">
                                                    <input type="file" name="file" id="imgInp">

                                                </span>
                                            </span>
                                            <input type="text" class="form-control" readonly>
                                        </div> -->
                                        <br>
                                        <img style="max-width:350px;" id='img-upload' />
                                        <br>

                                        <video width="400" controls>
                                            <source id="video_here">
                                            Your browser does not support HTML5 video.
                                        </video>

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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
@parent
<script src="/ckeditor/ckeditor.js"></script>
<script src="/ckeditor/samples/js/sample.js"></script>
<!-- <link rel="stylesheet" href="/ckeditor/samples/css/samples.css">
    <link rel="stylesheet" href="/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css"> -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

{{--<script src="/js/dropzone.js"></script>--}}
{{--<link rel="stylesheet" href="/css/dropzone.css">--}}
<script>
    $(document).ready(function() {
        $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {

            var input = $(this).parents('.input-group').find(':text');

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#img-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {

            if ($('#category').val() == '1') {
                readURL(this);
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(".alert-success").fadeOut(3000);
    });
    $(document).on("change", ".btn-file :file", function(evt) {
        var $source = $('#video_here');
        $source[0].src = URL.createObjectURL(this.files[0]);
        $source.parent()[0].load();
    });
</script>
@endsection