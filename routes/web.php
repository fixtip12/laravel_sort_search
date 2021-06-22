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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('todos', App\Http\Controllers\TodoController::class);

Route::get('/', [App\Http\Controllers\ContactController::class, 'index'])->name('index');
Route::post('csv/export', [App\Http\Controllers\ContactController::class, 'csvExport'])->name('contact.csv.export');
