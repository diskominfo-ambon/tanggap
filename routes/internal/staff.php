<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Staff\HomeController;


Route::get('/staff', HomeController::class)->name('staff.home');

