<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LoginopController;
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
Route::resource('books', BookController::class)->middleware('auth:web');
Route::resource('authors', AuthorController::class)->middleware('auth:web');
Route::resource('departments', DepartmentController::class)->middleware('auth:web');
Route::resource('userOperations', LoginopController::class);
Route::post('userOperations',[LoginopController::class,'check'])->name('userOperations.check');
