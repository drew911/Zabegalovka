@extends('layouts.main')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12 to-center">
      <h2>Restaurant Reservations</h2>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">



    <div class="col-md-12">

      <div class="row">
        <div class="col-md-2">
          <p>Name</p>
        </div>
        <div class="col-md-1">
          <p>User ID</p>
        </div>
        <div class="col-md-2">
          <p>Phone</p>
        </div>
        <div class="col-md-1">
          <p>Date</p>
        </div>
        <div class="col-md-1">
          <p>Time</p>
        </div>
        <div class="col-md-1">
          <p>Duration:</p>
        </div>
        <div class="col-md-1">
          <p>Guests</p>
        </div>
        <div class="col-md-2">
          <p>Created</p>
        </div>
        <div class="col-md-1">
        </div>
      </div>

      @foreach ($reservations as $reservation)
        <div class="row">
          <div class="col-md-2">
            <p>{{$reservation->name}}</p>
          </div>
          <div class="col-md-1">
            <p>{{$reservation->user_id}}</p>
          </div>
          <div class="col-md-2">
            <p>{{$reservation->phone}}</p>
          </div>
          <div class="col-md-1">
            <p>{{$reservation->date}}</p>
          </div>
          <div class="col-md-1">
            <p>{{$reservation->time}}</p>
          </div>
          <div class="col-md-1">
            <p>{{$reservation->duration}} h</p>
          </div>
          <div class="col-md-1">
            <p>{{$reservation->guests}}</p>
          </div>
          <div class="col-md-2">
            <p>{{$reservation->created_at}}</p>
          </div>
          <div class="col-md-1">
            <a href="{{route('editReservations', $reservation->id)}}"><button class="btn btn-primary">Edit</button></a> </p>
            <p><a href="{{route('deleteReservations', $reservation->id)}}"><button class="btn btn-danger">Delete</button></a>
          </div>
        </div>
      @endforeach


    </div>

  </div>
</div>


@endsection
