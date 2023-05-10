<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index']
    )->name('dashboard');
    Route::get('/clients', [DashboardController::class, 'clients']
    )->name('clients');
    Route::get('/projects', [DashboardController::class, 'projects']
    )->name('projects');
    Route::get('/tasks', [DashboardController::class, 'tasks']
    )->name('tasks');

    Route::get('/tasks/{project}', [TaskController::class, 'project_tasks']
    )->name('tasks.project');
    Route::get('/task/edit/{id}', [TaskController::class, 'edit']
    )->name('tasks.edit');
    Route::post('/task/store', [TaskController::class, 'store']
    )->name('tasks.store');
    Route::group(['middleware' => 'isAdmin'], function() {
        Route::delete('/task/delete/{task}', [TaskController::class, 'delete']
        )->name('tasks.delete');
        Route::delete('/task/destroy/{task}', [TaskController::class, 'destroy']
        )->name('tasks.destroy');
        Route::get('/tasks/trashed/{project}', [TaskController::class, 'trashed']
        )->name('tasks.trashed');
        Route::get('/tasks/restore/{project}', [TaskController::class, 'restore']
        )->name('tasks.restore');
    });

    Route::get('/client/{client}/edit', [ClientController::class, 'edit']
    )->name('client.edit');
    Route::get('/client/create', [ClientController::class, 'create']
    )->name('client.create');
    Route::post('/client/store', [ClientController::class, 'store']
    )->name('client.store');
    Route::delete('/client/{client}/delete', [ClientController::class, 'delete']
    )->name('client.delete');
    Route::delete('/client/{client}/destroy', [ClientController::class, 'destroy']
    )->name('client.destroy');
    Route::get('/client/trashed', [ClientController::class, 'trashed']
    )->name('client.trashed');

    Route::get('/project/{project}/edit', [ProjectController::class, 'edit']
    )->name('project.edit');
    Route::get('/project/create', [ProjectController::class, 'create']
    )->name('project.create');
    Route::post('/project/store', [ProjectController::class, 'store']
    )->name('project.store');
    Route::group(['middleware' => 'isAdmin'], function(){
        Route::delete('/project/{project}/delete', [ProjectController::class, 'delete']
        )->name('project.delete');
        Route::delete('/project/{project}/trashed', [ProjectController::class, 'destroy']
        )->name('project.destroy');
        Route::get('/project/trashed', [ProjectController::class, 'trashed']
        )->name('project.trashed');
        Route::get('/project/{project}/restore', [ProjectController::class, 'restore']
        )->name('project.restore');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
