@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">all Categories</h3>
      <a class="card-tools btn btn-success" href="{{route('categories.create')}}">Add New</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      {{-- <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>name</th>
            <th>Status</th>
            <th>edit</th>
            <th>delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                  <form action="{{route('categories.status',['category'=>$category,'status'=>!$category->is_active])}}" method="POST">
                      @method('post')
                      @csrf
                      @if($category->is_active)
                      <button class="btn btn-info" type="submit">Active</button>               
                      @else
                      <button class="btn btn-danger" type="submit">Inactive</button>   
                      @endif
                   </form>
                </td>
                <td><a class="btn btn-success" href="{{route('categories.edit',$category)}}">edit</a></td>
                <td> <form action="{{route('categories.destroy',$category)}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger" type="submit">Delete</button>               
                 </form>
                 </td>
            </tr>    
            
          @endforeach
          
        
        </tbody> --}}
        {{$dataTable->table()}}
      </table>
    </div>
    <!-- /.card-body -->
  
  </div>
@endsection
@section('js')
{{$dataTable->scripts()}}
@endsection