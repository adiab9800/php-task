@extends('layouts.master')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{route('categories.update',$category)}}" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <input type="hidden" name="id" value="{{$category->id}}">
      <div class="card-body row">
        <div class="form-group col-md-6">
            <label for="">Name</label>
            <input type="text" class="form-control" id="" value="{{$category->name}}" name="name" placeholder="Enter Name">
            @if($errors->has('name'))
                 <span class="text-danger" role="alert">
                     {{ $errors->first('name') }}
                    </span>
            @endif
          </div>
          <div class="form-group col-md-6">
            <label for="">Status</label><br>
            <input class="form-control" type="checkbox" name="is_active" @if($category->is_active) checked @endif data-bootstrap-switch>
            @if($errors->has('is_active'))
                 <span class="text-danger" role="alert">
                     {{ $errors->first('is_active') }}
                    </span>
            @endif
          </div>
      </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  </div>
@endsection