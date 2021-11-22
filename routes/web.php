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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('student', App\Http\Controllers\old\studentController::class);

Route::resource('course', App\Http\Controllers\old\courseController::class);

Route::resource('grade', App\Http\Controllers\old\gradeController::class);

Route::resource('instractor', App\Http\Controllers\old\instractorController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\old\HomeController::class, 'index'])->name('home');



//new once
Route::resource('newcourse', App\Http\Controllers\Neww\NewCourseController::class);
Route::resource('newgrade', App\Http\Controllers\Neww\NewGradeController::class);
Route::resource('newclass', App\Http\Controllers\Neww\NewClassController::class);

Route::get('newclass/enroll_students/{class}','App\Http\Controllers\Neww\NewClassController@enrollStudent');

Route::resource('newacad_term', App\Http\Controllers\Neww\NewAcadTermController::class);
Route::resource('newcurriculum', App\Http\Controllers\Neww\NewCurriculumsController::class);

Route::group(['middleware' => ['auth','role:admin']], function () {
    //
    Route::resource('newcurriculum_detail','App\Http\Controllers\Neww\NewCurriculumDetailsController')->except([
		'index', 'create', 'show'
	]);
    Route::get('newcurriculum_detail/create/{curriculum}','App\Http\Controllers\Neww\NewCurriculumDetailsController@create');
    Route::resource('newstudent', App\Http\Controllers\Neww\NewStudentController::class)->except([
		'index'
	]);
});







Route::group(['middleware' => ['auth','role:admin|student']], function () {
    //
    Route::get('newstudent/{curriculum}/{student}','App\Http\Controllers\Neww\NewStudentController@show');
    Route::resource('newstudent', App\Http\Controllers\Neww\NewStudentController::class)->only([
        'index'
    ]);
    
});







Route::get('newcourse/list', [StudentController::class, 'getStudents'])->name('newcourse.list');


Route::group(['middleware' => ['auth','role:admin|instartor']], function () {
    //
    Route::resource('newinstructor', App\Http\Controllers\Neww\NewInstructorController::class);

    
});




