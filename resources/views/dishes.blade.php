@extends('layouts.main')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">



        <div class="col-md-12">
          @if((Auth::check()) && (Auth::user()->is_admin == 1))
          <a href="{{ route('createDishes') }}" class="btn btn-large btn-block btn-primary" role="button">Add Dish</a>
          @endif
        </div>





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
                   <a href="{{route('editDish', $dish->id)}}" class="btn btn-success" role="button">Edit</a>
                   <a href="{{route('deleteDish', $dish->id)}}" class="btn btn-danger" role="button">Delete</a>
                   @endif

                  <a href="#" class="btn btn-primary" role="button">Add to cart</a></p>
                </div>
              </div>
            </div>
            @endforeach



    </div>
  </div>
</div>
@endsection
