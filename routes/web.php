<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseController;

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

Route::get('/lecturer', [LecturerController::class, 'LecturerList']);

Route::get('/editLecturer/{id}', [LecturerController::class, 'LecturerEdit'])->name('editLecturer');

Route::post('/editLecturer/{id}', [LecturerController::class, 'Edit']);

Route::get('/login', [LoginController::class, 'loginView'])->name('login');

Route::get('/logout', [LoginController::class, 'logOut'])->name('logout');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::middleware(['Login'])->group(function () {
    Route::get('/index', [CourseController::class, 'init'])->name('index');
    Route::post("/index", [AttendanceController::class, 'create'])->name('create');
    Route::post("index/course", [StudentController::class, "StudentList"])->name('course_attendance');
    // Route::get('/index', [StudentController::class,'StudentList'])->name('index');
    Route::get('/course', [CourseController::class, 'index'])->name('course');
    Route::get('/course/new', [CourseController::class, 'create'])->name('new_course');
    Route::post('/course/new', [CourseController::class, 'store'])->name('store_course');
    Route::get('/course/{id}', [CourseController::class, 'detail'])->name('course_detail');
    Route::get('/course/{id}/edit', [CourseController::class, 'edit'])->name('edit_course');
    Route::post('/course/{id}', [CourseController::class, 'updates'])->name('update_course');
    Route::get('/course/{id}/delete', [CourseController::class, 'delete'])->name('delete_course');
    Route::get('/index/lesson/{id}', [StudentController::class, 'getLessonAttendanceList'])->name('get_lesson');
});