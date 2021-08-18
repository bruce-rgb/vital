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

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/units', [App\Http\Controllers\MedicalUnitController::class, 'index'])->name('units');
Route::get('/units/create', [App\Http\Controllers\MedicalUnitController::class, 'create'])->name('units.create');
Route::delete('/units/delete/{id}', [App\Http\Controllers\MedicalUnitController::class, 'delete'])->name('units.delete');
Route::get('/units/edit/{id}', [App\Http\Controllers\MedicalUnitController::class, 'edit'])->name('units.edit');
Route::put('/units/update/{id}', [App\Http\Controllers\MedicalUnitController::class, 'update'])->name('units.update');
Route::post('/units/store', [App\Http\Controllers\MedicalUnitController::class, 'store'])->name('units.store');

Route::get('/directors', [App\Http\Controllers\DirectorController::class, 'index'])->name('directors');
Route::get('/directors/create', [App\Http\Controllers\DirectorController::class, 'create'])->name('directors.create');
Route::delete('/directors/delete/{id}', [App\Http\Controllers\DirectorController::class, 'delete'])->name('directors.delete');
Route::get('/directors/edit/{id}', [App\Http\Controllers\DirectorController::class, 'edit'])->name('directors.edit');
Route::put('/directors/update/{id}', [App\Http\Controllers\DirectorController::class, 'update'])->name('directors.update');
Route::post('/directors/store', [App\Http\Controllers\DirectorController::class, 'store'])->name('directors.store');
//
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::delete('/users/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('users.delete');
Route::get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/users/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::post('/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
//
Route::get('/doctors', [App\Http\Controllers\DoctorController::class, 'index'])->name('doctors');
Route::get('/doctors/create', [App\Http\Controllers\DoctorController::class, 'create'])->name('doctors.create');
Route::delete('/doctors/delete/{id}', [App\Http\Controllers\DoctorController::class, 'delete'])->name('doctors.delete');
Route::get('/doctors/edit/{id}', [App\Http\Controllers\DoctorController::class, 'edit'])->name('doctors.edit');
Route::put('/doctors/update/{id}', [App\Http\Controllers\DoctorController::class, 'update'])->name('doctors.update');
Route::post('/doctors/store', [App\Http\Controllers\DoctorController::class, 'store'])->name('doctors.store');
//
Route::get('/patients', [App\Http\Controllers\PatientController::class, 'index'])->name('patients');
Route::get('/patients/create', [App\Http\Controllers\PatientController::class, 'create'])->name('patients.create');
Route::delete('/patients/delete/{id}', [App\Http\Controllers\PatientController::class, 'delete'])->name('patients.delete');
Route::get('/patients/edit/{id}', [App\Http\Controllers\PatientController::class, 'edit'])->name('patients.edit');
Route::put('/patients/update/{id}', [App\Http\Controllers\PatientController::class, 'update'])->name('patients.update');
Route::post('/patients/store', [App\Http\Controllers\PatientController::class, 'store'])->name('patients.store');

