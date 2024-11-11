<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

//admin

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware( middleware: 'auth');
Route::get('/admin/users', [App\Http\Controllers\UsersController::class, 'index'])->name('admin.users.index')->middleware( middleware: 'auth');
Route::get('/admin/users/create', [App\Http\Controllers\UsersController::class, 'create'])->name('admin.users.create')->middleware( middleware: 'auth');
Route::post('/admin/users/create', [App\Http\Controllers\UsersController::class, 'store'])->name('admin.users.store')->middleware( middleware: 'auth');
Route::get('/admin/users/{id}', [App\Http\Controllers\UsersController::class, 'show'])->name('admin.users.show')->middleware( middleware: 'auth');
Route::get('/admin/users/{id}/edit', [App\Http\Controllers\UsersController::class, 'edit'])->name('admin.users.edit')->middleware( middleware: 'auth');
Route::put('/admin/users/{id}', [App\Http\Controllers\UsersController::class, 'update'])->name('admin.users.update')->middleware( middleware: 'auth');
Route::get('/admin/users/{id}/confirm-delete', [App\Http\Controllers\UsersController::class, 'confirmDelete'])->name('admin.users.confirmDelete')->middleware( middleware: 'auth');
Route::delete('/admin/users/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('admin.users.destroy')->middleware( middleware: 'auth');


///Secretarias - admin

Route::get('/admin/secretarias', [App\Http\Controllers\SecretariaController::class, 'index'])->name('admin.secretarias.index')->middleware( middleware: 'auth');
Route::get('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'create'])->name('admin.secretarias.create')->middleware( middleware: 'auth');
Route::post('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'store'])->name('admin.secretarias.store')->middleware( middleware: 'auth');
Route::get('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'show'])->name('admin.secretarias.show')->middleware( middleware: 'auth');
Route::get('/admin/secretarias/{id}/edit', [App\Http\Controllers\SecretariaController::class, 'edit'])->name('admin.secretarias.edit')->middleware( middleware: 'auth');
Route::put('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'update'])->name('admin.secretarias.update')->middleware( middleware: 'auth');
Route::get('/admin/secretarias/{id}/confirm-delete', [App\Http\Controllers\SecretariaController::class, 'confirmDelete'])->name('admin.secretarias.confirmDelete')->middleware( middleware: 'auth');
Route::delete('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'destroy'])->name('admin.secretarias.destroy')->middleware( middleware: 'auth');

///Pacientes - admin

Route::get('/admin/pacientes', [App\Http\Controllers\PacienteController::class, 'index'])->name('admin.pacientes.index')->middleware( middleware: 'auth');
Route::get('/admin/pacientes/create', [App\Http\Controllers\PacienteController::class, 'create'])->name('admin.pacientes.create')->middleware( middleware: 'auth');
Route::post('/admin/pacientes/create', [App\Http\Controllers\PacienteController::class, 'store'])->name('admin.pacientes.store')->middleware( middleware: 'auth');
Route::get('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'show'])->name('admin.pacientes.show')->middleware( middleware: 'auth');
Route::get('/admin/pacientes/{id}/edit', [App\Http\Controllers\PacienteController::class, 'edit'])->name('admin.pacientes.edit')->middleware( middleware: 'auth');
Route::put('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'update'])->name('admin.pacientes.update')->middleware( middleware: 'auth');
Route::get('/admin/pacientes/{id}/confirm-delete', [App\Http\Controllers\PacienteController::class, 'confirmDelete'])->name('admin.pacientes.confirmDelete')->middleware( middleware: 'auth');
Route::delete('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'destroy'])->name('admin.pacientes.destroy')->middleware( middleware: 'auth');

//Consultorios - admin

Route::get('/admin/consultorios', [App\Http\Controllers\ConsultorioController::class, 'index'])->name('admin.consultorios.index')->middleware( middleware: 'auth');
Route::get('/admin/consultorios/create', [App\Http\Controllers\ConsultorioController::class, 'create'])->name('admin.consultorios.create')->middleware( middleware: 'auth');
Route::post('/admin/consultorios/create', [App\Http\Controllers\ConsultorioController::class, 'store'])->name('admin.consultorios.store')->middleware( middleware: 'auth');
Route::get('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'show'])->name('admin.consultorios.show')->middleware( middleware: 'auth');
Route::get('/admin/consultorios/{id}/edit', [App\Http\Controllers\ConsultorioController::class, 'edit'])->name('admin.consultorios.edit')->middleware( middleware: 'auth');
Route::put('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'update'])->name('admin.consultorios.update')->middleware( middleware: 'auth');
Route::get('/admin/consultorios/{id}/confirm-delete', [App\Http\Controllers\ConsultorioController::class, 'confirmDelete'])->name('admin.consultorios.confirmDelete')->middleware( middleware: 'auth');
Route::delete('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'destroy'])->name('admin.consultorios.destroy')->middleware( middleware: 'auth');

//Doctores - admnin

Route::get('/admin/doctores', [App\Http\Controllers\DoctorController::class, 'index'])->name('admin.doctores.index')->middleware( middleware: 'auth');
Route::get('/admin/doctores/create', [App\Http\Controllers\DoctorController::class, 'create'])->name('admin.doctores.create')->middleware( middleware: 'auth');
Route::post('/admin/doctores/create', [App\Http\Controllers\DoctorController::class, 'store'])->name('admin.doctores.store')->middleware( middleware: 'auth');
Route::get('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'show'])->name('admin.doctores.show')->middleware( middleware: 'auth');
Route::get('/admin/doctores/{id}/edit', [App\Http\Controllers\DoctorController::class, 'edit'])->name('admin.doctores.edit')->middleware( middleware: 'auth');
Route::put('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'update'])->name('admin.doctores.update')->middleware( middleware: 'auth');
Route::get('/admin/doctores/{id}/confirm-delete', [App\Http\Controllers\DoctorController::class, 'confirmDelete'])->name('admin.doctores.confirmDelete')->middleware( middleware: 'auth');
Route::delete('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'destroy'])->name('admin.doctores.destroy')->middleware( middleware: 'auth');