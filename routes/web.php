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

Route::get('/detail123/{course_id}/{semester}/{year}','student\BioController@indexL');
Route::get('/detailAL/{course_id}/{semester}/{year}','student\BioController@indexAL');
Route::get('/detailLF/{course_id}/{semester}/{year}','student\BioController@indexLF');

Route::get('/selectyear/{id}','EducationOfficer\SelectYearController@index');

//InspectorCondition
Route::get('createCondition','ConditionController@createCondition');
Route::post('condition_insert','ConditionController@insert');
//สร้างเงื่อนไขการแจ้งเตือน
Route::resource('conditions', 'ConditionController');
Route::resource('AdminConditions', 'AdminConditionController');
Route::resource('AdConditions', 'AdConditionController');
Route::resource('AdLecConditions', 'AdLecConditionController');
Route::resource('StudentConditions', 'StudentConditionController');
Route::resource('LFConditions', 'LFConditionController');
Route::resource('EduConditions', 'EduConditionController');

Route::resource('ProblemType', 'ProblemTypeController');


Route::get('studentNotiL/{student_id}','NotiController@ProblemL');
Route::get('getStudentNotiL/{student_id}','NotiController@getProblemL')->name('getStudentNotiL');

//Dashboard
Route::get('dashboardL','DashboardController@dashboardL');
Route::get('dashboardAL','DashboardController@dashboardAL');
Route::get('dashboardA','DashboardController@dashboardA');
Route::get('dashboardLF','DashboardController@dashboardLF');
Route::get('dashboardE','DashboardController@dashboardE');
Route::get('dashboardS','DashboardController@dashboardS');

//อัพรูป
Route::get('image', 'ImageController@index');
Route::post('save', 'ImageController@save');

    //Chart
Route::get('chart', 'ChartController@index');
Route::get('stat', 'StatController@index');
//Lecturer
Route::get('subjectStatisticL','ChartController@subjectStatisticL');
Route::get('chartAttendanceL/{course_id}/{semester}/{year}', 'ChartController@attendanceL');
Route::get('chartAttendanceL1/{course_id}/{semester}/{year}', 'ChartController@attendanceL1');
Route::get('chartGradeL/{course_id}/{semester}/{year}', 'ChartController@gradeL');
Route::get('chartGradeL1/{course_id}/{semester}/{year}', 'ChartController@gradeL1');
Route::get('chartGradeL2/{course_id}/{semester}/{year}', 'ChartController@gradeL2');
Route::get('chartProblemL/{course_id}/{semester}/{year}', 'ChartController@problemL');
Route::get('chartProblemL1/{course_id}/{semester}/{year}', 'ChartController@problemL1');
//LF
Route::get('subjectStatisticLF','ChartController@subjectStatisticLF');
Route::get('chartAttendanceLF/{course_id}/{semester}/{year}', 'ChartController@attendanceLF');
Route::get('chartAttendanceLF1/{course_id}/{semester}/{year}', 'ChartController@attendanceLF1');
Route::get('chartGradeLF/{course_id}/{semester}/{year}', 'ChartController@gradeLF');
Route::get('chartGradeLF1/{course_id}/{semester}/{year}', 'ChartController@gradeLF1');
Route::get('chartGradeLF2/{course_id}/{semester}/{year}', 'ChartController@gradeLF2');
Route::get('chartProblemLF/{course_id}/{semester}/{year}', 'ChartController@problemLF');
Route::get('chartProblemLF1/{course_id}/{semester}/{year}', 'ChartController@problemLF1');
//LF
//Student
Route::get('chartAttendanceS', 'ChartController@attendanceS');
Route::get('/getchartAttendanceS', 'ChartController@attendanceS')->name('getChartAttL');
Route::get('chartGradeS', 'ChartController@gradeS');
//Edu
Route::get('curriStatistic','ChartController@curriStatistic');
Route::get('chartAttendanceE/{curriculum_id}', 'ChartController@attendanceE');
Route::get('chartGradeE/{curriculum_id}', 'ChartController@gradeE');
Route::get('chartProblemE/{curriculum_id}', 'ChartController@problemE');
//Ad+Lec
    //lec
Route::get('subjectStatisticAL2','ChartController@subjectStatisticAL2');
// Route::get('chartAttendanceAL2/{course_id}', 'ChartController@attendanceAL2');
// Route::get('chartGradeAL2/{course_id}', 'ChartController@gradeAL2');
// Route::get('chartProblemAL2/{course_id}', 'ChartController@problemAL2');

Route::get('chartAttendanceAL/{course_id}/{semester}/{year}', 'ChartController@attendanceAL');
Route::get('chartAttendanceAL1/{course_id}/{semester}/{year}', 'ChartController@attendanceAL1');
Route::get('chartGradeAL/{course_id}/{semester}/{year}', 'ChartController@gradeAL');
Route::get('chartGradeAL1/{course_id}/{semester}/{year}', 'ChartController@gradeAL1');
Route::get('chartGradeAL2/{course_id}/{semester}/{year}', 'ChartController@gradeAL2');
Route::get('chartProblemAL/{course_id}/{semester}/{year}', 'ChartController@problemAL');
Route::get('chartProblemAL1/{course_id}/{semester}/{year}', 'ChartController@problemAL1');

