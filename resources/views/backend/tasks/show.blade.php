@extends('layouts.app')
@section('content')
<style>
   body{margin-top:20px;
   background:#eee;
   }
   /* PROJECTS */
   .project-people,
   .project-actions {
   text-align: right;
   vertical-align: middle;
   }
   dd.project-people {
   text-align: left;
   margin-top: 5px;
   }
   .project-people img {
   width: 32px;
   height: 32px;
   }
   .project-title a {
   font-size: 14px;
   color: #676a6c;
   font-weight: 600;
   }
   .project-list table tr td {
   border-top: none;
   border-bottom: 1px solid #e7eaec;
   padding: 15px 10px;
   vertical-align: middle;
   }
   .project-manager .tag-list li a {
   font-size: 10px;
   background-color: white;
   padding: 5px 12px;
   color: inherit;
   border-radius: 2px;
   border: 1px solid #e7eaec;
   margin-right: 5px;
   margin-top: 5px;
   display: block;
   }
   .project-files li a {
   font-size: 11px;
   color: #676a6c;
   margin-left: 10px;
   line-height: 22px;
   }
   /* PROFILE */
   .profile-content {
   border-top: none !important;
   }
   .profile-stats {
   margin-right: 10px;
   }
   .profile-image {
   width: 120px;
   float: left;
   }
   .profile-image img {
   width: 96px;
   height: 96px;
   }
   .profile-info {
   margin-left: 120px;
   }
   .feed-activity-list .feed-element {
   border-bottom: 1px solid #e7eaec;
   }
   .feed-element:first-child {
   margin-top: 0;
   }
   .feed-element {
   padding-bottom: 15px;
   }
   .feed-element,
   .feed-element .media {
   margin-top: 15px;
   }
   .feed-element,
   .media-body {
   overflow: hidden;
   }
   .feed-element > .pull-left {
   margin-right: 10px;
   }
   .feed-element img.img-circle,
   .dropdown-messages-box img.img-circle {
   width: 38px;
   height: 38px;
   }
   .feed-element .well {
   border: 1px solid #e7eaec;
   box-shadow: none;
   margin-top: 10px;
   margin-bottom: 5px;
   padding: 10px 20px;
   font-size: 11px;
   line-height: 16px;
   }
   .feed-element .actions {
   margin-top: 10px;
   }
   .feed-element .photos {
   margin: 10px 0;
   }
   .feed-photo {
   max-height: 180px;
   border-radius: 4px;
   overflow: hidden;
   margin-right: 10px;
   margin-bottom: 10px;
   }
   .file-list li {
   padding: 5px 10px;
   font-size: 11px;
   border-radius: 2px;
   border: 1px solid #e7eaec;
   margin-bottom: 5px;
   }
   .file-list li a {
   color: inherit;
   }
   .file-list li a:hover {
   color: #1ab394;
   }
   .user-friends img {
   width: 42px;
   height: 42px;
   margin-bottom: 5px;
   margin-right: 5px;
   }
   .ibox {
   clear: both;
   margin-bottom: 25px;
   margin-top: 0;
   padding: 0;
   }
   .ibox.collapsed .ibox-content {
   display: none;
   }
   .ibox.collapsed .fa.fa-chevron-up:before {
   content: "\f078";
   }
   .ibox.collapsed .fa.fa-chevron-down:before {
   content: "\f077";
   }
   .ibox:after,
   .ibox:before {
   display: table;
   }
   .ibox-title {
   -moz-border-bottom-colors: none;
   -moz-border-left-colors: none;
   -moz-border-right-colors: none;
   -moz-border-top-colors: none;
   background-color: #ffffff;
   border-color: #e7eaec;
   border-image: none;
   border-style: solid solid none;
   border-width: 3px 0 0;
   color: inherit;
   margin-bottom: 0;
   padding: 14px 15px 7px;
   min-height: 48px;
   }
   .ibox-content {
   background-color: #ffffff;
   color: inherit;
   padding: 15px 20px 20px 20px;
   border-color: #e7eaec;
   border-image: none;
   border-style: solid solid none;
   border-width: 1px 0;
   }
   .ibox-footer {
   color: inherit;
   border-top: 1px solid #e7eaec;
   font-size: 90%;
   background: #ffffff;
   padding: 10px 15px;
   }
   ul.notes li,
   ul.tag-list li {
   list-style: none;
   }
</style>
<div class="container-fluid px-4">
   <h1 class="mt-4">Tasks</h1>
   <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item">Tasks</li>
      <li class="breadcrumb-item active">Editing  {{$task->task_name}}</li>
   </ol>
   <div class="container">
      <div class="row">
         <div class="col-md-9">
            <div class="wrapper wrapper-content animated fadeInUp">
               <div class="ibox">
                  <div class="ibox-content">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="m-b-md">
                              @if($task->user_id == Auth::user()->id)
                              <a href="{{route('tasks.edit', $task->id)}}" class="btn btn-link btn-xs pull-right">Edit task</a>
                              @endif
                              <h2>{{$task->task_name}}</h2>
                           </div>
                           <dl class="dl-horizontal">
                              <dt>Status:</dt>
                              <dd><span class="label label-primary">{{$task->taskCategory->name ?? ''}}</span></dd>
                           </dl>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-5">
                           <dl class="dl-horizontal">
                              <dt>Author:</dt>
                              <dd>{{$task->taskUser->name}}</dd>
                              <dt>Assign To:</dt>
                              <dd>  {{$task->taskDeveloper->name}}</dd>
                           </dl>
                        </div>
                        <div class="col-lg-7" id="cluster_info">
                           <dl class="dl-horizontal">
                              <dt>Last Updated:</dt>
                              <dd>{{$task->updated_at}}</dd>
                              <dt>Created:</dt>
                              <dd> 	{{$task->created_at}} </dd>
                           </dl>
                        </div>
                     </div>
                     <div class="row m-t-sm">
                        <div class="col-lg-12">
                           <div class="panel blank-panel">
                              <div class="panel-body">
                                 <div class="tab-content">
                                    <div class="tab-pane active" id="tab-1">
                                       <div class="feed-activity-list">
                                          <div class="feed-element">
                                             <a href="#" class="pull-left">
                                             <img alt="image" class="img-circle" src="https://bootdey.com/img/Content/avatar/avatar6.png">
                                             </a>
                                             <div class="media-body ">
                                                <small class="pull-right">2h ago</small>
                                                <strong>Mark Johnson</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                                <small class="text-muted">Today 2:10 pm - 12.06.2014</small>
                                                <div class="well">
                                                   Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                   Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-3">
            <div class="wrapper wrapper-content project-manager">
               <h4>Description</h4>
               <p class="small">
                  {{$task->description}}
               </p>
               @if(Auth::user()->id == $task->developer_id)
               <h5>Change Status</h5>
              
         @foreach($categories as $category)
         <div class="form-check">
          <input class="form-check-input" type="radio" name="{$category->id}}" id="statusID" value="{{$category->id}}" {{$task->category_id == $category->id ? 'checked' : ''}}>
          <label class="form-check-label" for="gridRadios1">
          {{$category->name}}
          </label>
        </div>
         @endforeach
               @endif
       
            </div>
         </div>
      </div>
   </div>
</div>
@endsection