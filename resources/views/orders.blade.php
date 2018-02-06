@extends('layouts.main')
@section('content')

<div class="container">
  <div class="row">
    <div class=".col-md-12 to-center">
      <h2>You have !!kiek orderiu!! orders </h2>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">


  @foreach ($orders as $order)
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-3">
          @foreach ($order->carts as $cart)
          <h4>{{$cart->dishes->name}}</h4>
          @endforeach
        </div>
        <div class="col-md-3">
          <p>price: {{$order->total_amount}} &euro; </p>
        </div>
        <div class="col-md-3">
          Date: irasyti data
        </div>
        <div class="col-md-3">
          <button class="btn btn-danger">Delete order</button>
          <button class="btn btn-danger">Pay</button>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="{{-- route('') --}}" class="btn btn-big" role="button">Pay for all</a>
    </div>
  </div>
</div>

@endsection
