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



    //EducationOfficer
Route::get('curriculum', function () {
    return view('EducationOfficer.curriculum');
});

Route::get('selectyear', function () {
    return view('EducationOfficer.selectyear');
});

Route::get('studentlist','student\BioController@index');

Route::get('student_search','student\BioController@search');

Route::get('student_profile','student\BioController@profile');
Route::get('student_profile/{student_id}','student\BioController@profileE1')->name('profileE');


Route::get('curriculum','EducationOfficer\CurriculumController@show');

//กดดูหน้าข้อมูลสัมภาษณ์
Route::get('profilebeforeE/{student_id}','student\InterviewController@profileE');

//กดดูหน้าข้อมูลหลังจบ
Route::get('profileafterE/{student_id}','student\SrmController@profileE');



    //Alumni
Route::get('alumni','student\AlumniController@show');



    //Lecturer
//เพิ่มพฤติกรรม/ปัญหา
Route::get('problem_create','lecturer\ProblemController@create');
Route::post('problem_insert','lecturer\ProblemController@insert');



    //Student
//กดดูหน้าข้อมูลสัมภาษณ์
Route::get('profilebeforeS/{student_id}','student\InterviewController@profileS');

//กดดูหน้าข้อมูลหลังจบ
Route::get('profileafterS/{student_id}','student\SrmController@profileS');

//แมบวิชากับเด็ก
Route::get('subject/{course}','SubjectController@index');




//ลบด้วยนะถ้าเขียนโค้ดเสร็จ
Route::get('profileindex', function () {
    return view('student.profile(index)');
});
Route::get('profilebefore', function () {
    return view('student.profile(before)');
});
Route::get('profileafter', function () {
    return view('student.profile(after)');
});
Route::get('insertbehavior', function () {
    return view('lecturer.behavior(insert)');
});
Route::get('behavior', function () {
    return view('student.behavior');
});
Route::get('subject', function () {
    return view('lecturer.subject');
});










//login เด็กให้เข้ามาเจอประวัติตัวเอง
Route::get('/studentprofile', 'student\ProfileController@index');

//Login
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