Route::get('/indexChart', function () {
    return view('AdLec.chart.indexChart');
});

        //Chart Student
Route::get('chartStudentL/{student_id}', 'StatisticController@chartL');
Route::get('getchartStudentL/{student_id}', 'StatisticController@getChartL')->name('getChartL');
Route::get('chartStudentLF/{student_id}', 'StatisticController@chartLF');
Route::get('getchartStudentLF/{student_id}', 'StatisticController@getchartLF')->name('getChartLF');
Route::get('chartStudentA/{student_id}', 'StatisticController@chartA');
Route::get('getchartStudentA/{student_id}', 'StatisticController@getchartA')->name('getChartA');
Route::get('chartStudentAL/{student_id}', 'StatisticController@chartAL');
Route::get('getchartStudentAL/{student_id}', 'StatisticController@getchartAL')->name('getChartAL');
Route::get('chartStudentE/{student_id}', 'StatisticController@chartE');
Route::get('getchartStudentE/{student_id}', 'StatisticController@getchartE')->name('getChartE');
Route::get('chartStudentS/{student_id}', 'StatisticController@chartS');
Route::get('getchartStudentS/{student_id}', 'StatisticController@getchartS')->name('getChartS');



    //EducationOfficer

// map เจ้าหน้าที่นักการศึกษากับหลักสูตร
Route::get('curriculum','EducationOfficer\CurriculumController@show');

//แมบหลักสูตรกับเด็ก
Route::get('curr/{curriculum}','EducationOfficer\CurriculumController@index');

Route::get('studentlist/{id}/{term}','student\BioController@indexE');

Route::get('student_searchE','student\BioController@searchE');

Route::get('student_profileE','student\BioController@profileE');
Route::get('student_profileE/{student_id}','student\BioController@profileE1')->name('profileE');

//กดดูหน้าข้อมูลสัมภาษณ์
Route::get('profilebeforeE/{student_id}','student\InterviewController@profileE');

//กดดูหน้าข้อมูลระหว่างศึกษา
Route::get('profileDuringE/{student_id}','student\BioController@profileDuringE');
Route::get('profileDuringE/{student_id}/{semester}/{year}','student\BioController@profileDuringE1');

//กดดูหน้าข้อมูลหลังจบ
Route::get('profileafterE/{student_id}','student\SrmController@profileE');

//กดดูพฤติกรรม
// Route::get('problem', 'lecturer\ProblemController@showProblemE')->name('problemE');

//เพิ่มพฤติกรรม/ปัญหา
Route::get('problem_createE/{student_id}','lecturer\ProblemController@createE')->name('createE');
Route::post('problem_insertE','lecturer\ProblemController@insertE');

//แสดงพฤติกรรมเด็ก
Route::get('studentproblemE/{student_id}', 'lecturer\ProblemController@showProblemE');
Route::get('getStudentproblemE/{student_id}', 'lecturer\ProblemController@getShowProblemE')->name('getStudentproblemE');

//กดดูวิชาที่เด็กลงทะเบียน
Route::get('student_enrollmentE','student\StudyController@enrollmentE');
Route::get('student_enrollmentE/{student_id}/{semester}/{year}','student\StudyController@enrollmentE1')->name('enrollE');
Route::get('student_enrollmentE1/{student_id}/{semester}/{year}','student\StudyController@enrollmentE2')->name('enrollE1');

//แสดงการเข้าเรียน -> Attendance
Route::get('/attendanceE/{course_id}','lecturer\AttendanceController@showAttendanceE');

//แสดงผลการเรียน -> Grade
Route::get('/showGradeE/{course_id}','lecturer\GradeController@showGradeE');

    //Alumni
Route::get('alumni','student\AlumniController@show');

Route::get('/EducationOfficerSurvey', function () {
    return view('EducationOfficer.indexSurvey');
});

    //Lecturer

//แมบวิชากับเด็ก
Route::get('subject/{course}','SubjectController@index');


Route::get('course','SubjectController@showCourse');
 Route::get('/lecturer/studentlist/{course_id}/{semester}/{year}','student\BioController@indexL');

Route::get('student_profileL','student\BioController@profileL');
Route::get('student_profileL/{student_id}','student\BioController@profileL1')->name('profileL');

//กดดูหน้าข้อมูลสัมภาษณ์
Route::get('profilebeforeL/{student_id}','student\InterviewController@profileL');

//กดดูหน้าข้อมูลระหว่างศึกษา
// Route::get('profileDuringL/{student_id}/{semester}/{year}','student\BioController@profileDuringL');
Route::get('profileDuringL/{student_id}','student\BioController@profileDuringL');
Route::get('profileDuringL/{student_id}/{semester}/{year}','student\BioController@profileDuringL1');

//กดดูหน้าข้อมูลหลังจบ
Route::get('profileafterL/{student_id}','student\SrmController@profileL');

