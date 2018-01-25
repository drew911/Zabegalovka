@extends('layouts.main')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title">New Dish</div>
        </div>
        <div class="panel-body" >
          <form method="POST" action="{{route('storeDishes')}}" class="form-horizontal" enctype="multipart/form-data" role="form">
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
                <label class="col-md-3 control-label" for="description">Description</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="description"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label" for="price">Price</label>
                <div class="col-md-9">
                  <input name="price" type="text" placeholder="Price" class="form-control input-md" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label" for="image">Image</label>
                <div class="col-md-9">
                  <input type="file" name="image" class="form-control input-md" >
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label" for="submit"></label>
                <div class="col-md-9">
                  <button name="submit" class="btn btn-primary">Insert</button>
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
