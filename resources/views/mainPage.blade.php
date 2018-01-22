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
     <img src="https://i.ytimg.com/vi/4tY3z83Tzqk/maxresdefault.jpg" alt="Krokodilienos saslikas">
     <div class="carousel-caption">
       <h3>Krokodilienos saslikas</h3>
       <p><button class="btn btn-primary">Placiau</button></p>
     </div>
   </div>

   <div class="item">
     <img src="https://i.ytimg.com/vi/4tY3z83Tzqk/maxresdefault.jpg" alt="">
     <div class="carousel-caption">
       <h3>Krokodilienos saslikas</h3>
       <p><button class="btn btn-primary">Placiau</button></p>
     </div>
   </div>

   <div class="item">
     <img src="https://i.ytimg.com/vi/4tY3z83Tzqk/maxresdefault.jpg" alt=" ">
     <div class="carousel-caption">
       <h3>Krokodilienos saslikas</h3>
       <p><button class="btn btn-primary">Placiau</button></p>
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
        <div class="col-md-12">
            <h1>Welcome to Zabegalovka</h1>
        </div>
    </div>
</div>


<div class="container">


     <div class="row">
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="http://cepelinas.eu/wp-content/uploads/2015/01/51.jpg" alt="cepiakai">
          <div class="caption">
            <h3>Cepiakai</h3>
            <p>Zashibisj cepiakai, du nesuvalgysi</p>
            <p>9,99 &euro;</p>
            <p><a href="#" class="btn btn-primary" role="button">Add to cart</a></p>
          </div>
        </div>
      </div>

     <div class="col-sm-6 col-md-4">
       <div class="thumbnail">
         <img src="http://cepelinas.eu/wp-content/uploads/2015/01/51.jpg" alt="cepiakai">
         <div class="caption">
           <h3>Cepiakai</h3>
           <p>Zashibisj cepiakai, du nesuvalgysi</p>
           <p>9,99 &euro;</p>
           <p><a href="#" class="btn btn-primary" role="button">Add to cart</a></p>
         </div>
       </div>
     </div>
   </div>


</div>

@endsection
