<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\citasController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\registerMascotasController;
use App\Http\Controllers\registroCitasController;
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
//Control de sesion
Route::get('/', function () {
    return view('login');
});
Route::view('/login', "login")->name('login');
Route::view('/registro', "registro")->name('registro');
Route::view('/home', "home")->middleware('auth')->name('home');
Route::post('/validar-registro',[loginController::class,'register'])->name('validar-registro');

Route::post('/inicia-sesion',[loginController::class,'login'])->name('inicia-sesion');
//FIN

//Rutas mascotas
Route::post('/registro-mascotas',[registerMascotasController::class,'registerMascota'])->name('registros-mascota');
Route::get('/registrar-mascotas',[registerMascotasController::class,'index'])->name('registrar-mascota');

Route::get('/citas',[citasController::class,'index'])->name('registro.cita');
Route::get('/cita/listar',[citasController::class,'listar'])->name('cita.listar');
Route::post('/cita/guardar',[citasController::class,'guardar'])->name('citas.guardar');

//home
Route::get('/homes',[homeController::class,'index'])->name('home.procesos');

//Logot
Route::get('/logout',[loginController::class,'logout'])->name('logout');