//เพิ่มพฤติกรรม/ปัญหา
Route::get('problem_create/{student_id}','lecturer\ProblemController@create')->name('create');
Route::post('problem_insert','lecturer\ProblemController@insert');
//แสดงพฤติกรรมเด็ก

Route::get('studentproblem/{student_id}/{semester}/{year}', 'lecturer\ProblemController@showProblemL');

// search
// Route::get('student_searchL','student\BioController@searchL');
Route::get('student_searchL/{course_id}/{semester}/{year}','student\BioController@searchL');

// route แสดงรายวิชาที่อาจารย์สอน
Route::get('course','SubjectController@lecToCourse');

//กดปุ่มแจ้งเตือนแล้วเจอพฤติกรรมที่รุนแรงของนักศึกษา
Route::get('risk_problem/{student_id}','lecturer\ProblemController@notiProblemL');

//กดดูวิชาที่เด็กลงทะเบียน
Route::get('student_enrollmentL','student\StudyController@enrollmentL');
Route::get('student_enrollmentL/{student_id}/{semester}/{year}','student\StudyController@enrollmentL1')->name('enrollL');
Route::get('student_enrollmentL1/{student_id}/{semester}/{year}','student\StudyController@enrollmentL2')->name('enrollL1');

//form Attendance
Route::get('FormAttendance', 'lecturer\FormController@FormAttendanceView');
Route::get('exportAttendance', 'lecturer\FormController@FormAttendance')->name('exportAttendance');
Route::get('exportAttendance2', 'lecturer\FormController@FormAttendance2')->name('exportAttendance2');

//form Grade
Route::get('FormGrade', 'lecturer\FormController@FormGradeView');
Route::get('exportFormGrade', 'lecturer\FormController@FormGrade')->name('exportFormGrade');

//import excel -> Attendance
// Route::get('export', 'lecturer\AttendanceController@export')->name('export');
Route::get('export/{course_id}', 'lecturer\AttendanceController@export')->name('export');
Route::get('importExportView/{course_id}', 'lecturer\AttendanceController@importExportView');
Route::post('import/{course_id}', 'lecturer\AttendanceController@import')->name('import');
Route::get('export2/{course_id}', 'lecturer\AttendanceController@export2')->name('export2');
Route::get('importExportView2/{course_id}', 'lecturer\AttendanceController@importExportView2');
Route::post('import2/{course_id}', 'lecturer\AttendanceController@import2')->name('import2');

//แสดงการเข้าเรียน -> Attendance
Route::get('/attendance/{course_id}/{semester}/{year}','lecturer\AttendanceController@showAttendanceL');

//import excel -> Grade
Route::get('exportGrade/{course_id}', 'lecturer\GradeController@export')->name('exportGrade');
Route::get('importExportGrade/{course_id}', 'lecturer\GradeController@importExportView');
Route::post('importGrade/{course_id}', 'lecturer\GradeController@import')->name('import');

//แสดงผลการเรียน -> Grade
Route::get('/showGrade/{course_id}/{semester}/{year}','lecturer\GradeController@showGradeL');

//index survey
Route::get('/indexSurvey', 'student\BioController@showme');
Route::get('/advisorSurvey', 'student\BioController@showmeAd');
Route::get('/adlecSurvey', 'student\BioController@showmeAdlec');
Route::get('/LFSurvey', 'student\BioController@showmeLF');

            //แจ้งเตือน//
//Lec
    //กดปุ่มแจ้งเตือนแล้วเจอพฤติกรรมที่รุนแรงของนักศึกษา
Route::get('notiproblemL/{student_id}','NotificationController@ProblemL');
Route::get('getNotiproblemL/{student_id}','NotificationController@getProblemL')->name('getNotiproblemL');

Route::get('allNotiL/{course_id}','NotificationController@allNotiL');
    // route แสดงรายวิชาที่อาจารย์สอน
Route::get('subjectNotiL','NotificationController@subjectNotiL');
Route::get('showNotiL/{course_id}/{semester}/{year}','NotificationController@showNotiL');

//LF
Route::get('notiproblemLF/{student_id}','NotificationController@ProblemLF');
Route::get('getNotiproblemLF/{student_id}','NotificationController@getProblemLF')->name('getNotiproblemLF');
Route::get('allNotiLF/{course_id}','NotificationController@allNotiLF');
Route::get('subjectNotiLF','NotificationController@subjectNotiLF');
Route::get('showNotiLF/{course_id}/{semester}/{year}','NotificationController@showNotiLF');
//Advisor
Route::get('notiproblemA/{student_id}','NotificationController@ProblemA');
Route::get('notiproblemA2/{student_id}/{semester}/{year}','NotificationController@ProblemA2');

Route::get('getNotiproblemA/{student_id}','NotificationController@getProblemA')->name('getNotiproblemA');


