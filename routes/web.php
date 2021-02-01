<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;

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
})->name('home');

Route::get('/login', [AuthController::class, 'getLoginPage'])->name('login.page');
Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');

Route::get('/blogs',[BlogController::class, 'showAllBlogs'])->name('all_blogs');
Route::get('/blog/create',[BlogController::class,'formBlog'])->name('form_create_blog');
Route::post('/blog/create',[BlogController::class,'createBlog'])->name('create_blog');
Route::get('/blog/update/{id}',[BlogController::class,'editFormBlog'])->name('edit_form_blog');
Route::post('/blog/update/{id}',[BlogController::class,'editBlog'])->name('edit_blog');
Route::post('/blog/delete/{id}',[BlogController::class,'deleteBlog'])->name('delete_blog');

Route::get('api/list',[BlogController::class,'apiAll'])->name('list_api');
