<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;



Route::get('',[HomeController::class, 'index']);
Route::get('ingresar',[HomeController::class, 'ingresar']);
Route::get('importar',[HomeController::class, 'importar']);
Route::post('importarDatos',[HomeController::class, 'importarDatos'])->name('admin.importarDatos');

Route::get('comparar',[HomeController::class, 'comparar'])->name('admin.comparar');


Route::get('mostrar',[HomeController::class, 'mostrarDatos'])->name('admin.mostrar');


