<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\ListaProductoController;



Route::get('',[HomeController::class, 'index']);

Route::get('ingresar',[HomeController::class, 'ingresar']);
Route::post('ingresarDatos',[HomeController::class, 'ingresarDatos'])->name('admin.ingresarDatos');

Route::get('importar',[HomeController::class, 'importar'])->name('admin.importar');
Route::post('importarDatos',[HomeController::class, 'importarDatos'])->name('admin.importarDatos');

Route::get('comparar',[HomeController::class, 'comparar'])->name('admin.comparar');

Route::get('listaProducto',[ListaproductoController::class, 'index']);


Route::get('mostrar',[HomeController::class, 'mostrarDatos'])->name('admin.mostrar');





