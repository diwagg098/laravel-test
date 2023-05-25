<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use App\Http\Livewire\Home;
use App\Http\Livewire\Deposit;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Withdrawal;

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
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/deposit', Deposit::class)->name('deposit');
    Route::get('/withdrawal', Withdrawal::class)->name('withdrawal');
    Route::get('/', Profile::class)->name('home');
});