<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\BomController;
use App\Http\Controllers\ListadofacturaController;
use App\Http\Controllers\DepositograccaController;




Route::get('',[HomeController::class, 'index']);

Route::get('ingresarFactura',[ListadofacturaController::class, 'ingresarFactura']);
Route::post('ingresarDatosFactura',[ListadofacturaController::class, 'ingresarDatosFactura'])->name('admin.ingresarDatosFactura');
Route::get('mostrarFactura',[ListadofacturaController::class, 'mostrarFactura'])->name('admin.mostrarFactura');
Route::get('mostrarDatosFactura/{numeroFactura}',[ListadofacturaController::class, 'mostrarDatosFactura'])->name('admin.mostrarDatosFactura');


Route::get('ingresarBom',[BomController::class, 'ingresarBom'])->name('admin.ingresarBom');
Route::post('ingresarDatosBom',[BomController::class, 'ingresarDatosBom'])->name('admin.ingresarDatosBom');
Route::get('mostrarBom',[BomController::class, 'mostrarBom'])->name('admin.mostrarBom');
Route::get('mostrarDatosBom/{id_boms}',[BomController::class, 'mostrarDatosBom'])->name('admin.mostrarDatosBom');
Route::put('editarDatosBom/{id_boms}',[BomController::class, 'editarDatosBom'])->name('admin.editarDatosBom');

Route::get('importar',[HomeController::class, 'importar'])->name('admin.importar');
Route::post('importarDatos',[HomeController::class, 'importarDatos'])->name('admin.importarDatos');
Route::get('comparar',[HomeController::class, 'comparar'])->name('admin.comparar');
Route::get('compararBF',[HomeController::class, 'compararBF'])->name('admin.compararBF');
Route::get('compararPPLD',[HomeController::class, 'compararPPLD'])->name('admin.compararPPLD');
Route::post('compararDatosingenieria',[HomeController::class, 'compararDatosingenieria'])->name('admin.compararDatosingenieria');
Route::post('compararDatosDeposito',[HomeController::class, 'compararDatosDeposito'])->name('admin.compararDatosDeposito');

Route::get('imprimir',[HomeController::class, 'imprimir'])->name('admin.imprimir');

Route::resource('producto',App\Http\Controllers\ProductoController::class)->names('producto');


Route::resource('indexdeposito',DepositograccaController::class)->names('depositogracca');
Route::get('agregaradeposito/{numeroFactura}',[DepositograccaController::class, 'agregaradeposito'])->name('depositogracca.agregar');

Route::get('listadeposito',[DepositograccaController::class, 'listadeposito'])->name('depositogracca.listadeposito');
Route::get('listagracca',[DepositograccaController::class, 'listagracca'])->name('depositogracca.listagracca');
Route::get('listadoPanol',[DepositograccaController::class, 'listadoPanol'])->name('listadoPanol');
Route::get('ingresopanol',[DepositograccaController::class, 'ingresopanol'])->name('depositogracca.ingresopanol');
Route::put('ingresarFacturaPanol',[DepositograccaController::class, 'ingresoFacturaPanol'])->name('ingresarFacturaPanol');
Route::get('listadoAire',[DepositograccaController::class, 'listadoAire'])->name('listadoAire');
Route::get('listadoTv',[DepositograccaController::class, 'listadoTv'])->name('listadoTv');
Route::get('listadoCelulares',[DepositograccaController::class, 'listadoCelulares'])->name('listadoCelulares');
Route::get('listadoMicroondas',[DepositograccaController::class, 'listadoMicroondas'])->name('listadoMicroondas');
Route::get('listadoSmt',[DepositograccaController::class, 'listadoSmt'])->name('listadoSmt');
Route::get('listadoheladera',[DepositograccaController::class, 'listadoheladera'])->name('listadoheladera');




Route::post('ingresoproducto',[DepositograccaController::class, 'ingresoproducto'])->name('depositogracca.ingresoproducto');
Route::put('ingresoVencimiento/{id}',[DepositograccaController::class, 'ingresoVencimiento'])->name('depositogracca.ingresoVencimiento');
Route::put('envio/{id}',[DepositograccaController::class, 'envio'])->name('depositogracca.envio');
Route::put('actualizarestadoproducto/{id}',[DepositograccaController::class, 'actualizarestadoproducto'])->name('depositogracca.actualizarestadoproducto');



















