@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Tasks</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">Tasks</li>
                            <li class="breadcrumb-item active">Creating new task</li>
                        </ol>
                  
                    
                        <form action="{{route('tasks.store')}}" method="POST">
                            @csrf
  <div class="form-group">
    <label for="task_name">Task Name</label>
    <input type="text" class="form-control @error('task_name') is-invalid @enderror" name="task_name">
    @error('task_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
  </div>
  <div class="form-group mt-3">
   
   <select name="developer_id" class="form-control @error('developer_id') is-invalid @enderror" >
       <option disabled selected>-- Select developer --</option>
       @foreach($developers as $developer)
       <option value="{{$developer->id}}">{{$developer->name}}</option>
       @endforeach
      
   </select>
   @error('developer_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
  </div>
  <div class="form-group mt-3">
   
    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
       <option disabled selected>-- Select status --</option>
       @foreach($categories as $category)
       <option value="{{$category->id}}">{{$category->name}}</option>
       @endforeach
   </select>
   @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
  </div>
  <div class="form-group mt-3">
    <label for="description">Description</label>
   <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
  </div>
  <div class="btn-group mt-3">
      <button type="submit" class="btn btn-success">Create task</button>
  </div>
</form>
                      
                    </div>

@endsection


<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>