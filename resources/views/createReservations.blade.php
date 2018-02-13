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



          <form method="POST" action="{{route('storeReservations')}}" class="form-horizontal" role="form">
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
                  <input type="text" name="phone" placeholder="Phone" class="form-control input-md" required="">
                  @if ($errors->has('phone'))
                    <i class="has-error ">{{ $errors->first('phone') }}</i></br>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label" for="date">Date</label>
                <div class="col-md-9">
                  <input name="date" type="date" placeholder="Date" class="form-control input-md" required="">
                  @if ($errors->has('date'))
                    <i class="has-error ">{{ $errors->first('date') }}</i></br>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label" for="time">Time</label>
                <div class="col-md-9">
                  <select name="time"  class="form-control input-md">
                    <option value="11:00">11:00</option>
                    <option value="11:30">11:30</option>
                    <option value="12:00">12:00</option>
                    <option value="12:30">12:30</option>
                    <option value="13:00">13:00</option>
                    <option value="13:30">13:30</option>
                    <option value="14:00">14:00</option>
                    <option value="14:30">14:30</option>
                    <option value="15:00">15:00</option>
                    <option value="15:30">15:30</option>
                    <option value="16:00">16:00</option>
                    <option value="16:30">16:30</option>
                    <option value="17:00">17:00</option>
                    <option value="17:30">17:30</option>
                    <option value="18:00">18:00</option>
                    <option value="18:30">18:30</option>
                    <option value="19:00">19:00</option>
                    <option value="19:30">19:30</option>
                    <option value="20:00">20:00</option>
                    <option value="20:30">20:30</option>
                    <option value="21:00">21:00</option>
                    <option value="21:30">21:30</option>
                    <option value="22:00">22:00</option>
                    <option value="22:30">22:30</option>
                    <option value="23:00">23:00</option>
                    <option value="23:30">23:30</option>
                    <option value="24:00">24:00</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label" for="duration">Duration</label>
                <div class="col-md-9">
                  <select name="duration" class="form-control input-md">
                    <option value="1">1 hour</option>
                    <option value="2">2 hours</option>
                    <option value="3">3 hours</option>
                    <option value="3">3 hours</option>
                    <option value="4">4 hours</option>
                    <option value="5">5 hours</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label" for="guests">Persons</label>
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
                  <button type="submit" class="btn btn-primary">Save reservation</button>
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
