@extends('layouts.frontend')
@section('content')
<style>
   .comment-wrapper .media-list .media img {
   width:64px;
   height:64px;
   border:2px solid #e5e7e8;
   }
   .comment-wrapper .media-list .media {
   border-bottom:1px dashed #efefef;
   margin-bottom:25px;
   }
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
   <div class="row">
      <div class="col-md-9">
         <div class="wrapper wrapper-content animated fadeInUp">
            <div class="ibox">
               <div class="ibox-content">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="m-b-md">
                           <h2>{{$task->task_name}}</h2>
                        </div>
                        <dl class="dl-horizontal">
                           <dt>Status:</dt>
                           <dd><span class="label label-success">{{$task->taskCategory->name ?? ''}}</span></dd>
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
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-3 card-body bg-white">
         <div class="wrapper wrapper-content project-manager">
            <h4>Description</h4>
            <p class="small">
               {{$task->description}}
            </p>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="row bootstrap snippets bootdeys">
         <div class="col-md-8 col-sm-12">
            <div class="comment-wrapper">
               <div class="panel panel-info">
                  <div class="panel-heading">
                     Comments
                  </div>
                  <div class="panel-body">
                     <form action="{{route('comment.store')}}" method="POST">
                         @csrf
                         <input type="text" name="name" class="form-control" placeholder="Your name">
                         <input type="hidden" name="task_id" value="{{$task->id}}">
                     <textarea id="comment" name="comment" class="form-control @error('comment') is-invalid @enderror" placeholder="write a comment..." rows="3"></textarea>
                     @error('comment')
                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                     <br>
                     <button type="submit" class="btn btn-info pull-right">Post</button>
                     </form>
                     <div class="clearfix"></div>
                     <hr>
                     <ul class="media-list">
               @foreach($comments as $comment)
               <li class="media">
                           <a href="#" class="pull-left">
                           <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                           </a>
                           <div class="media-body">
                           
                              <strong class="text-success"> {{$comment->name}}</strong>
                              <p>
                              {{$comment->comment}}
                              </p>
                           </div>
                        </li>
               @endforeach
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   
  </div>
@endsection
