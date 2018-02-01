@extends('layouts.main')
@section('content')

<div class="container">
  <div class="row">
    <div class=".col-md-12 to-center">
      <h2>Cart (3)</h2>
      <p>Your selected dishes list</p>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4">
          <img class="img-responsive" src="http://ew.content.allrecipes.com/sites/default/files/inline-images/coffee_960.jpg">
        </div>
        <div class="col-md-2">
          <h3>dish name</h3>
        </div>
        <div class="col-md-2">
          <p><button class="btn btn-primary">-</button> 1 <button class="btn btn-primary">+</button></p>
        </div>
        <div class="col-md-2">
          <p>price: 9 &euro; </p>
        </div>
        <div class="col-md-2">
          <button class="btn btn-danger">remove from list</button>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4">
          <img class="img-responsive" src="http://ew.content.allrecipes.com/sites/default/files/inline-images/coffee_960.jpg">
        </div>
        <div class="col-md-2">
          <h3>dish name</h3>
        </div>
        <div class="col-md-2">
          <p><button class="btn btn-primary">-</button> 1 <button class="btn btn-primary">+</button></p>
        </div>
        <div class="col-md-2">
          <p>price: 9 &euro; </p>
        </div>
        <div class="col-md-2">
          <button class="btn btn-danger">remove from list</button>
        </div>
      </div>
    </div>
  </div>
</div>





@endsection
