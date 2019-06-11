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

//กดดูวิชาที่เด็กลงทะเบียน
Route::get('student_enrollmentE','student\StudyController@enrollmentE');
Route::get('student_enrollmentE/{student_id}','student\StudyController@enrollmentE1')->name('enrollE');

    //Alumni
Route::get('alumni','student\AlumniController@show');



    //Lecturer

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

//กดดูวิชาที่เด็กลงทะเบียน
Route::get('student_enrollmentL','student\StudyController@enrollmentL');
Route::get('student_enrollmentL/{student_id}','student\StudyController@enrollmentL1')->name('enrollL');



    //Student
Route::get('profile/{student_id}','student\BioController@profile');

Route::get('enrollmentS/{student_id}','student\StudyController@enrollmentS');

//กดดูหน้าข้อมูลสัมภาษณ์
Route::get('profilebeforeS/{student_id}','student\InterviewController@profileS');

//กดดูหน้าข้อมูลหลังจบ
Route::get('profileafterS/{student_id}','student\SrmController@profileS');

//กดดูวิชาที่่ลงทะเบียน
Route::get('study/{student_id}','student\StudyController@enrollmentS');


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

//กดดูวิชาที่เด็กลงทะเบียน
Route::get('student_enrollmentA','student\StudyController@enrollmentA');
Route::get('student_enrollmentA/{student_id}','student\StudyController@enrollmentA1')->name('enrollA');


    //Advisor+Lecturer
Route::get('student_searchL','student\BioController@searchAL');

Route::get('student_profileAL','student\BioController@profileAL');
Route::get('student_profileAL/{student_id}','student\BioController@profileAL1')->name('profileAL');


//กดดูหน้าข้อมูลสัมภาษณ์
Route::get('profilebeforeAL/{student_id}','student\InterviewController@profileAL');

//กดดูหน้าข้อมูลหลังจบ
Route::get('profileafterAL/{student_id}','student\SrmController@profileAL');

//กดดูวิชาที่่ลงทะเบียน
Route::get('student_enrollmentAL','student\StudyController@enrollmentAL');
Route::get('student_enrollmentAL/{student_id}','student\StudyController@enrollmentAL1')->name('enrollAL');

//แมบวิชากับเด็ก
Route::get('subjectAL/{course}','SubjectController@indexAL');

Route::get('courseAL','SubjectController@showCourseAL');

// route แสดงรายวิชาที่อาจารย์สอน
Route::get('courseAL','SubjectController@lecToCourseAL');

//เพิ่มพฤติกรรม/ปัญหา
Route::get('problem_createAL/{student_id}','lecturer\ProblemController@createAL')->name('create');
Route::post('problem_insertAL','lecturer\ProblemController@insertAL');
//แสดงพฤติกรรมเด็ก
Route::get('studentproblemAL/{student_id}', 'lecturer\ProblemController@showProblemAL');


//ลบด้วยนะถ้าเขียนโค้ดเสร็จ
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



//เทสการ import excel
Route::get('export', 'lecturer\AttendanceController@export')->name('export');
Route::get('importExportView', 'lecturer\AttendanceController@importExportView');
Route::post('import', 'lecturer\AttendanceController@import')->name('import');






//login student ให้เข้ามาเจอประวัติตัวเอง
Route::get('/studentprofile', 'student\ProfileController@index');

//login student ให้เข้ามาเจอการลงทะเบียนตัวเอง
Route::get('/studentenrollment', 'student\ProfileController@study');

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
//Route for Advisor+Lecturer user
Route::group(['prefix' => 'AdLec'], function(){
    Route::group(['middleware' => ['AdLec']], function(){
        Route::get('/dashboard', 'AdLec\AdLecController@index');
        // route ไปยังหน้าที่แสดงรายชื่อนักศึกษาของอาจารย์ที่ปรึกษา
        Route::get('ALStudent','AdLec\AdLecController@showStudent');
    });
});
