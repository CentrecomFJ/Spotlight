@extends('layouts.aquizz_app')

@section('content')

<br> <br>
 <div class="container bg-white " style="min-height:400px;border: solid 5px #2eb2ff;">

   <div class="row col-lg-12">
  <div class="col-lg-6 mt-5 mb-5">


 <p class="text-center mt-lg-5"> <img src="/img/thankyou_fail.png" style="width:40%;" class="img-fluid"> </p>
  </div>



 <div class="col-lg-6 mt-5 border mb-5">

   <br>   <br>  <br>
   <h3 class="text-center" style="color:red;">Thank You <br> <br> you scored  {{$total_points_achieved}} out of  {{$total_points}}  <br> <br> thats  %{{$percentage}}  out of %100</h3>

   <p class="text-center p-5 border-top">Oh snap , You fell a little short ,Read up and try the quizz again !! <br>
      If at first you dont succeed , try and try again till you do !! .
       <br>

     <a href="{{route('show-leader-board')}}" class="btn btn-primary  text-white  mb-2 mt-3" style="background-color:#2eb2ff;border-color:#2eb2ff;margin-left:5px;">
       <i class="fa fa-paper-plane-o" aria-hidden="true"></i>

       &nbsp;  &nbsp;View Leader board</a>
   </p>



 </div>


   </div>
 </div>

@endsection