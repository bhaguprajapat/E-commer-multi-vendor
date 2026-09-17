<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// admin controller
use App\Http\Controllers\Backend\AdminController;

// vendor controller
use App\Http\Controllers\Backend\VendorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// admin routes
Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');


// vendor routes
Route::get('/vendor/dashboard',[VendorController::class,'dashboard'])->name('vendor.dashboard');
