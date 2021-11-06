<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/',[FrontController::class,'index']);
Route::get('filter',[FrontController::class,'filter'])->name('filter');


Auth::routes(['register' => false]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('categories',CategoryController::class);
Route::resource('courses',CourseController::class);
Route::post('categories/change-status/{category}',[CategoryController::class,'status'])->name('categories.status');
Route::post('courses/change-status/{course}',[CourseController::class,'status'])->name('courses.status');