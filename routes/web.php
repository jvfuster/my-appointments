<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\Doctor\ScheduleController;
use App\Http\Middleware\DoctorMiddleware;


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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home'); // {{ route('home') }}

Route::middleware(['auth', 'admin'])->namespace('Admin')->group(function () {
    // Specialty
    Route::get('/specialties', [SpecialtyController::class, 'index']);
    Route::get('/specialties/create', [SpecialtyController::class, 'create']); // form registro
    Route::get('/specialties/{Specialty}/edit', [SpecialtyController::class, 'edit']); // form edición

    Route::post('/specialties', [SpecialtyController::class, 'store']); // envio form registro
    Route::put('/specialties/{Specialty}', [SpecialtyController::class, 'update']); // Guardar los cambios en el servidor
    Route::delete('/specialties/{Specialty}', [SpecialtyController::class, 'destroy']);

    // Doctors
    Route::resource('doctors', 'DoctorController');
    /*
    Verb          Path                            Action  Route Name
    GET           /doctors                        index   doctors.index
    GET           /doctors/create                 create  doctors.create
    POST          /doctors                        store   doctors.store
    GET           /doctors/{doctor}               show    doctors.show
    GET           /doctors/{doctor}/edit          edit    doctors.edit
    PUT|PATCH     /doctors/{doctor}               update  doctors.update
    DELETE        /doctors/{doctor}               destroy doctors.destroy
    */

    // Patients
    Route::resource('patients', 'PatientController');
});


Route::middleware(['auth', 'doctor'])->namespace('Doctor')->group(function () {
    // Specialty
    Route::get('/schedule', [ScheduleController::class, 'edit']);
    Route::post('/schedule', [ScheduleController::class, 'store']);
});
