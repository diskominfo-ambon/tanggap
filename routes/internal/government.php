<?php

use App\Http\Controllers\Government\HomeController;
use App\Http\Controllers\Government\TaskController;
use App\Http\Controllers\Government\TaskCreatedController;
use Illuminate\Support\Facades\Route;


Route::get('/laporan', TaskController::class)->name('government.task.home');
Route::get('/laporan/tambah', [TaskCreatedController::class, 'index'])->name('government.task.new');
Route::post('/laporan/tambah', [TaskCreatedController::class, 'store'])->name('government.task.store');
// Route::get('/laporan/ubah/{id}', [TaskUpdatedController::class, 'edit'])->name('government.task.edit');
// Route::put('/laporan/ubah/{id}', [TaskUpdatedController::class, 'update'])->name('government.task.update');

Route::get('/opd', HomeController::class)->name('government.home');
