<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskUpdatedController;
use App\Http\Controllers\UploadedController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/gettask', TaskController::class);

Route::put('/tasks/update', TaskUpdatedController::class)->name('task.updated');

Route::post('/upload', UploadedController::class)->name('upload');

Auth::routes();

// Route::get('/laporan/lihat/{slug}', TaskShowController::class)->name('task.show');