//Ad+Lec
// Route::get('/indexNoti', function () {
//     return view('AdLec.indexNoti');
// });
Route::get('/indexNoti','NotificationController@indexNoti');
Route::get('notiproblemAL/{student_id}','NotificationController@ProblemAL');
Route::get('getNotiproblemAL/{student_id}','NotificationController@getProblemAL')->name('getNotiproblemAL');
Route::get('allNotiAL2/{course_id}','NotificationController@allNotiAL2');
Route::get('subjectNotiAL2','NotificationController@subjectNotiAL2');
Route::get('showNotiAL2/{course_id}','NotificationController@showNotiAL2');
//Edu
Route::get('curriNoti','NotificationController@curriNoti');
Route::get('notiproblemE/{student_id}','NotificationController@ProblemE');
Route::get('getNotiproblemE/{student_id}','NotificationController@getProblemE')->name('getNotiproblemE');
Route::get('showNotiE/{curriculum_id}','NotificationController@showNotiE');
//Student
Route::get('showNotiS','NotificationController@showNotiS');



    //Student
Route::get('profile/{student_id}','student\BioController@profile');

Route::get('enrollmentS/{student_id}','student\StudyController@enrollmentS')->name('studentenrollment');
// Route::get('student_enrollmentS/{student_id}/{semester}/{year}','student\StudyController@enrollmentS1')->name('enrollS');
// Route::get('student_enrollmentS/{student_id}/{semester}/{year}','student\StudyController@enrollmentL2')->name('enrollS1');

//กดดูหน้าข้อมูลสัมภาษณ์
Route::get('profilebeforeS/{student_id}','student\InterviewController@profileS');

//กดดูหน้าข้อมูลหลังจบ
Route::get('profileafterS/{student_id}','student\SrmController@profileS');

//กดดูหน้าข้อมูลระหว่างศึกษา
Route::get('profileDuringS/{student_id}','student\BioController@profileDuringS');
Route::get('profileDuringS/{student_id}/{semester}/{year}','student\BioController@profileDuringS1');

//กดดูวิชาที่่ลงทะเบียน
Route::get('study/{student_id}','student\StudyController@enrollmentS');

Route::get('studentSurvey/{survey}','student\surveyController@showall');

Route::get('/studentSurvey', function () {
    return view('student.indexSurvey');
});


//map อาจารย์กับวิชา
// Route::get('lecturer/{instructor}','lecturer\InstructorController@index');
//กดดูหน้าข้อมูลหลังจบ
Route::get('profileafter/{student_id}','student\SrmController@profile');

//แสดงการเข้าเรียน Attendance
Route::get('/student/attendance','lecturer\AttendanceController@showAttendanceS');
Route::get('/student/attendance/{semester}/{year}','lecturer\AttendanceController@showAttendanceS2');
//แสดงผลการเรียน Grade
Route::get('/student/grade','lecturer\GradeController@showGradeS');
Route::get('/student/grade/{semester}/{year}','lecturer\GradeController@showGradeS2');

    //Advisor
Route::get('student_profileA','student\BioController@profileA');
Route::get('student_profileA/{student_id}','student\BioController@profileA1')->name('profileA');

//กดดูหน้าข้อมูลสัมภาษณ์
Route::get('profilebeforeA/{student_id}','student\InterviewController@profileA');

//กดดูหน้าข้อมูลระหว่างศึกษา
Route::get('profileDuringA/{student_id}','student\BioController@profileDuringA');
Route::get('profileDuringA/{student_id}/{semester}/{year}','student\BioController@profileDuringA1');

//กดดูหน้าข้อมูลหลังจบ
Route::get('profileafterA/{student_id}','student\SrmController@profileA');

//เพิ่มพฤติกรรม/ปัญหา
Route::get('problem_createA/{student_id}','lecturer\ProblemController@createA')->name('createA');
Route::post('problem_insertA','lecturer\ProblemController@insertA');

//แสดงพฤติกรรมเด็ก
// Route::get('studentproblemA/{student_id}', 'lecturer\ProblemController@showProblemA');
Route::get('studentproblemA/{student_id}', 'lecturer\ProblemController@showProblemA');
Route::get('getStudentproblemA/{student_id}', 'lecturer\ProblemController@getShowProblemA')->name('getStudentproblemA');

// Route::get('student_searchA','student\BioController@searchA');
// Route::get('student_searchA/{semester}/{year}','student\BioController@searchA');

//กดดูวิชาที่เด็กลงทะเบียน
Route::get('student_enrollmentA','student\StudyController@enrollmentA');
Route::get('student_enrollmentA/{student_id}/{semester}/{year}','student\StudyController@enrollmentA1')->name('enrollA');
Route::get('student_enrollmentA1/{student_id}/{semester}/{year}','student\StudyController@enrollmentA2')->name('enrollA1');

//แสดงการเข้าเรียน -> Attendance
// Route::get('/attendanceA/{course_id}','lecturer\AttendanceController@showAttendanceA');
Route::get('/attendanceA/{student_id}/{semester}/{year}','lecturer\AttendanceController@showAttendanceA');

//แสดงผลการเรียน -> Grade
Route::get('/showGradeA/{student_id}/{semester}/{year}','lecturer\GradeController@showGradeA');


