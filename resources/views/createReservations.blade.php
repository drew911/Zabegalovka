@extends('layouts.main')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title">New Reservation</div>
        </div>
        <div class="panel-body" >
          <form method="POST" action="{{route('storeReservation')}}" class="form-horizontal" enctype="multipart/form-data" role="form">
            {!! csrf_field() !!}
            <fieldset>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-3 control-label" for="name">Name</label>
                <div class="col-md-9">
                  <input name="name" type="text" placeholder="Name" class="form-control input-md" required="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label" for="phone">Phone</label>
                <div class="col-md-9">
                  <input type="text" placeholder="Phone" class="form-control input-md" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label" for="date">Date</label>
                <div class="col-md-9">
                  <input name="date" type="date" placeholder="Date" class="form-control input-md" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label" for="time">Time</label>
                <div class="col-md-9">
                  <input name="time" type="time" placeholder="Time" class="form-control input-md" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label" for="duration">Duration</label>
                <div class="col-md-9">
                  <input name="duration" type="text" placeholder="Duration" class="form-control input-md" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label" for="guests">Guests</label>
                <div class="col-md-9">
                  <select name="guests" class="form-control input-md">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>                  
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label" for="submit"></label>
                <div class="col-md-9">
                  <button name="submit" class="btn btn-primary">Save reservation</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  @endsection
