<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Auth\UserAuthController;


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
    // return view('layout.main');
});

// go to company page
Route::get('/company', [ CompanyController::class, 'index' ])->name('company-listing')->middleware('auth');
// add new
Route::get('/company/create', [ CompanyController:: class, 'create' ])->name('company-create');
// store data
Route::post('/company', [ CompanyController::class, 'store' ])->name('company-store');
// go to edit data form
Route::get('/company/{id}/edit', [ CompanyController::class, 'edit' ])->name('company-edit');
// store updated data
Route::post('/company/{id}', [ CompanyController::class, 'update' ])->name('company-update');
// delete data
Route::delete('company/{id}', [ CompanyController::class, 'destroy' ])->name('company-destroy');


// Employee Routes
// employee listing
Route::get('/employee', [ EmployeeController::class, 'index' ])->name('employee-listing')->middleware('auth');
// employee form - create new employee
Route::get('/employee/create', [ EmployeeController::class, 'create'])->name('employee-create');
// store emp data in db
Route::post('/employee', [ EmployeeController::class, 'store' ])->name('employee-store');
// edit emp
Route::get('/employee/{id}/edit', [ EmployeeController::class, 'edit' ])->name('employee-edit');
// store updated data
Route::post('/employee/{id}', [ EmployeeController::class, 'update' ])->name('employee-update');
// delete data
Route::delete('/employee/{id}', [ EmployeeController::class, 'destroy' ])->name('employee-destroy');

// Auth Routes
// Cara 1: 
// Route::view("login", 'auth.login');

// Cara 2:
// Route::get('/login', function () {
//     return view('auth.login');
// });

// Route::post('/user', [ UserAuthController:: class, 'userLogin' ]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', [LoginController::class, 'logout'])->name('auth-logout');
