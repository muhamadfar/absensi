<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\ReportController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/students', StudentController::class);
Route::resource('/rayon', RayonController::class);
Route::resource('/presence', PresenceController::class);
Route::resource('/major', MajorController::class);
Route::resource('/student_class', ClassController::class);
Route::get('report', [ReportController::class, 'index'])->name('report.index');
// Route::get('/students', [StudentController::class, 'index'])->name('students.index');
// Route::get('/students', [StudentController::class, 'create'])->name('students.create');
// Route::post('/students', [StudentController::class, 'store'])->name('students.store');
// Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
// Route::get('students/{student}', [StudentController::class, 'show']);
// Route::get('students/{student}', [StudentController::class, 'update']);
// Route::delete('students/{student}', [StudentController::class, 'destroy']);
// Route::get('/students', [StudentController::class, 'edit']);
// Route::get('students', [StudentController::class, '']);
// Route::get('/user/{id}', function ($id){
    // return 'User' .$id;
// });

