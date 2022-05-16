<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AdminController;

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


Route::controller(AdminController::class)->group(function(){
    Route::get('createDataBase','createDataBase')->name('createdb');
    Route::get('createTable','createTable')->name('createtb');
    Route::get('generarReporte','generatePDF')->name('createreport');
    Route::get('createBackup','backup')->name('createbp');
});


Route::controller(ProductoController::class)->group(function(){
    Route::get('/','index');
    Route::get('inventario','index')->name('index');
    Route::get('inventario/create','create')->name('producto.create');
    Route::post('inventario/store','store')->name('producto.store');
    Route::get('inventario/{producto}/edit','edit')->name('edit');
    Route::put('inventario/{producto}/update','update')->name('producto.update');
    Route::delete('inventario/{producto}/delete','destroy')->name('producto.delete');

});

Route::get('utilidades/calculadora', function () {
    return view('utilidades.calculadora');
})->name('calculadora');

Route::get('utilidades/conversor', function () {
    return view('utilidades.conversor');
})->name('conversor');