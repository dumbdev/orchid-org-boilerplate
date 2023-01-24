<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::middleware('throttle:60,1')
     ->post('login', [LoginController::class, 'login'])
     ->name('login.auth');

Route::get('lock', [LoginController::class, 'resetCookieLockMe'])->name('login.lock');

Route::get('/', function () {
    return redirect("login");
});

Route::get("*",function(){
    return redirect("login");
});