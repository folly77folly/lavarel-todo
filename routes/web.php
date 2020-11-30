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

Route::get('/home', 'TaskController@index')->name('home');
// Route::get('/', "TaskController@index");
Route::post("/task", "TaskController@store")->name('store');
Route::get("/{id}/complete", "TaskController@complete")->name('complete');
Route::get("/{id}/delete", "TaskController@destroy")->name('delete');
