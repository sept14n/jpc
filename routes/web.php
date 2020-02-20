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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  if (Auth::check()) {
    return redirect('/home');
  } 
  else {
    return view('auth.login');
  }
});

Auth::routes([
  'reset' => false,
  'verify' => false,
]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');

Route::resource('projects', 'ProjectController');
Route::resource('projects.tasks', 'TaskController');
Route::resource('division', 'DivisiController');
