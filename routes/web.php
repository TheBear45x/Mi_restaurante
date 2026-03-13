<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
 use App\Http\Controllers\SucursalController;
use App\Http\Controllers\ProvedorController;
use App\Http\Controllers\ReservacionController;

Route::get('/', function () {
    return view('login');
});
Route::get('/crear_cuenta', function () {
    return view('crear_cuenta');
});
Route::get('/menu', function () {
    return view('menu');
});
Route::get('/menu', [ProductoController::class, 'index'])->name('menu');

Route::get('/google-login', function () {
    return Socialite::driver('google')->redirect();
})->name('login.google');

Route::get("/google-callback", function () {
    $user = Socialite::driver('google')->user();

    $buscarUsuario = User::where('api_id', $user->id)
        ->where('tipo', 'google')
        ->first();

    if ($buscarUsuario) {
        Auth::login($buscarUsuario);
    } else {
        $nuevoUsuario = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'tipo' => 'google',
            'api_id' => $user->id,
            'avatar' => $user->avatar
        ]);
        Auth::login($nuevoUsuario);
    }
})->name('login.google.callback');

Route::get('/sucursal', function (){
    return view('sucursal');
});
Route::post('/sucursal', [SucursalController::class, 'agregar'])->name('sucursal.agregar');
Route::get('/listas_sucursales', [SucursalController::class, 'mostrar'])->name('sucursales.lista');
Route::get('/listas_sucursales/{id}', [SucursalController::class, 'eliminar'])->name('sucursales.eliminar');
Route::get('/editar_sucursales/{id}', [SucursalController::class, 'editar'])->name('sucursales.editar');
Route::put('/actualizar_sucursal/{id}', [SucursalController::class, 'actualizar'])->name('sucursales.actualizar');

Route::get('/provedores', function (){
    return view('provedores');
});
Route::post('/provedores', [ProvedorController::class, 'agregar'])->name('provedores.agregar');
Route::get('/listas_provedores', [ProvedorController::class, 'mostar'])->name('provedores.lista');
Route::get('/editar_provedores/{id}', [ProvedorController::class, 'editar'])->name('provedores.editar');
Route::put('/actualizar_provedor/{id}', [ProvedorController::class, 'actualizar'])->name('provedores.actualizar');


Route::get('/reservaciones', function () {
    return view('realizar_reservacion');
});
Route::post('/reservaciones', [ReservacionController::class, 'guardar'])->name('reservaciones.guardar');
Route::get('/listas_reservaciones', [ReservacionController::class, 'mostrar'])->name('reservaciones.lista');
Route::get('/ver_reservacion', [ReservacionController::class, 'misReservaciones'])->name('reservaciones.ver');
Route::get('/editar_reservaciones/{id}', [ReservacionController::class, 'editar'])->name('reservaciones.editar');
Route::put('/actualizar_reservacion/{id}', [ReservacionController::class, 'actualizar'])->name('reservaciones.actualizar');
Route::get('/eliminar_reservaciones/{id}', [ReservacionController::class, 'eliminar'])->name('reservaciones.eliminar');