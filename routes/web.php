<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;



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
    return Inertia::render('index');
})->name('index');

Route::get('/contact', function(){
    return Inertia::render('contact');
})->name('contact');

Route::get('/login', function(){
    return Inertia::render('login');
});
Route::get('/signup', function(){
    return Inertia::render('signup');
});

Route::get('/dashboard', function(){
    return Inertia::render('dashboard');
})->name('dashboard');


Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);


