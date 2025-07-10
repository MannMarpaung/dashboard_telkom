<?php

use App\Http\Controllers\BUDController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectOrderController;
use App\Http\Controllers\SegmentController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('table', TableController::class);
Route::resource('bud', BUDController::class);
Route::resource('bud/{bud}/segment', SegmentController::class);
Route::resource('projects', ProjectController::class);
Route::resource('projects/{project}/orders', ProjectOrderController::class);