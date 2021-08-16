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