// Route::get('/advisorSurvey', function () {
//     return view('advisor.indexSurvey');
// });

    //Advisor+Lecturer
// Route::get('student_searchAL','student\BioController@searchAL');
Route::get('student_searchAL/{course_id}/{semester}/{year}','student\BioController@searchAL');

Route::get('student_profileAL','student\BioController@profileAL');
Route::get('student_profileAL/{student_id}','student\BioController@profileAL1')->name('profileAL');


//กดดูหน้าข้อมูลสัมภาษณ์
Route::get('profilebeforeAL/{student_id}','student\InterviewController@profileAL');

//กดดูหน้าข้อมูลระหว่างศึกษา
Route::get('profileDuringAL/{student_id}','student\BioController@profileDuringAL');
Route::get('profileDuringAL1/{student_id}/{semester}/{year}','student\BioController@profileDuringAL1');

//กดดูหน้าข้อมูลหลังจบ
Route::get('profileafterAL/{student_id}','student\SrmController@profileAL');

//กดดูวิชาที่่ลงทะเบียน
Route::get('student_enrollmentAL','student\StudyController@enrollmentAL');
Route::get('student_enrollmentAL/{student_id}/{semester}/{year}','student\StudyController@enrollmentAL1')->name('enrollAL');
Route::get('student_enrollmentAL1/{student_id}/{semester}/{year}','student\StudyController@enrollmentAL2')->name('enrollAL1');


//แมบวิชากับเด็ก
Route::get('subjectAL/{course}','SubjectController@indexAL');

Route::get('courseAL','SubjectController@showCourseAL');

// route แสดงรายวิชาที่อาจารย์สอน
Route::get('courseAL','SubjectController@lecToCourseAL');

//เพิ่มพฤติกรรม/ปัญหา
Route::get('problem_createAL/{student_id}','lecturer\ProblemController@createAL')->name('create');
Route::post('problem_insertAL','lecturer\ProblemController@insertAL');
//แสดงพฤติกรรมเด็ก
// Route::get('studentproblemAL/{student_id}', 'lecturer\ProblemController@showProblemAL');
Route::get('studentproblemAL/{student_id}', 'lecturer\ProblemController@showProblemAL');
Route::get('getStudentproblemAL/{student_id}', 'lecturer\ProblemController@getShowProblemAL')->name('getStudentproblemAL');

//Advisor
//แสดงการเข้าเรียน -> Attendance
// Route::get('/attendanceA/{course_id}','lecturer\AttendanceController@showAttendanceA');
Route::get('/attendanceAL2/{student_id}/{semester}/{year}','lecturer\AttendanceController@showAttendanceAL2');
//แสดงผลการเรียน -> Grade
Route::get('/showGradeAL2/{student_id}/{semester}/{year}','lecturer\GradeController@showGradeAL2');

// //Lecturer
// //แสดงการเข้าเรียน -> Attendance
// Route::get('/attendanceAL2/{course_id}','lecturer\AttendanceController@showAttendanceAL2');
// //แสดงผลการเรียน -> Grade
// Route::get('/showGradeAL2/{course_id}','lecturer\GradeController@showGradeAL2');

        //Excel
//form Attendance
Route::get('FormAttendanceAL', 'lecturer\FormController@FormAttendanceViewAL');
Route::get('exportAttendanceAL', 'lecturer\FormController@FormAttendanceAL')->name('exportAttendanceAL');
Route::get('exportAttendanceAL2', 'lecturer\FormController@FormAttendanceAL2')->name('exportAttendanceAL2');

//form Grade
Route::get('FormGradeAL', 'lecturer\FormController@FormGradeViewAL');
Route::get('exportFormGradeAL', 'lecturer\FormController@FormGradeAL')->name('exportFormGradeAL');

//import excel -> Attendance
Route::get('exportAL/{course_id}', 'lecturer\AttendanceController@export')->name('exportAL');
Route::get('importExportViewAL/{course_id}', 'lecturer\AttendanceController@importExportViewAL');
Route::post('importAL/{course_id}', 'lecturer\AttendanceController@import')->name('importAL');
Route::get('exportAL2/{course_id}', 'lecturer\AttendanceController@export2')->name('exportAL2');
Route::get('importExportViewAL2/{course_id}', 'lecturer\AttendanceController@importExportViewAL2');
Route::post('importAL2/{course_id}', 'lecturer\AttendanceController@import2')->name('importAL2');

//import excel -> Grade
Route::get('exportGradeAL/{course_id}', 'lecturer\GradeController@export')->name('exportGradeAL');
Route::get('importExportGradeAL/{course_id}', 'lecturer\GradeController@importExportViewAL');
Route::post('importGradeAL/{course_id}', 'lecturer\GradeController@import')->name('importAL');

//แสดงการเข้าเรียน -> Attendance
Route::get('/attendanceAL/{course_id}/{semester}/{year}','lecturer\AttendanceController@showAttendanceAL');
//แสดงผลการเรียน -> Grade
Route::get('/showGradeAL/{course_id}/{semester}/{year}','lecturer\GradeController@showGradeAL');

