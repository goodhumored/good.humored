<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/people', 'people')->name('people');
Route::view('/about', 'about')->name('about');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::post('/reg', [UserController::class, 'reg'])->name('reg');

Route::get('/user/{id}', function () {
    $user = User::all()[0];
    return view('users/', ['user'=>$user]);
})->where('id', '[0-9]+')->name('user');


Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::post('/send_message', [MessageController::class, 'send'])->name('message_send');
    Route::view('/im', 'im')->name('im');
});

Route::get('/echo', [TestController::class, 'echo'])->name("echo");
Route::post('/echo', [TestController::class, 'echo'])->name("echo");