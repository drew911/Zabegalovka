@extends('layouts.main')
@section('content')

<div class="container">

  <div class="row">
    <div class="col-sm-12">
      <h2 class="text-center">Edit Your Profile</h2><br>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="row dark-gray-bg margin-30">
        <br>
        <form class="form-horizontal" role="form" method="POST" action="{{route('updateUser')}}">
          {{ csrf_field() }}
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label"> First Name</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="name" value="{{ old('name',$user->name) }}" required autofocus>
              @if ($errors->has('name'))
              <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label for="surname" class="col-md-4 control-label">Surname</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="surname" value="{{ old('surname',$user->surname) }}" required>
            </div>
          </div>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
            <div class="col-md-6">
              <input type="email" class="form-control" name="email" value="{{ old('email',$user->email) }}" required>
              @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <!-- <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>
            <div class="col-md-6">
              <input type="password" class="form-control" name="password" value="{{ $user->password }}">
              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
            <div class="col-md-6">
              <input type="password" class="form-control" name="password_confirmation" value="{{ $user->password }}">
            </div>
          </div> -->
          <div class="form-group">
            <label for="date_of_birth" class="col-md-4 control-label">Your Birth Day</label>
            <div class="col-md-6">
              <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth',$user->date_of_birth)}}" required>
            </div>
          </div>
          <div class="form-group">
            <label for="phone" class="col-md-4 control-label">Phone Number</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="phone" value="{{ old('phone',$user->phone) }}" required>
            </div>
          </div>
          <div class="form-group">
            <label for="address" class="col-md-4 control-label">Address</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="address" value="{{ old('address',$user->address) }}" required>
            </div>
          </div>
          <div class="form-group">
            <label for="city" class="col-md-4 control-label">City</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="city" value="{{ old('city',$user->city) }}" required>
            </div>
          </div>
          <div class="form-group">
            <label for="zip_code" class="col-md-4 control-label">ZIP Code</label>

            <div class="col-md-6">
              <input type="number" class="form-control" name="zip_code" value="{{ old('zip_code',$user->zip_code) }}" required>
            </div>
          </div>
          <div class="form-group">
            <label for="country" class="col-md-4 control-label">Country</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="country" value="{{ old('country',$user->country) }}" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <input class="btn btn btn-white btn-sm btn-wide" value="update" type="submit">
            </div>
          </div>
        </form>
      </div>
    </div>
    @endsection
