@extends('layouts.aquizz_app')

@section('content')

<br> <br>
 <div class="container bg-white mt-5" style="min-height:400px;border: solid 5px #2eb2ff;">

   <div class="row col-lg-12">
  <div class="col-lg-6 mt-5 mb-5">

<br><br>
 <p class="text-center"> <img src="/img/thankyou.png" style="width:40%;" class="img-fluid"> </p>
  </div>



 <div class="col-lg-6 mt-5 border mb-5">

   <br>   <br>
   <h3 class="text-center" style="color:#2eb2ff;">Thank You <br> <br> you scored  {{$total_points_achieved}} out of  {{$total_points}}  <br> <br> thats  %{{$percentage}}  out of %100</h3>
   <br>
   <p class="text-center p-5 border-top">Congrats you  passed !! <br>

     <a href="{{route('show-leader-board')}}" class="btn btn-primary  text-white  mb-2 mt-3" style="background-color:#2eb2ff;border-color:#2eb2ff;margin-left:5px;">
       <i class="fa fa-paper-plane-o" aria-hidden="true"></i>

       &nbsp;  &nbsp;View Leader board</a>
   </p>



 </div>


   </div>
 </div>

@endsection