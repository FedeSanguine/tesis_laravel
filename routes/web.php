<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
    ->name('home');

Route::get('quienes-somos', [\App\Http\Controllers\HomeController::class, 'quienesSomos'])
    ->name('quienesSomos');

// Autenticacion
Route::get('iniciar-sesion', [\App\Http\Controllers\AutenticacionController::class, 'formularioLogin'])
    ->name('autenticacion.formularioLogin');
Route::post('iniciar-sesion', [\App\Http\Controllers\AutenticacionController::class, 'procesoLogin'])
    ->name('autenticacion.procesoLogin');
Route::post('cerrar-sesion', [\App\Http\Controllers\AutenticacionController::class, 'procesoLogout'])
    ->name('autenticacion.procesoLogout');
Route::get('registro', [\App\Http\Controllers\AutenticacionController::class, 'formularioRegistro'])
    ->name('autenticacion.registro');
Route::post('registro', [\App\Http\Controllers\AutenticacionController::class, 'procesoRegistro'])
    ->name('autenticacion.procesoRegistro');

Route::get('articulos/listado', [\App\Http\Controllers\ArticulosController::class, 'index'])
    ->name('articulos.index');

Route::get('noticias/listado', [\App\Http\Controllers\NoticiasController::class, 'index'])
    ->name('noticias.index');

Route::get('admin-articulos/listado', [\App\Http\Controllers\ArticulosController::class, 'indexArticulos'])
    ->name('admin.admin-articulos')
    ->middleware('auth.admin');

Route::get('compras/listado', [\App\Http\Controllers\UserController::class, 'indexCompras'])
    ->name('compras.compras')
    ->middleware('auth.admin');

Route::get('admin-noticias/listado', [\App\Http\Controllers\NoticiasController::class, 'indexNoticias'])
    ->name('admin.admin-noticias')
    ->middleware('auth.admin');

Route::get('/perfil', [\App\Http\Controllers\AutenticacionController::class, 'mostrarPerfil'])
->name('autenticacion.mostrarPerfil');
Route::post('/actualizar-contrasena', [\App\Http\Controllers\AutenticacionController::class, 'actualizarContrasena'])
->name('autenticacion.actualizarContrasena');

// Nueva noticia
Route::get('noticias/nueva', [\App\Http\Controllers\NoticiasController::class, 'nuevoFormulario'])
    ->name('noticias.nuevoFormulario')
    ->middleware('auth.admin');
Route::post('noticias/nueva', [\App\Http\Controllers\NoticiasController::class, 'nuevoProceso'])
    ->name('noticias.nuevoProceso')
    ->middleware('auth.admin');

// Editar noticia
Route::get('noticias/{id}/editar', [\App\Http\Controllers\NoticiasController::class, 'editaroK'])
    ->name('noticias.editarOk')
    ->middleware('auth.admin');
Route::post('noticias/{id}/editar', [\App\Http\Controllers\NoticiasController::class, 'procesoEditar'])
    ->name('noticias.procesoEditar')
    ->middleware('auth.admin');

// Eliminar noticia
Route::get('noticias/{id}/eliminar', [\App\Http\Controllers\NoticiasController::class, 'eliminarOk'])
    ->name('noticias.eliminarOk')
    ->middleware('auth.admin');
Route::post('noticias/{id}/eliminar', [\App\Http\Controllers\NoticiasController::class, 'procesoEliminar'])
    ->name('noticias.procesoEliminar')
    ->middleware('auth.admin');

// Nuevo articulo
Route::get('articulos/nuevo', [\App\Http\Controllers\ArticulosController::class, 'nuevoFormulario'])
    ->name('articulos.nuevoFormulario')
    ->middleware('auth.admin');
Route::post('articulos/nuevo', [\App\Http\Controllers\ArticulosController::class, 'nuevoProceso'])
    ->name('articulos.nuevoProceso')
    ->middleware('auth.admin');

// Editar articulo
Route::get('articulos/{id}/editar', [\App\Http\Controllers\ArticulosController::class, 'editaroK'])
    ->name('articulos.editarOk')
    ->middleware('auth.admin');
Route::post('articulos/{id}/editar', [\App\Http\Controllers\ArticulosController::class, 'procesoEditar'])
    ->name('articulos.procesoEditar')
    ->middleware('auth.admin');

// Eliminar articulo
Route::get('articulos/{id}/eliminar', [\App\Http\Controllers\ArticulosController::class, 'eliminarOk'])
    ->name('articulos.eliminarOk')
    ->middleware('auth.admin');
Route::post('articulos/{id}/eliminar', [\App\Http\Controllers\ArticulosController::class, 'procesoEliminar'])
    ->name('articulos.procesoEliminar')
    ->middleware('auth.admin');
Route::get('articulos/{id}', [\App\Http\Controllers\ArticulosController::class, 'vista'])
    ->name('articulos.vista');
Route::get('noticias/{id}', [\App\Http\Controllers\NoticiasController::class, 'vista'])
    ->name('noticias.vista');
Route::get('admin', [\App\Http\Controllers\AdminController::class, 'dashboard'])
    ->name('admin.dashboard')
    ->middleware('auth.admin');



//carrito
Route::post('carrito/agregar', [\App\Http\Controllers\CartController::class, 'addItem'])
    ->name('cart.addItem');  
Route::get('carrito', [\App\Http\Controllers\CartController::class, 'index'])
    ->name('cart.index');
Route::delete('carrito/eliminar/{id}', [\App\Http\Controllers\CartController::class, 'removeItem'])
    ->name('cart.removeItem');
Route::post('carrito/actualizar', [\App\Http\Controllers\CartController::class, 'updateCart'])
    ->name('cart.update');
Route::post('carrito/vaciar', [\App\Http\Controllers\CartController::class, 'clearCart'])
    ->name('cart.clear');


// Mercadopago
Route::get('mp/vista', [\App\Http\Controllers\MercadoPagoController::class, 'show'])
    ->name('mp.vista');
Route::get('mp/success', [\App\Http\Controllers\MercadoPagoController::class, 'processSuccess'])
    ->name('mp.success');
Route::get('mp/pending', [\App\Http\Controllers\MercadoPagoController::class, 'processPending'])
    ->name('mp.pending');
Route::get('mp/failure', [\App\Http\Controllers\MercadoPagoController::class, 'processFailure'])
    ->name('mp.failure');


