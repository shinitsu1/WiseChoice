<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [Dashboard::class, 'userChart'])
->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/category', function(){
    return view('category');
})->name('category');

Route::get('/admin_notif', function(){
    return view('admin_notif');
})->name('admin_notif');

Route::get('/user_notif', function(){
    return view('user_notif');
})->name('user_notif');

Route::get('/add', function(){
    return view('add');
})->name('add');

Route::get('/product-list', function(){
    return view('product-table');
})->name('product-list');

Route::get('/cart', function(){
    return view('cart');
})->name('cart');

Route::get('/order-list', function(){
    return view('order-list');
})->name('order-list');

Route::get('/gcash1', function(){
    return view('gcash1');
})->name('gcash1');

Route::get('/gcash2', function(){
    return view('gcash2');
})->name('gcash2');

Route::get('/gcash3', function(){
    return view('gcash3');
})->name('gcash3');

Route::get('/gcash4', function(){
    return view('gcash4');
})->name('gcash4');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
