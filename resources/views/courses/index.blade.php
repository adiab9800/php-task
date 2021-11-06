@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">All Courses</h3>
      <a class="card-tools btn btn-success" href="{{route('courses.create')}}">Add New</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      {{$dataTable->table()}}
    </div>
    <!-- /.card-body -->
  </div>
@endsection
@section('js')
    {{$dataTable->scripts()}}
@endsection