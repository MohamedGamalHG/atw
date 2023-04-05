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

\Illuminate\Support\Facades\Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin/dashboard','middleware'=>'auth'],function (){

    Route::get('/',function (){
        return view('Admin.main');
    });
    Route::resource('companies',\App\Http\Controllers\Admin\CompanyController::class);
    Route::resource('employees',\App\Http\Controllers\Admin\EmployeeController::class);
});
