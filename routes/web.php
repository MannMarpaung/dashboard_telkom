<?php

use App\Http\Controllers\BUDController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectOrderController;
use App\Http\Controllers\SegmentController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/tes', function () {
//     try {
//         $orders = \App\Models\Order::all();
//         $orders_regular = \App\Models\Order::where('type', 'regular')->get();
//         return view('dashboard', compact('orders', 'orders_regular'));
//     } catch (\Exception $e) {
//         Log::error('Order error: ' . $e->getMessage());
//         return response()->json(['error' => $e->getMessage()], 500);
//     }
// }); 

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::resource('table', TableController::class);
Route::resource('bud', BUDController::class);
Route::resource('bud/{bud}/segment', SegmentController::class);
Route::resource('projects', ProjectController::class);
Route::resource('projects/{project}/orders', ProjectOrderController::class);

Route::middleware('auth')->group(function () {
    Route::resource('profile', ProfileController::class);
});
