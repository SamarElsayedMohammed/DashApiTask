<?php

use App\Models\Post;
use App\Models\User;
use App\Jobs\CreatePostJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\LoginController;

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
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::post('login', [LoginController::class, 'login'])->name('login');
        Route::get('login', [LoginController::class, 'index'])->name('get.login');
    });

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/home', [App\Http\Controllers\PostsController::class, 'index'])->name('home');

        /**********************users route**********************/

        Route::get("users", [UserController::class, "index"])->name('users');
        Route::get("users/create", [UserController::class, "create"])->name('users.create');
        Route::post("users/store", [UserController::class, "store"])->name('users.store');
        Route::get("users/edit/{id}", [UserController::class, "edit"])->name('users.edit');
        Route::Post("users/update/{id}", [UserController::class, "update"])->name('users.update');
        Route::get("users/delete/{id}", [UserController::class, "destroy"])->name('users.delete');

        /**********************roles route**********************/


        Route::get("roles", [RoleController::class, "index"])->name('roles.index');
        Route::get("roles/create", [RoleController::class, "create"])->name('roles.create');
        Route::post("roles/store", [RoleController::class, "store"])->name('roles.store');
        Route::get("roles/edit/{id}", [RoleController::class, "edit"])->name('roles.edit');
        Route::Post("roles/update/{id}", [RoleController::class, "update"])->name('roles.update');
        Route::get("roles/delete/{id}", [RoleController::class, "destroy"])->name('users.delete');

    });
});