@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
                        <h1 class="mt-4">All Tasks</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">All Tasks</li>
                        </ol>

@if(Auth::user()->user_type == 'developer')
<div class="row">
<form action="{{route('task.filter')}}" method="POST"> 
<div class="col-auto">
     
      <div class="input-group mb-2">
       
  
       @csrf
   <select name="task"  class="form-control" id="">
                      
                      <option selected disabled>-- Filter Tasks --</option>
                      <option value="{{Auth::user()->id}}">My tasks</option>
                      <option value="all">All tasks</option>
                  </select>
        <div class="input-group-prepend">
          <div class="input-group-text">
          <button type="submit" class="btn btn-default btn-sm">Apply</button>
          </div>
        </div>
      </div>
  
    </div>
 </div>
 </form>
@endif
                        <div class="card mb-4">
                    
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Task Name</th>
                                            <th>Author</th>
                                            <th>Assign To</th>
                                            <th>Status</th>
                                            <th>Description </th>
                                            <th>Action </th>
                                            
                                        </tr>
                                    </thead>
                           
                                    <tbody>
                                        @foreach($tasks as $task)
                                        <tr>
                                            <td>{{$task->task_name}}</td>
                                            <td>{{$task->taskUser->name ?? ''}}</td>
                                            <td>{{$task->taskDeveloper->name ?? ''}}</td>
                                            <td>{{$task->taskCategory->name ?? ''}}</td>
                                            <td>{{$task->description}}</td>
                                            <td> 
                                                
                                            <a href="{{route('tasks.show', $task->id)}}" class="btn btn-outline-primary btn-xs ">View</a>
                                            @if(Auth::user()->user_type=="manager")
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
								<a href="{{route('tasks.edit', $task->id)}}" class="btn btn-outline-warning btn-xs ">Edit</a>
							
								{{ csrf_field() }}
								<input name="_method" type="hidden" value="DELETE">
								<button class="btn btn-outline-danger btn-xs btn-remove" type="submit">Delete</button>
							  </form>
                              @endif
                                          </td>
                                     
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                                {{ $tasks->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                    </div>

@endsection


