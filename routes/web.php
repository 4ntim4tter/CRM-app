<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ClientController;
use App\Models\Client;

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

    Route::get('/client/edit/{client}', [ClientController::class, 'edit']
    )->name('client.edit');
    Route::get('/client/create', [ClientController::class, 'create']
    )->name('client.create');
    Route::post('/client/store', [ClientController::class, 'store']
    )->name('client.store');
    Route::delete('/client/delete/{client}', [ClientController::class, 'delete']
    )->name('client.delete');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
