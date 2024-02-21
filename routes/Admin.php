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

Route::group(['namespace' => 'Admin', 'prefix' => 'panel', 'as' => 'panel.'], function () {

    Route::get('/', function (){
        return redirect()->route('panel.auth.login');
    });

    /*authentication*/
    Route::group(['namespace' => 'Auth', 'prefix' => 'auth', 'as' => 'auth.'], function () {
        Route::get('login', 'LoginController@login')->name('login');
        Route::post('login', 'LoginController@submit')->name('submit');
        Route::get('logout', 'LoginController@logout')->name('logout');
    });

    /*authenticated*/
    Route::group(['middleware' => ['admin']], function () {

        Route::get('/', 'DashboardController@dashboard')->name('dashboard');

        Route::group(['prefix' => 'Company', 'as' => 'Company.'], function () {
            Route::get('list', 'CompanyController@company_list')->name('list');
            Route::post('store', 'CompanyController@insert_company')->name('store');
            Route::post('update', 'CompanyController@update_company')->name('update');
        });

        Route::group(['prefix' => 'Employee', 'as' => 'Employee.'], function () {
            Route::get('list', 'EmployeeController@employee_list')->name('list');
            Route::post('store', 'EmployeeController@insert_employee')->name('store');
            Route::post('update', 'EmployeeController@update_employee')->name('update');
            Route::get('delete-employee/{employee_id}}', 'EmployeeController@delete_employee')->name('delete-employee');
        });

    });

});

