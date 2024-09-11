<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

//Route::get('/', [Controller::class, 'index']);

Route::get('/login', [Controller::class, 'login'])->name('login');
Route::get('/logout', [Controller::class, 'logout'])->name('logout');
Route::post('/auth', [Controller::class, 'auth'])->name('auth');
Route::get('/projects', [ProjectController::class, 'home'])->name('projects');
Route::get('/tasks/{id}', [TaskController::class, 'home'])->name('tasks');

Route::get('/projectsView/{id}', [ProjectController::class, 'view'])->name('projects.view');
Route::get('/projectsDestroy/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
Route::get('/projectsEdit/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
Route::get('/projectsCreate', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projectsStore', [ProjectController::class, 'store'])->name('projects.store');


Route::get('/tasksView/{id}', [TaskController::class, 'view'])->name('tasks.view');
Route::get('/tasksDestroy/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/tasksEdit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
Route::post('/tasksUpdate/{id}', [TaskController::class, 'update'])->name('tasks.update');
Route::get('/tasksCreate/{id}', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasksStore', [TaskController::class, 'store'])->name('tasks.store');

Route::get('/userDestroy', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/userCreate', [UserController::class, 'create'])->name('user.create');
Route::post('/userStore', [UserController::class, 'store'])->name('user.store');
Route::get('/userView/{id}', [UserController::class, 'view'])->name('user.view');
Route::get('/userEdit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/userUpdate', [UserController::class, 'update'])->name('user.update');
