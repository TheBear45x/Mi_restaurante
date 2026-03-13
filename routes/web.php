<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('login');
});

Route::get('/crear_cuenta', function () {
    return view('crear_cuenta');
});

Route::get('/menu', [ProductoController::class, 'index'])->name('menu');


Route::get('/google-login', function(){
    return Socialite::driver('google')->redirect();
})->name('login.google');


Route::get("/google-callback", function(){

    $user = Socialite::driver('google')->user();

    $buscarUsuario = User::where('api_id', $user->id)
        ->where('tipo','google')
        ->first();

    if($buscarUsuario){

        Auth::login($buscarUsuario);

    }else{

        $nuevoUsuario = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'tipo' => 'google',
            'api_id' => $user->id,
            'avatar' => $user->avatar
        ]);

        Auth::login($nuevoUsuario);
    }

    return redirect()->route('menu');

});