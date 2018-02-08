@extends('layouts.main')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12 to-center">
      <h2>Reservations</h2>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12 to-center">
      <a href="{{ route('createReservations') }}" class="btn btn-big" role="button">Add Reservation</a>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">

      @foreach ($reservations as $reservation)
        <div class="col-md-6">
          <p>Name: {{$reservation->name}}</p>
          <p>Phone: {{$reservation->phone}}</p>
          <p>Date: {{$reservation->date}}</p>
          <p>Time: {{$reservation->time}}</p>
          <p>Duration: {{$reservation->duration}}</p>
          <p>Guests: {{$reservation->guests}}</p>
          <p><a href="{{$reservation->id}}"><button class="btn btn-danger">Delete</button></a>
          <a href="{{$reservation->id}}/edit"><button class="btn btn-primary">Edit</button></a> </p>
        </div>
      @endforeach

  </div>
</div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- <a href="{{-- route('') --}}" class="btn btn-big" role="button">Pay for all</a> -->
      </div>
    </div>
  </div>

  @endsection
