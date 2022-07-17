<?php

use App\Http\Controllers\Government\HomeController;
use App\Http\Controllers\Government\TaskController;
use App\Http\Controllers\Government\TaskCreatedController;
use App\Http\Controllers\Government\TaskShowController;
use App\Http\Controllers\Government\TaskUpdatedController;
use Illuminate\Support\Facades\Route;


Route::get('/laporan-saya/tambah', [TaskCreatedController::class, 'index'])->name('government.task.new');
Route::post('/laporan-saya/tambah', [TaskCreatedController::class, 'store'])->name('government.task.store');
Route::get('/laporan-saya/ubah/{id}', [TaskUpdatedController::class, 'edit'])->name('government.task.edit');
Route::put('/laporan-saya/ubah/{id}', [TaskUpdatedController::class, 'update'])->name('government.task.update');
// Route::get('/laporan/lihat/{slug}', TaskShowController::class)->name('government.task.show');

Route::get('/', HomeController::class)->name('government.home');
