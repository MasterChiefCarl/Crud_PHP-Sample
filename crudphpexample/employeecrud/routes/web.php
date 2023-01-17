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
Route::get('employee/index', 'EmployeeController@showAll')->name('employee.index');
Route::get('employee/all','EmployeeController@showAll')->name('employee.all');
Route::get('employee/create', 'EmployeeController@create')->name('employee.create');
Route::get('employee/{id}', 'EmployeeController@show')->name('employee.show');
Route::get('employee/edit/{id}', 'EmployeeController@edit')->name('employee.edit');
Route::get('employee/delete/{id}', 'EmployeeController@delete')->name('employee.delete');

//execution routes for employee
Route::post('employee/store', 'EmployeeController@store')->name('employee.store');
Route::post('employee/update/{id}', 'EmployeeController@update')->name('employee.update');
Route::get('employee/destroy/{id}', 'EmployeeController@destroy')->name('employee.destroy');
