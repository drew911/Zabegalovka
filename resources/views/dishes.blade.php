@extends('layouts.main')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      @if((Auth::check()) && (Auth::user()->is_admin == 1))
        <a href="{{ route('createDishes') }}" class="btn btn-admin btn-big" role="button">Add Dish</a>
      @endif
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12 to-center">
      <h2>Discover your Flavour</h2>
      <p>Over Daily Bases Recipes</p>
    </div>
  </div>
</div>


<div class="container">
  <div class="row">
    @foreach ($dishes as $dish)
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="{{$dish->image}}" alt="fotke">
          <div class="caption">
            <h3>{{$dish->name}}</h3>
            <p>{{$dish->description}}</p>
            <p>{{$dish->price}} &euro;</p>
            <p>
              @if((Auth::check()) && (Auth::user()->is_admin == 1))
                <a href="{{route('editDish', $dish->id)}}" class="btn btn-admin" role="button">Edit</a>
                <a href="{{route('deleteDish', $dish->id)}}" class="btn btn-admin" role="button">Delete</a>
              @endif
              <form action="{{route('addToCart', $dish->id)}}" method="POST">
                {!! csrf_field() !!}
                <input type="hidden" name="token" value="{{$dish->token}}">
                <input type="hidden" name="dish_id" value="{{$dish->id}}" >
                <input type="hidden" name="user_id" value="" >
                <!-- <input type="hidden" name="name" value="{{$dish->name}}" > -->
                <!-- <input type="hidden" name="description" value="{{$dish->description}}" > -->
                <!-- <input type="hidden" name="price" value="{{$dish->price}}" > -->
                <button type="submit" class="js-add-to-cart btn btn-primary" role="button">Add to cart</a>
              </form>
            </p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>


@endsection


@section('javascript')

<script type="text/javascript">
    $(document).ready(function() {

        $('.js-add-to-cart').on('click', function(e){  //pasiima butona ir paleidzia funkcija "e"

            e.preventDefault(); // preventina perejima i puslapi

            var form = $(this).parent(); // kintamasis "fomr" lygu submitintai formai

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                success: function(data){

                    data = JSON.parse(data); // duomenis isverciam i masyva


                    var cartTotal = $('#cart .cart-total'), // priskiriam klase
                        cartSize = $('#cart .cart-size'), // priskiriam klasia
                        currentPrice = cartTotal.text(),
                        currentSize = cartSize.text(),
                        totalPrice = (currentPrice*1) + data.price,
                        totalSize = (currentSize*1) + 1;

                        cartTotal.text(totalPrice.toFixed(2));
                        cartSize.text(totalSize);

                    // console.log(data);
                },
                error: function(msg){
                    console.log(msg.responseText);
                    $('html').prepend(msg.responseText);
                }
            })
        });

    });
    </script>
@endsection
