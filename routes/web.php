<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TechStoreController;

// Rutas principales de la tienda
Route::get('/', [TechStoreController::class, 'inicio'])->name('inicio');
Route::get('/nosotros', [TechStoreController::class, 'nosotros'])->name('nosotros');
Route::get('/contacto', [TechStoreController::class, 'contacto'])->name('contacto');
Route::get('/productos', [TechStoreController::class, 'productos'])->name('productos');

// Ruta para procesar el formulario de contacto (cuando lo actives más adelante)
Route::post('/contacto/enviar', [TechStoreController::class, 'enviarContacto'])->name('contacto.enviar');