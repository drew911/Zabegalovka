@extends('layouts.main')
@section('content')

<div class="container">
  <div class="row">
    <div class=".col-md-12 to-center">
      <h2> Payment </h2>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">


    <div class="row">
      <div class="col-md-4">
      </div>
      <div class="col-md-4 to-center">
          <h3>Rekvizitai</h3>
          <p>Bank: Gringots bank </br>
             Bank account number: HR 36465647272683863 </br>
             Payment purpose: <b>Order Nr
             @foreach ($orders as $order)
             {{$order->id}},
             @endforeach
              </b></br>
             Total amount: <b>{{$totalOrdersAmount}} &euro;</b>
            </br>
          </p>
      </div>
      <div class="col-md-4">
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-2">
        <a class="navbar-brand" target="_blank" href="{{ 'https://ib.dnb.lt/' }}">
          <img src="{{ url('storage/photos/bank-1.jpg') }}">
        </a>
      </div>
      <div class="col-md-2">
        <a class="navbar-brand" target="_blank" href="{{ 'https://e.seb.lt/mainib/web.p' }}">
          <img src="{{ url('storage/photos/bank-2.jpg') }}">
        </a>
      </div>
      <div class="col-md-2">
        <a class="navbar-brand" target="_blank" href="{{ 'https://ib.swedbank.lt/private' }}">
          <img src="{{ url('storage/photos/bank-3.jpg') }}">
        </a>
      </div>
      <div class="col-md-3">
      </div>
    </div>


    </div>
  </div>

  </div>


  <div class="container">
    <div class="row">
      <div class=".col-md-12 to-center">
      </br></br></br></br></br>
        <p> Made by Pasileideliai 2018 </p>
      </div>
    </div>
  </div>




</div>





@endsection
