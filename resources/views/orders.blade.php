@extends('layouts.main')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12 to-center">
      <h2>{{$ordersHeading}}</h2>
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
          <p>Order created: {{$order->created_at}}</p>
        </div>
        <div class="col-md-3">
          <a class="btn btn-danger" href="{{route('deleteFromOrders', $order->id)}}">Remove from orders</a>
          <!-- <a href="{{route('payment')}}" class="btn btn-danger">Pay</a> -->
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="{{route('payment')}}" class="btn btn-big" role="button">Pay for all</a>
    </div>
  </div>
</div>

@endsection
