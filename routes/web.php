<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
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
    return view('user.index');
})->name('user.index');

Route::middleware('IsLogin')->group(function (){
    Route::get('/courses', function () {
        return view('user.courses');
    })->name('user.courses');

    Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');
});

Route::middleware('IsAdminLogin')->group(function (){
    Route::prefix('admin')->group(function (){
        Route::get('/',[HomeController::class,'index'])->name('admin.home');
        Route::get('students/archive',[StudentController::class,'archive'])->name('students.archive');
        Route::get('students/{student}/restore',[StudentController::class,'restore'])->name('students.restore');
        Route::delete('students/{student}/destroy',[StudentController::class,'forceDestroy'])->name('students.forceDestroy');
        Route::resource('students', StudentController::class);
        Route::resource('departments', DepartmentController::class);
    });
});

Route::get('/register',[AuthController::class,'register'])->name('auth.register');
Route::post('/handleRegister',[AuthController::class,'handleRegister'])->name('auth.handleRegister');
Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::post('/handleLogin',[AuthController::class,'handleLogin'])->name('auth.handleLogin');