// Route::get('/adlecSurvey', function () {
//     return view('Adlec.indexSurvey');
// });



    //LF
//แมบวิชากับเด็ก
Route::get('subjectLF/{course}','SubjectController@indexLF');


Route::get('courseLF','SubjectController@showCourseLF');

Route::get('student_profileLF','student\BioController@profileLF');
Route::get('student_profileLF/{student_id}','student\BioController@profileLF1')->name('profileLF');

//กดดูหน้าข้อมูลสัมภาษณ์
Route::get('profilebeforeLF/{student_id}','student\InterviewController@profileLF');

//กดดูหน้าข้อมูลระหว่างศึกษา
Route::get('profileDuringLF/{student_id}','student\BioController@profileDuringLF');
Route::get('profileDuringLF/{student_id}/{semester}/{year}','student\BioController@profileDuringLF1');

//กดดูหน้าข้อมูลหลังจบ
Route::get('profileafterLF/{student_id}','student\SrmController@profileLF');

//เพิ่มพฤติกรรม/ปัญหา
Route::get('problem_createLF/{student_id}','lecturer\ProblemController@createLF')->name('createLF');
Route::post('problem_insertLF','lecturer\ProblemController@insertLF');
//แสดงพฤติกรรมเด็ก
Route::get('studentproblemLF/{student_id}/{semester}/{year}', 'lecturer\ProblemController@showProblemLF');

// search
// Route::get('student_searchLF','student\BioController@searchLF');
Route::get('student_searchLF/{course_id}/{semester}/{year}','student\BioController@searchLF');

// route แสดงรายวิชาที่อาจารย์สอน
Route::get('courseLF','SubjectController@lecToCourseLF');

//กดปุ่มแจ้งเตือนแล้วเจอพฤติกรรมที่รุนแรงของนักศึกษา
Route::get('risk_problemLF/{student_id}','lecturer\ProblemController@notiProblemLF');

//กดดูวิชาที่เด็กลงทะเบียน
Route::get('student_enrollmentLF','student\StudyController@enrollmentLF');
Route::get('student_enrollmentLF/{student_id}/{semester}/{year}','student\StudyController@enrollmentLF1')->name('enrollLF');
Route::get('student_enrollmentLF1/{student_id}/{semester}/{year}','student\StudyController@enrollmentLF2')->name('enrollLF1');

//form Attendance
Route::get('FormAttendanceLF', 'lecturer\FormController@FormAttendanceViewLF');
Route::get('exportAttendanceLF', 'lecturer\FormController@FormAttendanceLF')->name('exportAttendanceLF');
Route::get('exportAttendanceLF2', 'lecturer\FormController@FormAttendanceLF2')->name('exportAttendanceLF2');

//form Grade
Route::get('FormGradeLF', 'lecturer\FormController@FormGradeViewLF');
Route::get('exportFormGradeLF', 'lecturer\FormController@FormGradeLF')->name('exportFormGradeLF');

//import excel -> Attendance
Route::get('exportLF/{course_id}', 'lecturer\AttendanceController@export')->name('exportLF');
Route::get('importExportViewLF/{course_id}', 'lecturer\AttendanceController@importExportViewLF');
Route::post('importLF/{course_id}', 'lecturer\AttendanceController@import')->name('importLF');
Route::get('exportLF2/{course_id}', 'lecturer\AttendanceController@export2')->name('exportLF2');
Route::get('importExportViewLF2/{course_id}', 'lecturer\AttendanceController@importExportViewLF2');
Route::post('importLF2/{course_id}', 'lecturer\AttendanceController@import2')->name('importLF2');

//import excel -> Grade
Route::get('exportGradeLF/{course_id}', 'lecturer\GradeController@export')->name('exportGradeLF');
Route::get('importExportGradeLF/{course_id}', 'lecturer\GradeController@importExportViewLF');
Route::post('importGradeLF/{course_id}', 'lecturer\GradeController@import')->name('importLF');

//แสดงการเข้าเรียน -> Attendance
Route::get('/attendanceLF/{course_id}/{semester}/{year}','lecturer\AttendanceController@showAttendanceLF');
//แสดงผลการเรียน -> Grade
Route::get('/showGradeLF/{course_id}/{semester}/{year}','lecturer\GradeController@showGradeLF');

// Route::get('/LFSurvey', function () {
//     return view('LF.indexSurvey');
// });


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
Route::get('question', function () {
    return view('student.question');
});



//แบบสอบถามมมมมม

// Route::get('/', 'student\SurveyController@home');

Route::get('/survey/new', 'student\SurveyController@new_survey')->name('new.survey');
Route::get('/survey/advisornew', 'student\SurveyController@new_surveyAd')->name('new.surveyAd');
Route::get('/survey/adlecnew', 'student\SurveyController@new_surveyAdlec')->name('new.surveyAdlec');
Route::get('/survey/edunew', 'student\SurveyController@new_surveyEdu')->name('new.surveyEdu');
Route::get('/survey/lfnew', 'student\SurveyController@new_surveyLF')->name('new.surveyLF');



