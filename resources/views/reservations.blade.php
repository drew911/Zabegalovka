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
      @if((Auth::check()) && (Auth::user()->is_admin == 1))
        <a href="{{ route('manageReservations') }}" class="btn btn-admin btn-big" role="button">Manage Restaurant Reservations</a>
      @endif
      <a href="{{ route('createReservations') }}" class="btn btn-big" role="button">New Reservation</a>
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

          <!-- <p><a href="{{route('deleteReservations', $reservation->id)}}"><button class="btn btn-danger">Delete</button></a> -->
          <a href="{{route('editReservations', $reservation->id)}}"><button class="btn btn-primary">Edit</button></a> </p>
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
