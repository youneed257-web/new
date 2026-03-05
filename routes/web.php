<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Login Routes
Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('login/submit', [AuthController::class, 'login'])->name('login.submit');

Route::middleware(['auth'])->group(function () {

// Home Dashboard Route
Route::get('home', [AuthController::class, 'home'])->name('home');

Route::get('contact', function () {
    return view('contact');
})->name('contact');
Route::get('about', function () {
    return view('about');
})->name('about');
Route::get('admin', function () {
    return view('admin');
})->name('admin');
// Network data CRUD powered by TALL stack
Route::get('mainnet', function () {
    return view('mainnet.net');
})->name('mainnet');

// alias route using a more descriptive name (same view/component)
Route::get('netdata', function () {
    return view('mainnet.net');
})->name('netdata.index');

// Route::get('/create', [BookController::class, 'create'])->name('book.create');

// Route::post('/store', [BookController::class, 'store'])->name('book.store');
// Route::get('/show', [BookController::class, 'show'])->name('book.show');
// Route::get('edit/{id}/', [BookController::class, 'edit'])->name('book.edit');
// Route::post('update/{id}/', [BookController::class, 'update'])->name('book.update');
// Route::get('delete/{id}/', [BookController::class, 'delete'])->name('book.delete');

// Permission Management (TALL Stack - Livewire)
Route::get('permission', function() {
    return view('permission.index');
})->name('permission.index');

// Role Management (TALL Stack - Livewire)
Route::get('role', function() {
    return view('role.index');
})->name('role.index');

// User Management
Route::get('user/create', [AuthController::class, 'create_user'])->name('user.create');
Route::post('user/stores', [AuthController::class, 'store_user'])->name('user.stores');
Route::put('user/update/{id}', [AuthController::class, 'update_user'])->name('user.update');
Route::delete('user/delete/{id}', [AuthController::class, 'delete_user'])->name('user.delete');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});
