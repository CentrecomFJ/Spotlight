@extends('layouts.aquizz_app')

@section('content')


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

            <div class="col-md-11 mx-auto">
                <div class="card">


                    <div class="card-body">
                        <form method="POST" action="#" class="dropzoned" enctype="multipart/form-data" >
                            @csrf


                         <div class="container">

                             {{--<input type="text" id="skillz"  name="skillz" value="" >--}}
                             <input type="hidden" name="employee_code" value="{{$user_id}}" >
                             <input type="hidden" name="fj_quizz_week" value="{{$data[0]->question_week}}" >

                             <input type="hidden" name="fj_quizz_account" value="{{$data[0]->question_account}}" >

                             <br>
                             <div "row justify-content-left" >
                                     <div id="success-alert" class="review col-md-12" style="display:none;">
                                         <div class="review alert alert-success">
                                          You are almost done , Review your answers and click submit
                                         </div>
                                     </div>

                           @foreach($data as $datas)
                            <div class="col-lg-12 row my-5 options border">


                              <div class="col-lg-7 border-right ">
                                <div class="some-inputs  mt-5">



                                    <input type="hidden" id="{{$datas->id}}"  name="{{$datas->id}}" value="" >



                                    {{--{{$datas->question_week}} <br>--}}
                                    {{--{{$datas->question_account}} <br>--}}


                                    <h2>{{$datas->question}} </h2>
                                    <p> You will receive a total of  {{$datas->points}} points for choosing the correct answer :</p>
                                    <p>




                                    <div class="radio">
                                        <label  ><input  {{$datas->answer=="A"? 'checked':''}} id="{{$datas->id}}_A" type="radio" value="A" onclick="change('A',{{$datas->id}})" name="{{$datas->id}}" checked="" required > {{$datas->choice_1}} </label>
                                    </div>

                                    <div class="radio">
                                        <label><input {{$datas->answer=="B"? 'checked':''}} id="{{$datas->id}}_B" type="radio" value="B" name="{{$datas->id}}" onclick="change('B',{{$datas->id}})" > {{$datas->choice_2}} </label>
                                    </div>


                                    <div class="radio">
                                        <label ><input {{$datas->answer=="C"? 'checked':''}} id="{{$datas->id}}_C" type="radio" value="C" name="{{$datas->id}}"  onclick="change('C',{{$datas->id}})" > {{$datas->choice_3}} </label>
                                    </div>


                                    <div class="radio">
                                        <label><input {{$datas->answer=="D"? 'checked':''}} id="{{$datas->id}}_D" type="radio" value="D" name="{{$datas->id}}"  onclick="change('D',{{$datas->id}})" > {{$datas->choice_4}} </label>
                                    </div>

                                    <div class="radio">
                                        <label><input  {{$datas->answer=="E"? 'checked':''}} id="{{$datas->id}}_E" type="radio" value="E" name="{{$datas->id}}" onclick="change('E',{{$datas->id}})" > {{$datas->choice_5}} </label>
                                    </div>

                                    {{--{{$datas->answer}} <br>--}}
                                    {{--{{$datas->quizz_file_name}} <br>--}}
                                      <hr>
                                   <p > <span style="color:red;">Points : {{$datas->points ?? '0'}}  </span>   </p>
                                </div>
                              </div>
                                <div class="col-lg-5  text-center">

                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <p>The correct answer is </p>
                                     <img src="{{asset('/img/good_tick.png')}}" style="width:50px;"><h4>  {{$datas->answer ?? '0'}} </h4>




                                </div>



                            </div>

                        @endforeach




                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>







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

        .funkyradio input[type="radio"]:empty ~ label,
        .funkyradio input[type="checkbox"]:empty ~ label {
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

        .funkyradio input[type="radio"]:empty ~ label:before,
        .funkyradio input[type="checkbox"]:empty ~ label:before {
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

        .funkyradio input[type="radio"]:hover:not(:checked) ~ label,
        .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
            color: #888;
        }

        .funkyradio input[type="radio"]:hover:not(:checked) ~ label:before,
        .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
            content: '\2714';
            text-indent: .9em;
            color: #C2C2C2;
        }

        .funkyradio input[type="radio"]:checked ~ label,
        .funkyradio input[type="checkbox"]:checked ~ label {
            color: #777;
        }

        .funkyradio input[type="radio"]:checked ~ label:before,
        .funkyradio input[type="checkbox"]:checked ~ label:before {
            content: '\2714';
            text-indent: .9em;
            color: #333;
            background-color: #ccc;
        }

        .funkyradio input[type="radio"]:focus ~ label:before,
        .funkyradio input[type="checkbox"]:focus ~ label:before {
            box-shadow: 0 0 0 3px #999;
        }

        .funkyradio-default input[type="radio"]:checked ~ label:before,
        .funkyradio-default input[type="checkbox"]:checked ~ label:before {
            color: #333;
            background-color: #ccc;
        }

        .funkyradio-primary input[type="radio"]:checked ~ label:before,
        .funkyradio-primary input[type="checkbox"]:checked ~ label:before {
            color: #fff;
            background-color: #337ab7;
        }

        .funkyradio-success input[type="radio"]:checked ~ label:before,
        .funkyradio-success input[type="checkbox"]:checked ~ label:before {
            color: #fff;
            background-color: #5cb85c;
        }

        .funkyradio-danger input[type="radio"]:checked ~ label:before,
        .funkyradio-danger input[type="checkbox"]:checked ~ label:before {
            color: #fff;
            background-color: #d9534f;
        }

        .funkyradio-warning input[type="radio"]:checked ~ label:before,
        .funkyradio-warning input[type="checkbox"]:checked ~ label:before {
            color: #fff;
            background-color: #f0ad4e;
        }

        .funkyradio-info input[type="radio"]:checked ~ label:before,
        .funkyradio-info input[type="checkbox"]:checked ~ label:before {
            color: #fff;
            background-color: #5bc0de;
        }

    </style>



@endsection



