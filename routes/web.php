<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\busquedaController;
use App\Http\Controllers\ambienteController;
use App\Http\Controllers\unidadController;
use App\Http\Controllers\personalController;
use App\Http\Controllers\posesionesController;
use App\Http\Controllers\equiposController;
use App\Http\Controllers\mantenimientocontroller;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\userController;

/*auth*/
Route::get('/', [authController::class,'index'])->middleware('guest')->name('/');
Route::post('/login', [authController::class,'login']);
Route::post('/logout',[authController::class,'logout'] )->name('logout');
/*home*/
Route::get('/home', [homeController::class,'index'])->middleware('auth');
/*buscar*/
Route::get('/user', [userController::class,'user'])->middleware('auth');
Route::post('/nueuse', [userController::class,'nueuse'])->middleware('auth');
Route::post('/getuser', [userController::class,'getuser'])->middleware('auth');
Route::post('/edituser', [userController::class,'edituser'])->middleware('auth');
Route::post('/elimuser', [userController::class,'elimuser'])->middleware('auth');
/*pisos*/
Route::get('/ambiente', [ambienteController::class,'ambiente'])->middleware('auth');
Route::post('/nuevoAmbiente', [ambienteController::class,'nuevoAmbiente'])->middleware('auth');
Route::post('/editarambiente', [ambienteController::class,'editarambiente'])->middleware('auth');
Route::post('/nuevonAmbiente', [ambienteController::class,'nuevonAmbiente'])->middleware('auth');
/*unidad*/
Route::get('/unidad', [unidadController::class,'unidad'])->middleware('auth');
Route::post('/nuevaUnidad', [unidadController::class,'nuevaUnidad'])->middleware('auth');
Route::post('/getunidad', [unidadController::class,'getunidad'])->middleware('auth');
Route::post('/editarUnidad', [unidadController::class,'editarUnidad'])->middleware('auth');
/*personal*/
Route::get('/personal', [personalController::class,'personal'])->middleware('auth');
Route::get('/personal/{unidad}', [personalController::class,'person'])->middleware('auth');
Route::post('/nuevoPersonal', [personalController::class,'nuevoPersonal'])->middleware('auth');
Route::post('/getpersonal', [personalController::class,'getpersonal'])->middleware('auth');
Route::post('/editPersonal', [personalController::class,'editPersonal'])->middleware('auth');
/*posesiones*/
Route::get('/posesion', [posesionesController::class,'posesion'])->middleware('auth'); 
Route::get('/posession/{id}', [posesionesController::class,'posession'])->middleware('auth');
Route::post('/nuevacompu', [posesionesController::class,'nuevacompu'])->middleware('auth');
Route::post('/nuevodispo', [posesionesController::class,'nuevodispo'])->middleware('auth');
Route::post('/getpc', [posesionesController::class,'getpc'])->middleware('auth');
Route::post('/geteq', [posesionesController::class,'geteq'])->middleware('auth');
Route::post('/editcompu', [posesionesController::class,'editcompu'])->middleware('auth');
Route::post('/editdis', [posesionesController::class,'editdis'])->middleware('auth');
/*equipos */
Route::get('/equipos', [equiposController::class,'equipos'])->middleware('auth');
Route::post('/nuevacompus', [equiposController::class,'nuevacompus'])->middleware('auth');
Route::post('/nuevodispos', [equiposController::class,'nuevodispos'])->middleware('auth');
Route::post('/getpcs', [equiposController::class,'getpcs'])->middleware('auth');
Route::post('/geteqs', [equiposController::class,'geteqs'])->middleware('auth');
Route::post('/edtcompus', [equiposController::class,'edtcompus'])->middleware('auth');
Route::post('/editeq', [equiposController::class,'editeq'])->middleware('auth');
Route::post('/getpceye', [equiposController::class,'getpceye'])->middleware('auth');
Route::post('/geteqeye', [equiposController::class,'geteqeye'])->middleware('auth');
Route::post('/bajapc', [equiposController::class,'bajapc'])->middleware('auth');
Route::post('/bajaeq', [equiposController::class,'bajaeq'])->middleware('auth');
/*mantenimiento */
Route::get('/mante', [mantenimientocontroller::class,'mante'])->middleware('auth');
Route::post('/nueman', [mantenimientocontroller::class,'nueman'])->middleware('auth');
Route::post('/getman', [mantenimientocontroller::class,'getman'])->middleware('auth');
Route::post('/editmant', [mantenimientocontroller::class,'editmant'])->middleware('auth');
Route::post('/getmanteni', [mantenimientocontroller::class,'getmanteni'])->middleware('auth');
Route::post('/delete', [mantenimientocontroller::class,'delete'])->middleware('auth');
/*reporte */
Route::get('/reporte/pdf', [ReporteController::class, 'generarPDF'])->name('reporte.pdf');
Route::get('/mantenimientoImdividualPDF/{id}', [ReporteController::class,'mantenimientoImdividualPDF'])->middleware('auth');
Route::get('/ipunidad', [ReporteController::class, 'ipgeneralPDF'])->middleware('auth');
Route::get('/ipunidad/{id}', [ReporteController::class,'ipunidadPDF'])->middleware('auth');
