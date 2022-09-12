@extends('layouts.adminlte')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/jquery.steps.min.js') }}"></script>
<div class="container-fluid">
    <div class="row justify-content-left">
        @if(session()->has('alert-success'))
        <div id="success-alert" class="col-md-12">
            <div class="alert alert-success">
                {{ session()->get('alert-success') }}
            </div>
        </div>
        @endif

        @if(session()->has('alert-warning'))
        <div id="warning-alert" class="col-md-12">
            <div class="alert alert-warning">
                {{ session()->get('alert-warning') }}
            </div>
        </div>
        @endif

        @if(session('message'))
        <div id="warning-alert" class="col-md-12">
            <div class="alert alert-warning">
                {{session('message')}}
            </div>
        </div>
        @endif

        <div class="col-md-11 mx-auto">

        </div>
    </div>
</div>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Attempting Quiz</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Attempting Quiz</li>
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
                        <form id="moh-quiz-form" method="POST" action="{{ route('admin.fj-quizz-attempt-submit') }}" class="dropzoned" enctype="multipart/form-data" name="quizz_form">
                            @csrf


                            <div class="container">
                                <div class="form-group col-3">
                                    <label>
                                        <h4>Timer</h4>
                                    </label>
                                    <input type="text" name="quizz_timer" class="form-control">
                                </div>
                                {{--<input type="text" id="skillz"  name="skillz" value="" >--}}
                                <input type="hidden" name="employee_code" value="{{$user_id}}">
                                <input type="hidden" name="fj_quizz_week" value="{{$data[0]->question_week}}">

                                <input type="hidden" name="fj_quizz_account" value="{{$data[0]->question_account}}">

                                <br>
                                <div class="row justify-content-left">
                                    <div id="success-alert" class="review col-md-12" style="display:none;">
                                        <div class="review alert alert-success">
                                            You are almost done , Review your answers and click submit
                                        </div>
                                    </div>

                                    @foreach($data as $datas)
                                    <div class="col-lg-12 row my-5 options">


                                        <div class="col-lg-9 border-right ">
                                            <div class="some-inputs  mt-5">



                                                <input type="hidden" id="{{$datas->id}}" name="{{$datas->id}}" value="">



                                                {{--{{$datas->question_week}} <br>--}}
                                                {{--{{$datas->question_account}} <br>--}}


                                                <h5>{!! $datas->question !!} </h5>

                                                @if($datas->question_type == "option" || is_null($datas->question_type))
                                                <p> You will receive a total of {{$datas->points}} points for choosing the correct answer :</p>
                                                <p>
                                                    @if(!empty($datas->choice_1))
                                                    <div class="radio">
                                                        <label><input id="{{$datas->id}}_A" type="radio" value="A" onclick="change('A',{{$datas->id}})" name="{{$datas->id}}" required> {{$datas->choice_1}} </label>
                                                    </div>
                                                    @endif

                                                    @if(!empty($datas->choice_2))
                                                    <div class="radio">
                                                        <label><input id="{{$datas->id}}_B" type="radio" value="B" name="{{$datas->id}}" onclick="change('B',{{$datas->id}})"> {{$datas->choice_2}} </label>
                                                    </div>
                                                    @endif
                                                    @if(!empty($datas->choice_3))
                                                    <div class="radio">
                                                        <label><input id="{{$datas->id}}_C" type="radio" value="C" name="{{$datas->id}}" onclick="change('C',{{$datas->id}})"> {{$datas->choice_3}} </label>
                                                    </div>
                                                    @endif
                                                    @if(!empty($datas->choice_4))
                                                    <div class="radio">
                                                        <label><input id="{{$datas->id}}_D" type="radio" value="D" name="{{$datas->id}}" onclick="change('D',{{$datas->id}})"> {{$datas->choice_4}} </label>
                                                    </div>
                                                    @endif
                                                    @if(!empty($datas->choice_5))
                                                    <div class="radio">
                                                        <label><input id="{{$datas->id}}_E" type="radio" value="E" name="{{$datas->id}}" onclick="change('E',{{$datas->id}})"> {{$datas->choice_5}} </label>
                                                    </div>
                                                    @endif
                                                    {{--{{$datas->answer}} <br>--}}
                                                    {{--{{$datas->quizz_file_name}} <br>--}}
                                                    {{-- <hr> --}}
                                                    <p> <span style="color:red;">Points : {{$datas->points ?? '0'}} </span> </p>

                                                    @endif

                                                    @if($datas->question_type == "text")
                                                    {{-- <hr> --}}
                                                    <textarea type="text" id="{{$datas->id}}" name="{{$datas->id}}" placeholder="Please type in your answer" rows="4" cols="100"></textarea>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-3  text-center">

                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <button type="button" class="btn btn-primary next my-auto">
                                                Next
                                            </button>

                                            @if($datas->id >$data[0]->id )
                                            <button type="button" class="btn btn-primary back ">
                                                Back
                                            </button>
                                            @endif
                                        </div>



                                    </div>

                                    @endforeach



                                    <div class="form-group row mb-0  options my-5 ">

                                        <div class="col-lg-12 mx-auto my-5" style="min-height:200px;">
                                            <br> <br>
                                            <p> To complete the quizz click on the submit button :</p>

                                            <button type="submit" class="btn btn-primary">
                                                Submit
                                            </button>

                                            <button type="button" class="btn btn-primary back ">
                                                Back
                                            </button>

                                            <button type="button" class="btn btn-primary show ">
                                                Summary
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

<script>
    var data = {
        items: []
    };



    function change(answer, id) {


        data.items.push({
            id: id
            , answer: answer
        });
        //
        // $("#skillz" ).val(JSON.stringify(data));

    }


    $(document).ready(function() {
        // $(".alert-success").fadeOut(3000);

        $(".options").hide().first().show();

        $(".next").click(function() {
            $(this).parents('.options').hide();
            $(this).parents('.options').next().show();


            if ($(".show").is(":visible")) {
                $(".options").show();
                $(".back").hide();
                $(".next").hide();
                $(".show").hide();
                $(".review").show();
            }

        });

        $(".back").click(function() {
            $(this).parents('.options').hide();
            $(this).parents('.options').prev().show();

        });


        $(".show").click(function() {
            $(".options").show();
            $(".back").hide();
            $(".next").hide();
            $(".show").hide();


            // data.each(function(id, el) {
            //
            //     $("#"+id ).prop("checked", true);
            //
            //
            // });

        });


    });

</script>

<script>
    var minutes = 10
    var seconds = 00

    document.quizz_form.quizz_timer.value = '10:00'

    function display() {
        if (seconds <= 0) {
            minutes -= 1
            seconds += 59
        }
        if (minutes <= -1) {
            minutes == 1
            seconds = 0

        } else
            seconds -= 1
        if (seconds < 10) {
            seconds = '0' + seconds;
        }
        if (minutes < 0) {
            console.log("Time is up");
            alert("Time is up. Answered Question will be automatically submitted. Thank you.");
            $("#moh-quiz-form").submit();

        } else {
            document.quizz_form.quizz_timer.value = minutes + ":" + seconds
            setTimeout("display()", 1000)
        }
    }
    display()

</script>



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
