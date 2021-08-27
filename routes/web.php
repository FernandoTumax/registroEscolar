<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BimestreController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\StudentController;
use App\Models\Bimestre;
use App\Models\Course;
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

Route::get('/', HomeController::class)->name('home');

Route::resource('students', StudentController::class);
Route::resource('bimestres', BimestreController::class);
Route::get('bimestres/{bimestre}/{student}', [BimestreController::class, 'show'])->name('bimestre.mostrar');
Route::resource('courses', CourseController::class);
Route::get('cursos/{course}/{bimestre}/{student}', [CourseController::class, 'show'])->name('curso.mostrar');
Route::get('cursos/{course}/editar/{bimestre}/{student}', [CourseController::class, 'edit'])->name('curso.edit');
Route::put('cursos/{course}/{bimestre}/{student}', [CourseController::class, 'update'])->name('curso.update');
Route::get('cursos/{course}/editar', [CourseController::class, 'editar'])->name('curso.editar');
Route::put('cursos/{course}', [CourseController::class, 'actualizar'])->name('cursos.actualizar');
Route::resource('activities', ActivityController::class);
Route::get('actividades/{activity}/{course}/{bimestre}/{student}', [ActivityController::class, 'show'])->name('actividad.mostrar');
Route::resource('points', PointController::class);
