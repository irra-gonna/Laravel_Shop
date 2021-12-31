<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroler;
use App\Http\Controllers\ImageControler;

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

Route::get('/signup', function () {
    return view('layouts.signup');

    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/configuration', [App\Http\Controllers\UserControler::class, 'config'])->name('config');
Route::post('/User/update', [App\Http\Controllers\UserControler::class, 'update'])->name('user.update');
Route::get('/upload-image', [App\Http\Controllers\ImageControler::class, 'create'])->name('image.create');
Route::post('/image/save', [App\Http\Controllers\ImageControler::class, 'store'])->name('image.save');
Route::get('/user/image', [App\Http\Controllers\HomeController::class, 'getImage'])->name('user.image');
Route::get('/profile/{id}', [App\Http\Controllers\UserControler::class, 'profile'])->name('profile');
Route::get('/image/delete/{id}', [App\Http\Controllers\ImageControler::class, 'destroy'])->name('image.destroy');
Route::get('/image/edit/{id}', [App\Http\Controllers\ImageControler::class, 'edit'])->name('image.edit');

Route::match(['get', 'post'] , '/image/update/' , [App\Http\Controllers\ImageControler::class, 'update'])->name('image.update');
Route::get('products/{search?}', [App\Http\Controllers\ImageControler::class, 'search'])->name('image.index');

