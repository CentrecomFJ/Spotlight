@extends('layouts.aquizz_app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <div class="row col-lg-12">
        <div class="container">
        <div class="row justify-content-left">
            @if(session()->has('alert-success'))
                <div id="success-alert" class="col-md-12">
                    <div class="alert alert-success">
                        {{ session()->get('alert-success') }}
                    </div>
                </div>
            @endif

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header" style="color:white;background:#423326" >


                          {{--<img  class="pull-right" src="https://media.jtdwjcwq6f4wp4ce.com/fj/logos/fj-large-default.png" >--}}

                        <h4 >Open Ended Quiz </h4>



                    </div>




                    <div class="card-body">
                        <form method="POST" id="apply-form" action="{{ route('open-quizz-loader-view-submit') }}">
                            @csrf

                            <div style="color:red;font-size:22px;">Quiz closes in 20 minutes  You have one attempt <span id="time">20:00</span> minutes left!</div>
                             <p> We have given 8 grace minutes , Answer all the questions and than click save at the bottom of the page
                            <br> Make sure that  you finish  this before the clock turns 0 else your answer will  be disqualified ! <p>




                             @foreach($data as $datas)
                            <div class="form-group row">
                                <label for="observation" class="col-md-12 col-form-label text-md-left"><b> {{$datas->id}}) {{$datas->question ?? null}} </b> </label>


                            </div>


                            <div class="form-group row">

                                <div class="col-md-12">
                                    <hr>
                                    <textarea id="{{$datas->id}})" style="min-height:300px;" type="text" class="form-control" name="{{$datas->alpha}}"   autocomplete="observation" autofocus></textarea>

                                </div>
                            </div>


                            <hr>
                            @endforeach










                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" id="submit_form" class="btn btn-primary">
                                        Save
                                    </button>


                                    <button type="submit" class="btn btn-primary">
                                        Reset
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>





    {{--<script>--}}
        {{--initSample();--}}
        {{--CKEDITOR.replace( 'editor_2' );--}}
        {{--CKEDITOR.add--}}

    {{--</script>--}}
    <script>
        // Set the date we're counting down to
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        window.onload = function () {
            var fiveMinutes = 60 * 28,
                display = document.querySelector('#time');
            startTimer(fiveMinutes, display);
        };

    </script>
    <script>
        $(document).ready(function(){
          //  $(".alert-success").fadeOut(3000);





            $('#submit_form').click(function(e)
            {

                    $('#apply-form').submit();


            });





        });



    </script>


    <style>
.warning{background-color:lightcoral;}
        .gj-datepicker-bootstrap [role=right-icon] button {
            width: 38px;
            position: relative;
            border:none ;
        }
    </style>
@endsection



