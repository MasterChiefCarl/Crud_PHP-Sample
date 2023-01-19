<?php

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

//basic routes
Route::get('/', function () {
    return view('home'); 
});

Route::get ('home', function () {
    return view('home');
})->name('home');

Route ::get ('logout', function (){
    return view('logout');
})->name('logout');

//get routes for employee
Route::get('employee/index', 'WebViewController@showAll')->name('employee.index');
Route::get('employee/all','WebViewController@showAll')->name('employee.all');
Route::get('employee/create', 'WebViewController@create')->name('employee.create');
Route::get('employee/{id}', 'WebViewController@show')->name('employee.show');
Route::get('employee/edit/{id}', 'WebViewController@edit')->name('employee.edit');
Route::get('employee/delete/{id}', 'WebViewController@delete')->name('employee.delete');

//execution routes for employee
Route::post('employee/store', 'WebViewController@store')->name('employee.store');
Route::post('employee/update/{id}', 'WebViewController@update')->name('employee.update');
Route::get('employee/destroy/{id}', 'WebViewController@destroy')->name('employee.destroy');
