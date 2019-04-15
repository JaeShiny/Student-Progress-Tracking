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

Route::get('/', function () {
    return view('index');
});

//Login
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<<<<<<< HEAD
=======
// Route::get('login', function () {
//     return view('auth.login');
// });

>>>>>>> master
//Route for EducationOfficer user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
});
//Route for student
Route::group(['prefix' => 'student'], function(){
    Route::group(['middleware' => ['student']], function(){
        Route::get('/dashboard', 'student\StudentController@index');
    });
});
//Route for advisor
Route::group(['prefix' => 'advisor'], function(){
    Route::group(['middleware' => ['advisor']], function(){
        Route::get('/dashboard', 'advisor\AdvisorController@index');
    });
});
//Route for lecturer
Route::group(['prefix' => 'lecturer'], function(){
    Route::group(['middleware' => ['lecturer']], function(){
        Route::get('/dashboard', 'lecturer\LecturerController@index');
    });
});




//test header เฉยๆ
Route::get('test', function () {
    return view('test');
});

Route::get('course', function () {
    return view('EducationOfficer.course');
});
