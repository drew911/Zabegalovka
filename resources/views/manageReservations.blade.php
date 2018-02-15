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




    <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">User ID</th>
      <th scope="col">Phone</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Duration</th>
      <th scope="col">Guests</th>
      <th scope="col">Created</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($reservations as $reservation)
    <tr>
      <td>{{$reservation->name}}</td>
      <td>{{$reservation->user_id}}</td>
      <td>{{$reservation->phone}}</td>
      <td>{{$reservation->date}}</td>
      <td>{{$reservation->time}}</td>
      <td>{{$reservation->duration}}</td>
      <td>{{$reservation->guests}}</td>
      <td>{{$reservation->created_at}}</td>
      <td>
      <a href="{{route('editReservations', $reservation->id)}}"><button class="btn btn-primary">Edit</button></a>
      <a href="{{route('deleteReservations', $reservation->id)}}"><button class="btn btn-danger">Delete</button></a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>









  </div>
</div>


@endsection
