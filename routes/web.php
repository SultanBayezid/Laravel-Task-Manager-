<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [FrontendController::class, 'index']);
Route::get('task/details/{id}', [FrontendController::class, 'show'])->name('task.details');
Route::resource('comment', CommentController::class);
Auth::routes();

Route::group(['middleware' => ['admin']], function () {
    //User Controller
  
    Route::get('dashboard', [AdminController::class, 'index']);
  
});

Route::group(['middleware' => ['auth']], function () {
    //User Controller
  
    Route::post('tasks/filter', [TaskController::class, 'filter'])->name('task.filter');
    Route::resource('tasks', TaskController::class);
  
});




