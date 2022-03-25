<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;
use Auth;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_type=="developer"){
            $tasks = Task::paginate(8);
           
            return view('backend.tasks.list',compact('tasks'));
        }
       
        $tasks = Task::where('company_id', company_id())->orderBy('created_at', 'desc')
        ->paginate(8);
        return view('backend.tasks.list',compact('tasks'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $developers = User::where('user_type', 'developer')->get();
        return view('backend.tasks.create', compact('developers', 'categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => ['required', 'string'],
            'developer_id' => ['required'],
            'category_id' => ['required'],
            
        ]);
        $task = new Task();
        $task->task_name = $request->task_name;
        $task->developer_id = $request->developer_id;
        $task->category_id = $request->category_id;
        $task->description = $request->description;
        $task->user_id = Auth::user()->id;
        $task->company_id = company_id();
        $task->save();
        return redirect()->route('tasks.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $categories = Category::all();
        return view('backend.tasks.show',compact('task', 'categories'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {   
        $data['developers'] = User::all();
        $data['categories'] = Category::all();
        $data['task'] = Task::find($task->id);
        return view('backend.tasks.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task_name' => ['required', 'string'],
            'developer_id' => ['required'],
            'category_id' => ['required'],
            
        ]);
        $task = Task::find($task->id);
        $task->task_name = $request->task_name;
        $task->developer_id = $request->developer_id;
        $task->category_id = $request->category_id;
        $task->description = $request->description;
        $task->user_id = Auth::user()->id;
        $task->company_id = company_id();
        $task->save();
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task = Task::find($task->id);
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function filter(Request $request)
    {
        // dd($request->all());
        if($request->task=="all")
        {
            $tasks = Task::paginate(8);
            return view('backend.tasks.list',compact('tasks'));
        }
        $tasks = Task::where('developer_id', $request->task)->paginate(8);
        return view('backend.tasks.list',compact('tasks'));

    }
}
