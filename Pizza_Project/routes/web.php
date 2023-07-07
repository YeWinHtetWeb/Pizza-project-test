<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/loginPage');
Route::get('/loginPage', [AuthController::class, 'login'])->name('auth#login');
Route::get('/registerPage', [AuthController::class, 'register'])->name('auth#register');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('auth#dashboard');

    // Admin Part
    Route::group(['prefix' => 'category', 'middleware' => 'admin_auth'], function(){
        Route::get('/list', [CategoryController::class, 'list'])->name('category#list');
        Route::get('/createPage', [CategoryController::class, 'createPage'])->name('category#createPage');
        Route::post('/create', [CategoryController::class, 'create'])->name('category#create');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
    });

    // User Part
    Route::group(['prefix' => 'user', 'middleware' => 'user_auth'], function(){
        Route::get('/home', function(){
            return view('user.test');
        })->name('user#home');

    });
});