Route::get('/survey/{survey}', 'student\SurveyController@detail_survey')->name('detail.survey');
Route::get('/advisorsurvey/{survey}', 'student\SurveyController@detail_surveyAd')->name('detail.surveyAd');
Route::get('/adlecsurvey/{survey}', 'student\SurveyController@detail_surveyAdlec')->name('detail.surveyAdlec');
Route::get('/edusurvey/{survey}', 'student\SurveyController@detail_surveyEdu')->name('detail.surveyEdu');
Route::get('/lfsurvey/{survey}', 'student\SurveyController@detail_surveyLF')->name('detail.surveyLF');



Route::get('/survey/view/{survey}', 'student\SurveyController@view_survey')->name('view.survey');
Route::get('/advisorsurvey/view/{survey}', 'student\SurveyController@view_surveyAd')->name('view.surveyAd');
Route::get('/adlecsurvey/view/{survey}', 'student\SurveyController@view_surveyAdlec')->name('view.surveyAdlec');
Route::get('/edusurvey/view/{survey}', 'student\SurveyController@view_surveyEdu')->name('view.surveyEdu');
Route::get('/lfsurvey/view/{survey}', 'student\SurveyController@view_surveyLF')->name('view.surveyLF');
Route::get('/studentsurvey/view/{survey}', 'student\SurveyController@view_surveyStudent')->name('view.surveyStu');


Route::get('/survey/answers/{survey}', 'student\SurveyController@view_survey_answers')->name('view.survey.answers');
Route::get('/advisorsurvey/answers/{survey}', 'student\SurveyController@view_survey_answersAd')->name('view.survey.answersAd');
Route::get('/adlecsurvey/answers/{survey}', 'student\SurveyController@view_survey_answersAdLec')->name('view.survey.answersAdLec');
Route::get('/edusurvey/answers/{survey}', 'student\SurveyController@view_survey_answersEdu')->name('view.survey.answersEdu');
Route::get('/lfsurvey/answers/{survey}', 'student\SurveyController@view_survey_answersLF')->name('view.survey.answersLF');
Route::get('/studentsurvey/answers/{survey}', 'student\SurveyController@view_survey_answersStudent')->name('view.survey.answersStu');

Route::get('/survey','student\SurveyController@index');
Route::get('/survey/lecutrer/lecturer','student\SurveyController@lecindex');
// Route::get('/lecsurvey/{semester}/{year}','student\SurveyController@lecindex1');
// Route::get('/survey/lecturer/lecturer/{student_id}','student\SurveyController@lecindex2');
Route::get('/survey/advisor/advisor','student\SurveyController@advisorindex');
Route::get('/survey/adlec/adlec','student\SurveyController@adLecindex');
Route::get('/survey/educationOfficer/educationOfficer','student\SurveyController@eduindex');
Route::get('/survey/LF/LF','student\SurveyController@lfindex');

Route::get('/survey/{survey}/delete', 'student\SurveyController@delete_survey')->name('delete.survey');
Route::get('/advisorsurvey/{survey}/delete', 'student\SurveyController@delete_surveyAd')->name('delete.surveyAd');
Route::get('/adlecsurvey/{survey}/delete', 'student\SurveyController@delete_surveyAdlec')->name('delete.surveyAdlec');
Route::get('/edusurvey/{survey}/delete', 'student\SurveyController@delete_surveyEdu')->name('delete.surveyEdu');
Route::get('/lfsurvey/{survey}/delete', 'student\SurveyController@delete_surveyLF')->name('delete.surveyLF');

Route::get('/survey/{survey}/edit', 'student\SurveyController@edit')->name('edit.survey');
Route::get('/advisorsurvey/{survey}/edit', 'student\SurveyController@editAd')->name('edit.surveyAd');
Route::get('/edusurvey/{survey}/edit', 'student\SurveyController@editEdu')->name('edit.surveyEdu');
Route::get('/adlecsurvey/{survey}/edit', 'student\SurveyController@editAdlec')->name('edit.surveyAdlec');
Route::get('/lfsurvey/{survey}/edit', 'student\SurveyController@editLF')->name('edit.surveyLF');


Route::patch('/survey/{survey}/update', 'student\SurveyController@update')->name('update.survey');
Route::patch('/edusurvey/{survey}/update', 'student\SurveyController@updateEdu')->name('update.surveyEdu');
Route::patch('/advisorsurvey/{survey}/update', 'student\SurveyController@updateAd')->name('update.surveyAd');
Route::patch('/adlecsurvey/{survey}/update', 'student\SurveyController@updateAdlec')->name('update.surveyAdlec');
Route::patch('/lfsurvey/{survey}/update', 'student\SurveyController@updateLF')->name('update.surveyLF');

