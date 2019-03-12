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

// Route::get('/', function () {
//     return view('admin.index');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//asad 6-3-19
//Route::get('/dhuk', 'HomeController@dhuk')->name('dhuk');
// Route::get('/auth', function () {
//     return view('admin.auth.auth');
// });

//for authentication
//Route::get('/auth', 'HomeController@index');
//Route::get('/home', 'HomeController@home');
//Route::post('/auth/checklogin', 'LoginController@checklogin');
//Route::get('auth/successlogin', 'HomeController@successlogin');
Route::get('logout', 'Auth\LoginController@logout');
// Route::get('logout', 'Auth\LoginController@logout');

//for blank page
Route::get('/blank', function () {
    return view('admin.blank');
});
Route::get('/blank1', function () {
    return view('admin.user_managment_panel');
});