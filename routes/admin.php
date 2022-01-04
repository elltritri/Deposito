<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\ListaProductoController;



Route::get('',[HomeController::class, 'index']);

Route::get('ingresarFactura',[HomeController::class, 'ingresarFactura']);
Route::post('ingresarDatosFactura',[HomeController::class, 'ingresarDatosFactura'])->name('admin.ingresarDatosFactura');
Route::get('mostrarDatosFactura',[HomeController::class, 'mostrarDatosFactura']);

Route::get('ingresarBom',[HomeController::class, 'ingresarBom']);
Route::post('ingresarDatosBom',[HomeController::class, 'ingresarDatosBom'])->name('admin.ingresarDatosBom');
Route::get('mostrarDatosBom',[HomeController::class, 'mostrarDatosBom'])->name('admin.mostrarDatosBom');

Route::get('importar',[HomeController::class, 'importar'])->name('admin.importar');
Route::post('importarDatos',[HomeController::class, 'importarDatos'])->name('admin.importarDatos');

Route::get('comparar',[HomeController::class, 'comparar'])->name('admin.comparar');
Route::get('compararBF',[HomeController::class, 'compararBF'])->name('admin.compararBF');

Route::get('imprimir',[HomeController::class, 'imprimir'])->name('admin.imprimir');


Route::get('listaProducto',[ListaproductoController::class, 'index']);








