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


{{--@foreach ($orders as $order)--}}
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-3">
          {{--@foreach ($dishes as $dish--)}}
          <h4>{{$order->dishes->name}}</h4>
          {{--@endforeach--}}
        </div>
        <div class="col-md-3">
          <p>price: {{--$order->totalPrice--}} &euro; </p>
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
{{--@endforeach--}}
</div>


<div class="row">
  <div class="col-md-12">
      <a href="{{-- route('') --}}" class="btn btn-big" role="button">Pay for all</a>
  </div>
</div>

  </div>
</div>





@endsection
