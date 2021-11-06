@extends('layouts.master')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{route('courses.update',$course)}}" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="card-body row">
        <div class="form-group col-md-6">
          <label for="">Name</label>
          <input type="text" class="form-control" id="" value="{{$course->name}}" name="name" placeholder="Enter Name">
          @if($errors->has('name'))
                <span class="text-danger" role="alert">
                    {{ $errors->first('name') }}
                  </span>
          @endif
        </div>
        <div class="form-group col-md-6">
          <label for="">Category</label>
          <select class="form-control" name="category_id">
            @foreach ($categories as $category)
                <option @if($category->id == $course->category_id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
          @if($errors->has('category_id'))
                <span class="text-danger" role="alert">
                    {{ $errors->first('category_id') }}
                  </span>
          @endif
        </div>
        <div class="form-group col-md-6">
          <label for="">Rating</label>
          <input type="number" class="form-control" id="" value="{{$course->rating}}" name="rating" placeholder="Enter rating">
          @if($errors->has('rating'))
                <span class="text-danger" role="alert">
                    {{ $errors->first('rating') }}
                  </span>
          @endif
        </div>
        <div class="form-group col-md-6">
          <label for="">views</label>
          <input type="number" class="form-control" id="" value="{{$course->views}}" name="views" placeholder="Enter views">
          @if($errors->has('views'))
                <span class="text-danger" role="alert">
                    {{ $errors->first('views') }}
                  </span>
          @endif
        </div>
        <div class="form-group col-md-6">
          <label for="">hours</label>
          <input type="number" class="form-control" id="" value="{{$course->hours}}" name="hours" placeholder="Enter hours">
          @if($errors->has('hours'))
                <span class="text-danger" role="alert">
                    {{ $errors->first('hours') }}
                  </span>
          @endif
        </div>
        <div class="form-group col-md-6">
          <label for="">Level</label>
          <select class="form-control" name="levels">
            @foreach ($levels as $level)
                <option @if($course->levels == $level) selected @endif value="{{$level}}">{{$level}}</option>
            @endforeach
          </select>
          @if($errors->has('levels'))
                <span class="text-danger" role="alert">
                    {{ $errors->first('levels') }}
                  </span>
          @endif
        </div>
        <div class="form-group col-md-6">
          <label for="">description</label>
          <textarea class="form-control" name="description">{{$course->description}}</textarea>
          @if($errors->has('description'))
                <span class="text-danger" role="alert">
                    {{ $errors->first('description') }}
                  </span>
          @endif
        </div>
        <div class="form-group col-md-6">
          <label for="">Status</label><br>
          <input class="form-control" type="checkbox" name="is_active" @if($course->is_active) checked @endif data-bootstrap-switch>
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