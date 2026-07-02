<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScholarshipController;

Route::get('/', [ScholarshipController::class, 'index']);

