<?php
/*
|--------------------------------------------------------------------------
| ADMIN Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/home', function () {
    return view('admin.index');
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
Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
//For Authentication
Route::get('logout', 'Auth\LoginController@logout');

//For user Managment Panel
Route::get('/UserManagement', 'UserController@index');
Route::resource('UserManagements','UserController');
//Route::resource('UserManagements.status','UserController');

//for blank page
Route::get('/blank', function () {
    return view('admin.blank');
});

//for school management 
Route::get('/SchoolManagement', 'SchoolController@index');
Route::resource('SchoolManagements', 'SchoolController');

//for School's class
Route::get('/Class', 'SchoolClassController@index');
Route::resource('SchoolClasss', 'SchoolClassController');