@extends('layouts.frontend')

@section('content')
<style>
    body{
    background:#eee;
}


.avatar-text {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    background: #000;
    color: #fff;
    font-weight: 700;
}

.avatar {
    width: 3rem;
    height: 3rem;
}
.rounded-3 {
    border-radius: 0.5rem!important;
}

</style>
<div class="container pt-5">
   @include('frontend.title')
    @foreach($tasks as $task)
    <div class="card mb-3">
      <div class="card-body">
        <div class="d-flex flex-column flex-lg-row">
          <span class="avatar avatar-text rounded-3 me-4 mb-2">ARM</span>
          <div class="row flex-fill">
            <div class="col-sm-5">
              <h4 class="h5">{{$task->task_name}}</h4>
              Author: <span class="badge bg-warning">{{$task->taskUser->name ?? ''}}</span> Assign To: <span class="badge bg-success">{{ $task->taskDeveloper->name ?? ''}}</span>
            </div>
            <div class="col-sm-4 py-2">
            Status: <span class="badge bg-success"> {{$task->taskCategory->name ?? ''}}</span>
  
 
            </div>
            <div class="col-sm-3 text-lg-end">
              <a href="{{route('task.details', $task->id)}}" class="btn btn-primary stretched-link btn-sm">View</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  
    {{ $tasks->links('vendor.pagination.bootstrap-4') }}
  </div>
@endsection


