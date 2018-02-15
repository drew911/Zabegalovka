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
        <h3></h3>
      </div>
      <div class="col-md-4">
        <h3>Rekvizitai</h3>
        <p>Bank: Gringots bank </br>
           Bank account number: HR 36465647272683863 </br>
           Payment purpose:order ID
           @foreach ($orders as $order)
           {{$order->id}} ,
           @endforeach
          </br>
           Total amount: {{$totalOrdersAmount}}
          </br>
        </p>
      </div>
      <div class="col-md-4">
        <div>
        <h3><a class="navbar-brand" href="{{ 'https://ib.dnb.lt/' }}">
          <img src="{{ url('storage/photos/Luminor_Logo.jpg') }}">
        </a></h3>
      </div>
      <div>
        <h3><a class="navbar-brand" href="{{ 'https://e.seb.lt/mainib/web.p' }}">
          <img src="{{ url('storage/photos/SEB Logotypes.jpg') }}">
        </a></h3>
      </div>
      <div>
        <h3><a class="navbar-brand" href="{{ 'https://ib.swedbank.lt/private' }}">
          <img src="{{ url('storage/photos/swedbank-logo.png') }}">
        </a></h3>
      </div>

      </div>


    </div>
  </div>

  </div>

</div>





@endsection
