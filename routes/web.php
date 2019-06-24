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

// Route::get('/', function () {
//     return view('pages.login');
// });

// Route::get('/signup', function () {
//     return view('pages.signup');
// });

// Route::get('/dashboard', function () {
//     return view('pages.dashboard');
// });

// Route::get('siswa','SiswaController@index');
// Route::post('siswa','SiswaController@create');
// Route::put('/siswa/{id}','SiswaController@update');
// Route::delete('/siswa/{id}','SiswaController@delete');

Route::get('user','UserController@jsontest');
Route::post('/create','UserController@create');
Route::post('/update','UserController@update');
Route::post('/delete','UserController@delete');

Route::get('/', 'UserController@index');
Route::get('/signup', 'UserController@signup');
Route::get('/dashboard', 'UserController@dashboard');
Route::get('/dashboard', 'UserController@getUser');