//พัง
Route::post('/survey/view/{survey}/completed', 'student\AnswerController@store')->name('complete.survey');
Route::post('/lfsurvey/view/{survey}/completed', 'student\AnswerController@storeLF')->name('complete.surveyLF');
Route::post('/advisorsurvey/view/{survey}/completed', 'student\AnswerController@storeAd')->name('complete.surveyAd');
Route::post('/adlecsurvey/view/{survey}/completed', 'student\AnswerController@storeAdlec')->name('complete.surveyAdlec');
Route::post('/edusurvey/view/{survey}/completed', 'student\AnswerController@storeEdu')->name('complete.surveyEdu');
Route::post('/studentsurvey/view/{survey}/completed', 'student\AnswerController@storeStudent')->name('complete.surveyStu');

Route::post('/survey/create', 'student\SurveyController@create')->name('create.survey');
Route::post('/advisorsurvey/create', 'student\SurveyController@createAd')->name('create.surveyAd');
Route::post('/adlecsurvey/create', 'student\SurveyController@createAdlec')->name('create.surveyAdlec');
Route::post('/edusurvey/create', 'student\SurveyController@createEdu')->name('create.surveyEdu');
Route::post('/lfsurvey/create', 'student\SurveyController@createLF')->name('create.surveyLF');


// Questions related
Route::post('/survey/{survey}/questions', 'student\QuestionController@store')->name('store.question');
Route::post('/advisorsurvey/{survey}/questions', 'student\QuestionController@storeAd')->name('store.questionAd');
Route::post('/adlecsurvey/{survey}/questions', 'student\QuestionController@storeAdlec')->name('store.questionAdlec');
Route::post('/edusurvey/{survey}/questions', 'student\QuestionController@storeEdu')->name('store.questionEdu');
Route::post('/lfsurvey/{survey}/questions', 'student\QuestionController@storeLF')->name('store.questionLF');

Route::get('/question/{question}/edit', 'student\QuestionController@edit')->name('edit.question');
Route::get('/advisorquestion/{question}/edit', 'student\QuestionController@editAd')->name('edit.questionAd');
Route::get('/adlecquestion/{question}/edit', 'student\QuestionController@editAdlec')->name('edit.questionAdlec');
Route::get('/eduquestion/{question}/edit', 'student\QuestionController@editEdu')->name('edit.questionEdu');
Route::get('/lfquestion/{question}/edit', 'student\QuestionController@editLF')->name('edit.questionLF');


Route::patch('/question/{question}/update', 'student\QuestionController@update')->name('update.question');
Route::patch('/advisorquestion/{question}/update', 'student\QuestionController@updateAd')->name('update.questionAd');
Route::patch('/adlecquestion/{question}/update', 'student\QuestionController@updateAdlec')->name('update.questionAdlec');
Route::patch('/eduquestion/{question}/update', 'student\QuestionController@updateEdu')->name('update.questionEdu');
Route::patch('/lfquestion/{question}/update', 'student\QuestionController@updateLF')->name('update.questionLF');
Route::auth();





//login student ให้เข้ามาเจอประวัติตัวเอง
Route::get('/studentprofile', 'student\ProfileController@index');

//login student ให้เข้ามาเจอการลงทะเบียนตัวเอง
Route::get('/studentenrollment', 'student\ProfileController@study');
Route::get('/studentenrollment/{semester}/{year}', 'student\ProfileController@study1');
// Route::get('/studentenrollment1/{semester}/{year}', 'student\ProfileController@study2');

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
        Route::get('myStudent/{semester}/{year}','advisor\AdvisorController@showStudent')->name('firstpage');
        Route::get('showAtt/{semester}/{year}','advisor\AdvisorController@showAttendance');
        Route::get('showNotiA/{semester}/{year}','NotificationController@showNotiA');
        Route::get('chartAttendanceA/{semester}/{year}','ChartController@attendanceA');
        Route::get('chartAttendanceA1/{semester}/{year}','ChartController@attendanceA1');
        Route::get('chartGradeA/{semester}/{year}','ChartController@gradeA');
        Route::get('chartGradeA1/{semester}/{year}','ChartController@gradeA1');
        Route::get('chartProblemA/{semester}/{year}','ChartController@problemA');

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
        // Route::get('ALStudent','AdLec\AdLecController@showStudent');
        Route::get('ALStudent/{semester}/{year}','AdLec\AdLecController@showStudent');
        Route::get('showNotiAL','NotificationController@showNotiAL');
        Route::get('chartAttendanceAL','ChartController@attendanceAL');
        Route::get('chartGradeAL','ChartController@gradeAL');
        Route::get('chartProblemAL','ChartController@problemAL');
        // Route::get('student_searchAL1/{semester}/{year}','student\BioController@searchAL1');
    });
});
//Route for LF user
Route::group(['prefix' => 'LF'], function(){
    Route::group(['middleware' => ['LF']], function(){
        Route::get('/dashboard', 'LF\LFController@index');
    });
});
//Route for Admin user
Route::group(['prefix' => 'Admin'], function(){
    Route::group(['middleware' => ['Admin']], function(){
        Route::get('/dashboard', 'Admin\AdminController@index');
    });
});


//Noti
//Route::get('checkNoti', 'HomeController@checkNoti')->name('check-noti');
