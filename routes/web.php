<?php

use App\Http\Controllers\dashboard\EmailController;
use App\Http\Controllers\dashboard\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('dashboard/user',UserController::class);

Route::get('dashboard/provinces/{id}/',[UserController::class,'provincias'])->name('provincias.show');
Route::get('dashboard/ciudades/{id}/',[UserController::class,'ciudades'])->name('ciudades.show');


// Email
Route::get('dashboard/email/',[EmailController::class,'index'])->name('email.index');
Route::get('dashboard/email/create',[EmailController::class,'create'])->name('email.create');
Route::post('dashboard/email/create',[EmailController::class,'store'])->name('email.store');