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



  <table class="table">
    <thead>
      <tr>
        <th scope="col" colspan="2">Dishes</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($carts as $cart)
      <tr>
        <td><img style="width:150px" class="img-static" src="{{$cart->dishes->image}}"></td>
        <td class="middle"><h4>{{$cart->dishes->name}}</h4></td>
        <td class="middle"><p>
          <a href="{{ route('cart.minus', ['id'=> $cart->dishes->id]) }}" class="btn btn-primary">-</a>
          {{$cart->count}}
          <a href="{{ route('cart.add', ['id'=>$cart->dishes->id]) }}" class="btn btn-primary">+</a></p>
        </td>
        <td class="middle"><p> {{($cart->dishes->price) * ($cart->count)}} &euro; </p></td>
        <td class="middle"><a class="btn btn-danger" href="{{route('deleteFromCart', $cart->id)}}">Remove from cart</a></td>
      </tr>
      @endforeach

      <tr class="row-total">
        <td colspan="2"><p><b>{{$cartSize}} items</b> selected</p></td>
        <td><p>Total price: <b>{{number_format($beforeTaxes,2)}} &euro;</b> </p></td>
        <td><p>VAT = <b>{{number_format($vat,2)}} &euro;</b> </p></td>
        <td><p>Total price with VAT: <b>{{number_format($totalPrice,2)}} &euro;</b> </p></td>
      </tr>

    </tbody>
  </table>

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
