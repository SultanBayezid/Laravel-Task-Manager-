<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Comment;

class FrontendController extends Controller
{
   public function index()
   {
      
    $tasks = Task::paginate(8);
    return view('frontend.index' , compact('tasks'));
   }

   public function show($id)
   {
      $data['comments'] = Comment::where('task_id', $id)
      ->orderBy('created_at', 'desc') 
      ->get();
      $data['task'] = Task::find($id);
      return view('frontend.show' , $data);
   }
}
