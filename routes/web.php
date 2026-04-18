<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlatilloController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\ProvedorController;
use App\Http\Controllers\ReservacionController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PedidoController; 

// ----------------------------------------------------------------------
// 1. INICIO Y GOOGLE AUTH
// ----------------------------------------------------------------------
Route::get('/', function () { return view('login'); })->name('login');
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('google-callback', [GoogleController::class, 'handleGoogleCallback']);

// Agrégala dentro del middleware auth
Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// ----------------------------------------------------------------------
// 2. RUTAS PROTEGIDAS (PARA CUALQUIER USUARIO LOGUEADO)
// ----------------------------------------------------------------------
Route::middleware(['auth'])->group(function () {

    Route::get('/menu', [PlatilloController::class, 'index'])->name('menu');

    // --- ACCIONES DEL CLIENTE (USUARIO NORMAL) ---
    
    // Pedidos Web (Para recoger en tienda)
    Route::get('/hacer_pedido', function () { return view('hacer_pedido'); })->name('pedidos.crear');
    Route::post('/enviar_pedido', [PedidoController::class, 'store'])->name('pedidos.store');
    Route::get('/mis_pedidos', [PedidoController::class, 'misPedidos'])->name('pedidos.usuario');

    // Comentarios
    Route::get('/escribir_comentario', function () { return view('crear_comentario'); })->name('comentarios.crear');
    Route::post('/comentarios/guardar', [PlatilloController::class, 'guardarComentario'])->name('comentarios.guardar');
    Route::get('/ver_comentarios', [PlatilloController::class, 'verComentarios'])->name('comentarios.lista');
    Route::get('/mis_comentarios', [PlatilloController::class, 'misComentarios'])->name('comentarios.mios');

    // Reservaciones
    // Cambia la función anónima por la llamada al controlador
// Rutas de creación y visualización
Route::get('/reservaciones', [ReservacionController::class, 'crear'])->name('reservaciones.crear');
Route::post('/reservaciones/guardar', [ReservacionController::class, 'guardar'])->name('reservaciones.guardar');
Route::get('/ver_reservacion', [ReservacionController::class, 'misReservaciones'])->name('reservaciones.ver');

// Rutas de gestión (Editar y Eliminar)
Route::get('/reservaciones/editar/{id}', [ReservacionController::class, 'editar'])->name('reservaciones.editar');
Route::put('/reservaciones/actualizar/{id}', [ReservacionController::class, 'actualizar'])->name('reservaciones.actualizar');
Route::delete('/reservaciones/eliminar/{id}', [ReservacionController::class, 'eliminar'])->name('reservaciones.eliminar');

    // Perfil y Ventas rápidas
    Route::get('/editar_perfil', function () { return view('editar_perfil'); })->name('perfil.editar');
    Route::put('/actualizar_perfil', [UserController::class, 'actualizarPerfil'])->name('perfil.actualizar');
    Route::get('/ventas/crear/{id}', [VentaController::class, 'crear'])->name('ventas.crear');
    
    Route::get('/ventas', function () { return view('ventas'); })->name('ventas.vista');
    Route::post('/ventas', [VentaController::class, 'agregar'])->name('ventas.agregar');


    // ----------------------------------------------------------------------
    // 3. BLOQUE DE ADMINISTRADOR (SOLO ROL ADMIN)
    // ----------------------------------------------------------------------
    Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function () {
        
    Route::get('/admin/panel', [AdminController::class, 'index'])->name('admin.panel')->middleware('auth');

        // GESTIÓN DE PLATILLOS (CRUD COMPLETO)
        Route::get('/registrar_platillo', function () { return view('registrar_platillo'); })->name('platillos.registro');
        Route::post('/registrar_platillo', [PlatilloController::class, 'agregar'])->name('platillos.agregar');
        Route::get('/listas_platillos', [PlatilloController::class, 'mostrar'])->name('platillos.lista');
        Route::get('/editar_platillos/{id}', [PlatilloController::class, 'editar'])->name('platillos.editar');
        Route::put('/actualizar_platillo/{id}', [PlatilloController::class, 'actualizar'])->name('platillos.actualizar');
        Route::get('/eliminar_platillos/{id}', [PlatilloController::class, 'eliminar'])->name('platillos.eliminar');

        // GESTIÓN DE SUCURSALES (CRUD COMPLETO)
        Route::get('/sucursal', function (){ return view('sucursal'); })->name('sucursal.vista');
        Route::post('/sucursal', [SucursalController::class, 'agregar'])->name('sucursal.agregar');
        Route::get('/listas_sucursales', [SucursalController::class, 'mostrar'])->name('sucursales.lista');
        Route::get('/editar_sucursales/{id}', [SucursalController::class, 'editar'])->name('sucursales.editar');
        Route::put('/actualizar_sucursal/{id}', [SucursalController::class, 'actualizar'])->name('sucursales.actualizar');
Route::delete('/eliminar_sucursales/{id}', [SucursalController::class, 'eliminar'])->name('sucursales.eliminar');
        // GESTIÓN DE PROVEEDORES (CRUD COMPLETO)
        Route::get('/provedores', function () { return view('provedores'); })->name('provedores.vista');
        Route::post('/provedores', [ProvedorController::class, 'agregar'])->name('provedores.agregar');
Route::get('/listas_provedores', [ProvedorController::class, 'mostrar'])->name('provedores.lista');
Route::get('/editar_provedores/{id}', [ProvedorController::class, 'editar'])->name('provedores.editar');
Route::put('/actualizar_provedor/{id}', [ProvedorController::class, 'actualizar'])->name('provedores.actualizar');

        // GESTIÓN DE USUARIOS
        Route::get('/usuarios', function () { return view('usuarios'); })->name('usuarios.vista');
        Route::get('/listas_usuarios', [UserController::class, 'mostrar'])->name('usuarios.lista');
        Route::get('/editar_usuarios/{id}', [UserController::class, 'editar'])->name('usuarios.editar');
        Route::put('/actualizar_usuario/{id}', [UserController::class, 'actualizar'])->name('usuarios.actualizar');

        // REPORTES, PEDIDOS WEB Y COMENTARIOS
        Route::get('/detalles_ventas', [VentaController::class, 'mostrar'])->name('ventas.lista');
        Route::get('/admin/pedidos_web', [PedidoController::class, 'index'])->name('pedidos.admin');
        Route::get('/admin/comentarios', [PlatilloController::class, 'verComentariosAdmin'])->name('comentarios.lista');
        Route::get('/listas_reservaciones', [ReservacionController::class, 'mostrar'])->name('reservaciones.lista');
        Route::get('/eliminar_reservaciones/{id}', [ReservacionController::class, 'eliminar'])->name('reservaciones.eliminar');

        Route::get('/panel_admin', function () { return view('panel_admin'); })->name('panel_admin');
    });
});