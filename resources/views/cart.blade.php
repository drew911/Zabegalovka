@extends('layouts.main')
@section('content')

<div class="container">
  <div class="row">
    <div class=".col-md-12 to-center">
      <h2>You have {{$cartSize}} dishes selected </h2>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">


    @foreach ($carts as $cart)
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4">
          <img class="img-responsive" src="{{$cart->dishes->image}}">
        </div>
        <div class="col-md-2">
          <h3>{{$cart->dishes->name}}</h3>
        </div>
        <div class="col-md-2">
          <p><button class="btn btn-primary">-</button> 1 <button class="btn btn-primary">+</button></p>
          <a href="{{ route('cart.minus', ['id'=> $cart->dishes->id]) }}"><i class="fa fa-minus-square fa-lg" ></i>&nbsp;&nbsp;</a>
          {{ $cart ['quantity'] }}
          <a href="{{ route('cart.add', ['id'=>$cart->dishes->id]) }}">&nbsp;&nbsp;<i class="fa fa-plus-square fa-lg" ></i></a>
        </div>
        <div class="col-md-2">
          <p>price: {{$cart->dishes->price}} &euro; </p>
        </div>
        <div class="col-md-2">
          <a class="btn btn-danger" href="{{route('deleteFromCart', $cart->id)}}">Remove from cart</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4">
          <h3>Cart information</h3>
        </div>
        <div class="col-md-2">
          <h3>{{$cartSize}} items selected</h3>
        </div>
        <div class="col-md-2">
          <p>Total price: {{number_format($beforeTaxes,2)}} &euro; </p>
        </div>
        <div class="col-md-2">
          <p>VAT = {{number_format($vat,2)}} &euro; </p>
        </div>
        <div class="col-md-2">
          <p>Total price with VAT: {{number_format($totalPrice,2)}} &euro; </p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <form method="post" action="{{ route('makeOrder') }}" class="form-horizontal">
        {{csrf_field()}}
        <button type="submit" class="btn btn-big" role="button">Make Order</button>
      </form>
    </div>
  </div>

</div>
</div>





@endsection
