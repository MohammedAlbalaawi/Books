<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LoginopController;
use App\Http\Controllers\UserController;
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
})->name('welcome');
Route::resource('books', BookController::class);

Route::resource('authors', AuthorController::class)
->parameters(['authors' => 'model']);

Route::resource('users', UserController::class)
    ->parameters(['users' => 'model']);

Route::resource('departments', DepartmentController::class);
Route::resource('userOperations', LoginopController::class);
Route::post('userOperations', [LoginopController::class,'check'])->name('userOperations.check');
Route::get('userOperations/edit/{id}', [LoginopController::class,'editPass'])->name('userOperations.editPass');
Route::put('userOperations/edit/{id}', [LoginopController::class,'updatePass'])->name('userOperations.updatePass');
