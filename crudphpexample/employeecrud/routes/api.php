<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



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

//get routes for employee
Route::get('employee/index', 'APIController@showAllEmployees')->name('employee.index');
Route::get('employee/all','APIController@showAllEmployees')->name('employee.all');
Route::post('employee/create', 'APIController@createEmployee')->name('employee.create');
Route::get('employee/{id}', 'APIController@showOneEmployee')->name('employee.show');
Route::match(['patch','put', 'post'],'employee/{id}', 'APIController@updateEmployee')->name('employee.edit');
Route::delete('employee/{id}', 'APIController@deleteEmployee')->name('employee.delete');

