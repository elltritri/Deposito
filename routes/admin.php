<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\ListaDepoController;



Route::get('',[HomeController::class, 'index']);
Route::get('ingresar',[HomeController::class, 'ingresar']);
Route::get('importar',[HomeController::class, 'importar']);
Route::post('importarDatos',[HomeController::class, 'importarDatos'])->name('admin.importarDatos');

Route::get('comparar',[HomeController::class, 'comparar'])->name('admin.comparar');


Route::get('mostrar',[HomeController::class, 'mostrarDatos'])->name('admin.mostrar');
Route::get('listaDepo',[listaDepoController::class, 'index'])->name('listaDepo.index');
Route::get('listaDepostore',[listaDepoController::class, 'store'])->name('lista-depo.store');


