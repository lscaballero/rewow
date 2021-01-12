<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//usuarios
Route::get('/perfil', 'App\Http\Controllers\UserController@profile')->name('profile');
Route::post('/user/update', 'App\Http\Controllers\UserController@update')->name('user.update');
//mascotas
Route::get('/mascotas', 'App\Http\Controllers\PetsController@list')->name('pet.list');
Route::get('/crear-mascota', 'App\Http\Controllers\PetsController@create')->name('pet.create');
Route::post('/pet/save', 'App\Http\Controllers\PetsController@save')->name('pet.save');
Route::get('/pet/image/{filename}', 'App\Http\Controllers\PetsController@getImagePet')->name('pet.image');
