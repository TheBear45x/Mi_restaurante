<?php

namespace App\Http\Controllers; // <--- Mira bien esta línea

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class GoogleController extends Controller // <--- Línea 11
{
    // app/Http/Controllers/GoogleController.php

public function redirectToGoogle()
{
    // Esto obliga a Google a mostrar la lista de cuentas
    return Socialite::driver('google')
        ->with(['prompt' => 'select_account'])
        ->redirect();
}

public function handleGoogleCallback()
{
    try {
        $userGoogle = Socialite::driver('google')->user();
        $user = User::where('email', $userGoogle->email)->first();

        if (!$user) {
            $user = new User();
            $user->name = $userGoogle->name;
            $user->email = $userGoogle->email;
            $user->google_id = $userGoogle->id;
            $user->avatar = $userGoogle->avatar;
            $user->password = bcrypt('google-auth-123');

            // --- LÓGICA DE ROLES POR CORREO ---
            // Aquí pones tu correo de "felipao" para que sea Admin
            if ($userGoogle->email == 'andradecrespof@gmail.com') {
                $user->rol = 'admin';
            } else {
                $user->rol = 'cliente';
            }   

            $user->save();
        }

        Auth::login($user);
        return redirect()->route('menu');

    } catch (Exception $e) {
        return redirect('/')->with('error', 'Error al entrar con Google');
    }
}
}