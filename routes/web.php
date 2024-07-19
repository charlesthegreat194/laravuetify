<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Models\User;



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
})->name('login');

Route::get('/signup', function(){
    return Inertia::render('signup');
})->name('signup');

Route::get('/dashboard', function(){
    return Inertia::render('dashboard');
})->name('dashboard');


Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);



// Route::inertia('/dashboard', 'dashboard', ['users' => User::all()])->name('dashboard');

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', function(){
        $users = User::paginate(); // Fetch all users from the database
        return Inertia::render('dashboard', ['users' => $users]);
    })->name('dashboard');
});

