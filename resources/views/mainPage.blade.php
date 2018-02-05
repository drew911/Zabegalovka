@extends('layouts.main')

@section('content')


<div id="myCarousel" class="carousel slide" data-ride="carousel">
 <!-- Indicators -->
 <ol class="carousel-indicators">
   <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
   <li data-target="#myCarousel" data-slide-to="1"></li>
   <li data-target="#myCarousel" data-slide-to="2"></li>
 </ol>

 <!-- Wrapper for slides -->
 <div class="carousel-inner">
   <div class="item active">
     <img src="{{ url('storage/photos/spot interior1.jpg') }}" alt="">
     <div class="carousel-caption">
       <h2>Healthy - means delicious in "SPOT"</h2>
       <p></p>
     </div>
   </div>

   <div class="item">
     <img src="{{ url('storage/photos/spot interior2.jpg') }}" alt="">
     <div class="carousel-caption">
       <h2>Healthy - means delicious in "SPOT"</h2>
       <p></p>
     </div>
   </div>

   <div class="item">
     <img src="{{ url('storage/photos/spot interior3.jpg') }}" alt=" ">
     <div class="carousel-caption">
       <h2>Healthy - means delicious in "SPOT"</h2>
       <p></p>
     </div>
   </div>
 </div>

 <!-- Left and right controls -->
 <a class="left carousel-control" href="#myCarousel" data-slide="prev">
   <span class="glyphicon glyphicon-chevron-left"></span>
   <span class="sr-only">Previous</span>
 </a>
 <a class="right carousel-control" href="#myCarousel" data-slide="next">
   <span class="glyphicon glyphicon-chevron-right"></span>
   <span class="sr-only">Next</span>
 </a>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12 to-center">
            <h1>Welcome to Spot</h1>
        </div>
    </div>
</div>


<div class="container">





</div>

@endsection
