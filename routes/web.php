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

    Route::get('/home', 'HomeController@index')->name('home');

    /*
     * ['except' => [...] is used to remove some routes we removed
     * from the auto generated UserController (check with php artisan route:list with
     * and without this argument if you want)
     */

    Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:admin-access')->group(function (){
        Route::resource('/users', 'UsersController', ['except' => ['show','create','store']]);
        Route::resource('/roles', 'RolesController', ['except' => ['show']]);
        Route::resource('/', 'AdminController', ['except' => ['show', 'create', 'store', 'edit', 'destroy', 'update']]);
    });
