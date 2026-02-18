<?php
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\kenel;
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/', function(){
//     return view('home');
// });

// Login Routes
Route::get('/login', function(){
    return view('login'); 
})->name('login');

Route::post('login/submit', [AuthController::class, 'login'])->name('login.submit');
Route::middleware(['auth'])->group(function () {
    
Route::get('/create', function(){
    return view('book.create');
})->name('book.create');

Route::get('/about', function(){
    return view('about'); 
});
Route::get('/admin', function(){
    return view('admin'); 
});

Route::get('/contact', function(){
    return view('contact'); 
})->name('contact');

// Route to Dashboard
Route::get('/',[AuthController::class, 'home'])->name('home');



Route::post('/store', [BookController::class, 'store'])->name('book.store');
Route::get('/show', [BookController::class, 'show'])->name('book.show');
Route::get('edit/{id}/', [BookController::class, 'edit'])->name('book.edit');
Route::post('update/{id}/', [BookController::class, 'update'])->name('book.update');
Route::get('delete/{id}/', [BookController::class, 'delete'])->name('book.delete');

Route::post('/permission', [AuthController::class, 'stores'])->name('permission.stores');
Route::get('permission/create', [AuthController::class, 'create'])->name('permission.create');

Route::get('role/create', [AuthController::class, 'create_role'])->name('role.create');
Route::post('role/stores', [AuthController::class, 'store_role'])->name('role.stores');

Route::get('user/create', [AuthController::class, 'create_user'])->name('user.create');
Route::post('user/stores', [AuthController::class, 'store_user'])->name('user.stores');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});