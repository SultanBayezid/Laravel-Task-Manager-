@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">Tasks</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">Tasks</li>
                            <li class="breadcrumb-item active">Editing  {{$task->task_name}}</li>
                        </ol>
                  
                    
                        <form action="{{route('tasks.update', $task->id)}}" method="POST">
                        @method('PUT')
				{{ csrf_field() }}
  <div class="form-group">
    <label for="task_name">Task Name</label>
    <input type="text" class="form-control @error('task_name') is-invalid @enderror" name="task_name" value="{{$task->task_name}}">
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
       <option value="{{$developer->id}}" {{$developer->id == $task->developer_id ? 'selected' : ''}}>{{$developer->name}}</option>
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
       <option value="{{$category->id}}" {{$category->id==$task->category_id ? 'selected' : ''}}>{{$category->name}}</option>
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
   <textarea name="description" class="form-control" id="" cols="30" rows="10">{{$task->description}}</textarea>
  </div>
  <div class="form-group mt-3">
							<button type="submit" class="btn btn-primary"> Update</button>
						  </div>
</form>
                      
                    </div>

@endsection


