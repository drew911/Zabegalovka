@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2>My profile</h2>
            <ul>
              <li>Name: {{$user->name}}</li>
              <li>Surname: {{$user->surname}}</li>

            </ul>

        </div>
    </div>
</div>
@endsection
