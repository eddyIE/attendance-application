<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LopController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AttendanceController;
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
//Gọi đến url danh sách lớp: gọi đến LopController, trỏ đến function danh sách lớp
Route::get('/danh_sach_lop', [LopController::class, 'danh_sach_lop'])->name("danh_sach_lop");
//Hiển thị form thêm lớp
Route::get('/them-lop', [LopController::class, 'them_lop'])->name('them-lop');
//Xử lý thêm lớp lên db
Route::post('/them-lop', [LopController::class, 'them_lop_xu_ly'])->name('them_lop_xu_ly');
//Hiển thị form sửa lớp
Route::get('/sua-lop/{id}', [LopController::class, 'sua_lop'])->name('sua_lop');
//Xử lý sửa lớp trên db
Route::post('/sua-lop/{id}', [LopController::class, 'sua_lop_xu_ly'])->name('sua_lop_xu_ly');
//Xóa lớp
Route::get('/xoa-lop/{id}', [LopController::class, 'xoa_lop'])->name('xoa_lop');

// Môn học
Route::get('/subject/all', [SubjectController::class, 'getAll'])->name('getAll');
Route::get('/subject/add', [SubjectController::class, 'getAll'])->name('getAll');
Route::post('/subject/update', [SubjectController::class, 'getAll'])->name('getAll');
Route::get('/subject/delete', [SubjectController::class, 'getAll'])->name('getAll');

// Route::get("/index", [StudentController::class, "StudentList"]);
Route::get("/index", [CourseController::class, "init"]);
Route::post("/index", [AttendanceController::class, 'create'])->name('create');
Route::post("/course", [StudentController::class, "StudentList"]);