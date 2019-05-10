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

// map เจ้าหน้าที่นักการศึกษากับหลักสูตร
Route::get('curriculum','EducationOfficer\CurriculumController@show');

//แมบหลักสูตรกับเด็ก
Route::get('curr/{curriculum}','EducationOfficer\CurriculumController@index');

Route::get('studentlist','student\BioController@indexE');

Route::get('student_searchE','student\BioController@searchE');

Route::get('student_profileE','student\BioController@profileE');
Route::get('student_profileE/{student_id}','student\BioController@profileE1')->name('profileE');

//กดดูหน้าข้อมูลสัมภาษณ์
Route::get('profilebeforeE/{student_id}','student\InterviewController@profileE');

//กดดูหน้าข้อมูลหลังจบ
Route::get('profileafterE/{student_id}','student\SrmController@profileE');

//กดดูพฤติกรรม
// Route::get('problem', 'lecturer\ProblemController@showProblemE')->name('problemE');

//แสดงพฤติกรรมเด็ก
Route::get('studentproblemE/{student_id}', 'lecturer\ProblemController@showProblemE');



    //Alumni
Route::get('alumni','student\AlumniController@show');



    //Lecture

//แมบวิชากับเด็ก
Route::get('subject/{course}','SubjectController@index');


Route::get('course','SubjectController@showCourse');

Route::get('student_profileL','student\BioController@profileL');
Route::get('student_profileL/{student_id}','student\BioController@profileL1')->name('profileL');

//กดดูหน้าข้อมูลสัมภาษณ์
Route::get('profilebeforeL/{student_id}','student\InterviewController@profileL');

//กดดูหน้าข้อมูลหลังจบ
Route::get('profileafterL/{student_id}','student\SrmController@profileL');

//เพิ่มพฤติกรรม/ปัญหา
Route::get('problem_create/{student_id}','lecturer\ProblemController@create')->name('create');
Route::post('problem_insert','lecturer\ProblemController@insert');
//แสดงพฤติกรรมเด็ก
Route::get('studentproblem/{student_id}', 'lecturer\ProblemController@showProblemL');

// search
Route::get('student_searchL','student\BioController@searchL');

// route แสดงรายวิชาที่อาจารย์สอน
Route::get('course','SubjectController@lecToCourse');

//กดปุ่มแจ้งเตือนแล้วเจอพฤติกรรมที่รุนแรงของนักศึกษา
Route::get('risk_problem/{student_id}','lecturer\ProblemController@notiProblemL');


    //Student
Route::get('profile/{student_id}','student\BioController@profile');

//กดดูหน้าข้อมูลสัมภาษณ์
Route::get('profilebeforeS/{student_id}','student\InterviewController@profileS');

//กดดูหน้าข้อมูลหลังจบ
Route::get('profileafterS/{student_id}','student\SrmController@profileS');




//map อาจารย์กับวิชา
// Route::get('lecturer/{instructor}','lecturer\InstructorController@index');
//กดดูหน้าข้อมูลหลังจบ
Route::get('profileafter/{student_id}','student\SrmController@profile');


    //Advisor
Route::get('student_profileA','student\BioController@profileA');
Route::get('student_profileA/{student_id}','student\BioController@profileA1')->name('profileA');

//กดดูหน้าข้อมูลสัมภาษณ์
Route::get('profilebeforeA/{student_id}','student\InterviewController@profileA');

//กดดูหน้าข้อมูลหลังจบ
Route::get('profileafterA/{student_id}','student\SrmController@profileA');

//แสดงพฤติกรรมเด็ก
Route::get('studentproblemA/{student_id}', 'lecturer\ProblemController@showProblemA');

Route::get('student_searchA','student\BioController@searchA');

//ลบด้วยนะถ้าเขียนโค้ดเสร็จ
Route::get('profileindex', function () {
    return view('student.profile(index)');
});
// Route::get('profilebefore', function () {
//     return view('student.profile(before)');
// });
// Route::get('profileafter', function () {
//     return view('student.profile(after)');
// });
// Route::get('insertbehavior', function () {
//     return view('lecturer.behavior(insert)');
// });
// Route::get('behavior', function () {
//     return view('student.behavior');
// });
// Route::get('subject', function () {
//     return view('lecturer.subject');
// });










//login student ให้เข้ามาเจอประวัติตัวเอง
Route::get('/studentprofile', 'student\ProfileController@index');

//login lecturer ให้เข้ามาเจอวิชา
// Route::get('/subjectL', 'lecturer\LecturerLoginController@index');

//Login
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route for EducationOfficer user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'EducationOfficer\EducationOfficerController@index');
});
//Route for student user
Route::group(['prefix' => 'student'], function(){
    Route::group(['middleware' => ['student']], function(){
        Route::get('/dashboard', 'student\StudentController@index');
    });
});
//Route for advisor user
Route::group(['prefix' => 'advisor'], function(){
    Route::group(['middleware' => ['advisor']], function(){
        Route::get('/dashboard', 'advisor\AdvisorController@index');
        // route ไปยังหน้าที่แสดงรายชื่อนักศึกษาของอาจารย์ที่ปรึกษา
        Route::get('myStudent','advisor\AdvisorController@showStudent');
    });
});
//Route for lecturer user
Route::group(['prefix' => 'lecturer'], function(){
    Route::group(['middleware' => ['lecturer']], function(){
        Route::get('/dashboard', 'lecturer\LecturerController@index');
    });
});

