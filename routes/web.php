<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PlatilloController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/logout', function (Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate(); // Limpia la sesión
    $request->session()->regenerateToken(); // Cambia el token de seguridad
    return redirect('/');
})->name('logout');
Route::post('/login', [LoginController::class, 'login'])->name('login.local');
// Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.local');
// Ruta para el botón de Google
Route::get('/google-login', function(){
    return Socialite::driver('google')->redirect();
})->name('login.google');

// Callback adaptado de tu proyecto Tienda
Route::get("/google-callback", function(){
    $user = Socialite::driver('google')->user();

    // Buscamos al usuario igual que en "Tienda"
    $buscarUsuario = User::where('api_id', $user->id)
                         ->where('tipo','google')
                         ->first();

    if($buscarUsuario){
        Auth::login($buscarUsuario);
    } else {
        // Creamos el usuario con la estructura de tu modelo de Mi Restaurant
        $nuevoUsuario = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'tipo' => 'google', 
            'api_id' => $user->id,
            'avatar' => $user->avatar,
            'password' => null // Importante para evitar errores de BD
        ]);
        Auth::login($nuevoUsuario);
    }
    
    // En Tienda ibas a producto.mostrar, aquí vamos al menu
    return redirect()->route('menu');
});

// Ruta de Logout (Para poder cambiar entre Admin y Google)
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/crear_cuenta', function () {
    return view('crear_cuenta');
});

// Route::get('/menu', [ProductoController::class, 'index'])->name('menu');
Route::get('/menu', function() {
    return "¡Login exitoso! El usuario es: " . Auth::user()->name;
})->name('menu');



// Rutas públicas o para usuarios normales
Route::middleware(['auth', 'es_admin'])->group(function () {
// Route::get('/menu', [ProductoController::class, 'index'])->name('menu');
Route::get('/platillo/nuevo', [PlatilloController::class, 'nuevo'])->name('platillo.nuevo');
Route::post('/platillo/guardar', [PlatilloController::class, 'guardar'])->name('platillo.guardar');
Route::get('/platillo/mostrar', [PlatilloController::class, 'mostrar'])->name('platillo.mostrar');
Route::get('/platillo/editar/{id}', [PlatilloController::class, 'editar'])->name('platillo.editar');
Route::post('/platillo/actualizar', [PlatilloController::class, 'actualizar'])->name('platillo.actualizar');
Route::get('/platillo/eliminar/{id}', [PlatilloController::class, 'eliminar'])->name('platillo.eliminar');
});