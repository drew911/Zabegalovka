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
    <div class="col-md-12">


    <div class="row">
      <div class="col-md-6">
        <h3>Dishes</h3>
      </div>
      <div class="col-md-2">
        <h3>Quantity</h3>
      </div>
      <div class="col-md-2">
        <h3>Price</h3>
      </div>
      <div class="col-md-2">
        <h3>Actions</h3>
      </div>
    </div>

    @foreach ($carts as $cart)
      <div class="row">
        <div class="col-md-2">
          <img class="img-responsive" src="{{$cart->dishes->image}}">
        </div>
        <div class="col-md-4">
          <h4>{{$cart->dishes->name}}</h4>
        </div>

        <div class="col-md-2">
          <p>
            <a href="{{ route('cart.minus', ['id'=> $cart->dishes->id]) }}" class="btn btn-primary">-</a>
            {{$cart->count}}
            <a href="{{ route('cart.add', ['id'=>$cart->dishes->id]) }}" class="btn btn-primary">+</a>
          </p>
        </div>

        <div class="col-md-2">
          <p> {{($cart->dishes->price) * ($cart->count)}} &euro; </p>
        </div>
        <div class="col-md-2">
          <a class="btn btn-danger" href="{{route('deleteFromCart', $cart->id)}}">Remove from cart</a>
        </div>
      </div>
    @endforeach


    </div>
  </div>




  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4">
          <h3>Cart information</h3>
        </div>
        <div class="col-md-2">
          <h4>{{$cartSize}} items selected</h4>
        </div>
        <div class="col-md-2">
          <h4>Total price: {{number_format($beforeTaxes,2)}} &euro; </h4>
        </div>
        <div class="col-md-2">
          <h4>VAT = {{number_format($vat,2)}} &euro; </h4>
        </div>
        <div class="col-md-2">
          <h4>Total price with VAT: {{number_format($totalPrice,2)}} &euro; </h4>
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
