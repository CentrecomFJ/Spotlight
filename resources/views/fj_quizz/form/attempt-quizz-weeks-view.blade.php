@extends('layouts.adminlte')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/jquery.steps.min.js') }}"></script>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Available Quizzes</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Available Quizzes</li>
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

                        <div class="row">

                            @if(!isset($data[0]->id))
                            <div class="container my-5">
                                <div class="alert alert-danger text-center" role="alert">
                                    Woops looks like no Quizzes have been published for your account Yet .
                                </div>
                            </div>

                            @endif
                            @foreach($data as $datas)


                            <div class="col-md-4 mt-1">
                                <div class="small-box bg-success" style="width:400px">
                                    {{--<img class="card-img-top" src="img_avatar1.png" alt="Card image">--}}
                                    <div class="card-body">
                                        <h4 class="card-title">Title: Week {{$datas->question_week}}</h4>
                                        <p class="card-text">This quizz will be open for 1 week only <br> Expires :{{$datas->expires}}</p>

                                        @if($datas->release_answer>0)
                                        <a href="{{route('admin.fj-quizz-attempt_answers',['question_week'=>$datas->question_week])}}" class="btn btn-primary">View Answers</a>
                                        @else

                                        @if($errors->any())
                                        <p style="color:red;"> Thank you,<br> You have already attempted this weeks quizz </p>
                                        @else
                                        @if(\Auth::user()->is_qa=='1')
                                        <a href="{{route('fj-quizz-release-answers',['question_week'=>$datas->question_week,'question_account'=>$datas->question_account])}}" class="btn btn-primary">Release Answers</a>
                                        @endif
                                        @if($datas->active>0)
                                        <a href="{{route('admin.quizz.attempt',['question_week'=>$datas->question_week])}}" class="btn btn-primary">Attempt Quiz</a>
                                        @else <a href="" class="btn btn-danger">Quiz Expired</a>
                                        @endif
                                        @endif
                                        @endif
                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<style>
    .funkyradio div {
        clear: both;
        overflow: hidden;
    }

    .funkyradio label {
        width: 100%;
        border-radius: 3px;
        border: 1px solid #D1D3D4;
        font-weight: normal;
    }

    .funkyradio input[type="radio"]:empty,
    .funkyradio input[type="checkbox"]:empty {
        display: none;
    }

    .funkyradio input[type="radio"]:empty~label,
    .funkyradio input[type="checkbox"]:empty~label {
        position: relative;
        line-height: 2.5em;
        text-indent: 3.25em;
        margin-top: 2em;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .funkyradio input[type="radio"]:empty~label:before,
    .funkyradio input[type="checkbox"]:empty~label:before {
        position: absolute;
        display: block;
        top: 0;
        bottom: 0;
        left: 0;
        content: '';
        width: 2.5em;
        background: #D1D3D4;
        border-radius: 3px 0 0 3px;
    }

    .funkyradio input[type="radio"]:hover:not(:checked)~label,
    .funkyradio input[type="checkbox"]:hover:not(:checked)~label {
        color: #888;
    }

    .funkyradio input[type="radio"]:hover:not(:checked)~label:before,
    .funkyradio input[type="checkbox"]:hover:not(:checked)~label:before {
        content: '\2714';
        text-indent: .9em;
        color: #C2C2C2;
    }

    .funkyradio input[type="radio"]:checked~label,
    .funkyradio input[type="checkbox"]:checked~label {
        color: #777;
    }

    .funkyradio input[type="radio"]:checked~label:before,
    .funkyradio input[type="checkbox"]:checked~label:before {
        content: '\2714';
        text-indent: .9em;
        color: #333;
        background-color: #ccc;
    }

    .funkyradio input[type="radio"]:focus~label:before,
    .funkyradio input[type="checkbox"]:focus~label:before {
        box-shadow: 0 0 0 3px #999;
    }

    .funkyradio-default input[type="radio"]:checked~label:before,
    .funkyradio-default input[type="checkbox"]:checked~label:before {
        color: #333;
        background-color: #ccc;
    }

    .funkyradio-primary input[type="radio"]:checked~label:before,
    .funkyradio-primary input[type="checkbox"]:checked~label:before {
        color: #fff;
        background-color: #337ab7;
    }

    .funkyradio-success input[type="radio"]:checked~label:before,
    .funkyradio-success input[type="checkbox"]:checked~label:before {
        color: #fff;
        background-color: #5cb85c;
    }

    .funkyradio-danger input[type="radio"]:checked~label:before,
    .funkyradio-danger input[type="checkbox"]:checked~label:before {
        color: #fff;
        background-color: #d9534f;
    }

    .funkyradio-warning input[type="radio"]:checked~label:before,
    .funkyradio-warning input[type="checkbox"]:checked~label:before {
        color: #fff;
        background-color: #f0ad4e;
    }

    .funkyradio-info input[type="radio"]:checked~label:before,
    .funkyradio-info input[type="checkbox"]:checked~label:before {
        color: #fff;
        background-color: #5bc0de;
    }

</style>
@endsection
