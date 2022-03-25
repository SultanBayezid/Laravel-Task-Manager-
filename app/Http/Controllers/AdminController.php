<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\Category;
class AdminController extends Controller
{
    public function index()
    {
        $getmanager = User::where('user_type','manager')->count();
        $getdeveloper = User::where('user_type','developer')->count();
        $gettask = Task::all()->count();
        $data['avgmanager'] = round($gettask/$getmanager ,0);
        $data['avgdev'] = round($gettask/$getdeveloper ,0);
        $data['manager'] = User::where('user_type','manager')->count();
        $data['developer'] = User::where('user_type','developer')->count();
        $data['task'] = Task::all()->count();
        $data['pending'] = Task::where('category_id',3)->count();
        return view('backend.admin.dashboard', $data);	
    }
}
