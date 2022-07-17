<?php

use App\Http\Controllers\SuperAdmin\TaskCreatedController;
use App\Http\Controllers\SuperAdmin\TaskUpdatedController;
use App\Http\Controllers\SuperAdmin\HomeController;
use App\Http\Controllers\Superadmin\TaskController;
use App\Http\Controllers\Superadmin\StaffController;
use App\Http\Controllers\Superadmin\StaffUpdatedController;
use App\Http\Controllers\Superadmin\StaffCreatedController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('admin.home');

Route::get('/semua-laporan', TaskController::class)->name('admin.task.home');
Route::get('/tambah-laporan', [TaskCreatedController::class, 'index'])->name('admin.task.new');
Route::post('/tambah-laporan', [TaskCreatedController::class, 'store'])->name('admin.task.store');

Route::get('/laporan/{id}', [TaskUpdatedController::class, 'edit'])->name('admin.task.edit');
Route::put('/laporan/{id}', [TaskUpdatedController::class, 'update'])->name('admin.task.update');


Route::get('/staff', StaffController::class)->name('admin.staff.home');
Route::get('/tambah-staff', [StaffCreatedController::class, 'index'])->name('admin.staff.new');
Route::post('/tambah-staff', [StaffCreatedController::class, 'store'])->name('admin.staff.store');

Route::get('/staff/{id}', [StaffUpdatedController::class, 'edit'])->name('admin.staff.edit');
Route::put('/staff/{id}', [StaffUpdatedController::class, 'update'])->name('admin.staff.update');
