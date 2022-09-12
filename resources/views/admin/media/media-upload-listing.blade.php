@extends('layouts.adminlte')

@section('content')
<style>
    .img-thumbnail {
        max-width: 200px;
    }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Media Listings</h1>
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
                    <!-- <div class="card-header">Upload Media</div> -->
                    <div class="card-body">
                        @if(session()->has('alert-success'))
                        <div id="success-alert" class="col-md-12">
                            <div class="alert alert-success">
                                {{ session()->get('alert-success') }}
                            </div>
                        </div>
                        @endif

                        <div class="col-12 mb-5">
                            <button class="btn" onclick="toggle_items(9)">Show all</button>
                            <button class="btn" onclick="toggle_items(1)">Images</button>
                            <button class="btn" onclick="toggle_items(2)">Pdf</button>
                            <button class="btn" onclick="toggle_items(3)">Word Document</button>
                            <button class="btn" onclick="toggle_items(4)">Excel</button>
                            <button class="btn" onclick="toggle_items(5)">Letter</button>
                            <button class="btn" onclick="toggle_items(6)">Case Study</button>
                            <button class="btn" onclick="toggle_items(7)">Magazine</button>
                            <button class="btn" onclick="toggle_items(8)">White paper</button>
                        </div>
                        <div class="row">
                            @foreach($data as $datas)
                            <div class="col-4 {{$datas->category}}">

                                @if($datas->category=="1")

                                @if (($pos = strpos($datas->document_alias, "jpg")) !== FALSE || ($pos = strpos($datas->document_alias, "png")) !== FALSE || ($pos = strpos($datas->document_alias, "JPG")) !== FALSE || ($pos = strpos($datas->document_alias, "jfif")) !== FALSE)
                                <a target="_blank" href="{{asset('/kb_images/'.$datas->document_alias)}}"><img class="img-thumbnail" src="{{asset('/kb_images/'.$datas->document_alias)}}" alt="Card image cap"> </a>
                                @else
                                <a target="_blank" href="{{asset('/kb_images/'.$datas->document_alias)}}"><img class="img-thumbnail" src="{{asset('/images/video.png')}}" alt="Card image cap"> </a>

                                @endif

                                @elseif($datas->category=="3")

                                <a target="_blank" href="{{asset('/kb_images/'.$datas->document_alias)}}"> <img class="img-thumbnail" src="/images/word.png" alt="{{$datas->document_name}}"> </a>

                                @elseif($datas->category=="4")

                                <a target="_blank" href="{{asset('/kb_images/'.$datas->document_alias)}}"> <img class="img-thumbnail" src="/images/xls.png" alt="{{$datas->document_name}}"> </a>

                                @elseif($datas->category=="2")

                                <a target="_blank" href="{{asset('/kb_images/'.$datas->document_alias)}}"> <img class="img-thumbnail" src="/images/pdf.png" alt="{{$datas->document_name}}"> </a>
                                @else

                                <a target="_blank" href="{{asset('/kb_images/'.$datas->document_alias)}}"> <img class="img-thumbnail" src="/images/word_pad.jpg" alt="{{$datas->document_name}}"> </a>

                                @endif
                                <p style="font-size:10px;word-wrap: break-word; ">
                                    <span class="font-weight-bold">Name:</span> {{$datas->document_name}}<br>
                                    <span class="font-weight-bold">Upload date:</span> {{$datas->created_at}}<br>

                                    <span class="font-weight-bold">Action:</span> <a href="{{route('admin.media-upload-delete',['id'=>$datas->id])}}" style="color:blue;">Delete</a> <br>
                                    <span class="font-weight-bold">Direct link(Shareable) :<br></span>
                                    <a style="color:blue;">{{asset('/kb_images/'.$datas->document_alias)}} </a>

                                    <br>

                                </p>
                                <hr>

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
@parent
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://unpkg.com/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
<script>
    function toggle_items(id) {

        var a = ['1', '2', '3', '4', '5', '6', '7', '8'];

        if (id == '9') {

            for (index = 0; index < a.length; ++index) {
                $('.' + index).show();


            }
        } else {


            for (index = 0; index < a.length; ++index) {
                $('.' + index).show();
                if (id === index) {} else {
                    $('.' + index).hide();
                }


            }

        }


    }
</script>
@endsection