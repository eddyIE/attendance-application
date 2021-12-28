<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LoginController;

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

Route::get('/lecturer',[LecturerController::class,'LecturerList']);

Route::get('/login',[LoginController::class,'loginView'])->name('login');

Route::post('/login',[LoginController::class,'authenticate']);

Route::get('/logout',[LoginController::class,'logOut'])->name('logout');

Route::middleware(['Login'])->group(function () {
    Route::get('/index', [StudentController::class,'StudentList'])->name('index');
});
