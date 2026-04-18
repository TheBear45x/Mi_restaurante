<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservacion;
use App\Models\Sucursal;
use App\Models\User;

class ReservacionController extends Controller
{
    // ESTA FUNCIÓN ES LA QUE FALTA: Es la que manda las sucursales a la vista

public function guardar(Request $req) {
    $req->validate([
        'sucursal_id' => 'required',
        'fecha_hora' => 'required',
        'numero_personas' => 'required|integer'
    ]);

    $reservacion = new \App\Models\Reservacion();
    // Guardamos con tu ID de usuario logueado para que aparezca en tu historial
    $reservacion->user_id = auth()->id(); 
    $reservacion->sucursal_id = $req->sucursal_id;
    $reservacion->fecha_hora = $req->fecha_hora;
    $reservacion->numero_personas = $req->numero_personas;
    $reservacion->estatus = "pendiente";
    $reservacion->save();

    return redirect()->route('reservaciones.ver')->with('success', '¡Reserva lista!');
}

    public function mostrar(){
        $reservaciones = Reservacion::with(['user', 'sucursal'])->get();
        return view('reservaciones', compact('reservaciones'));
    }

    public function misReservaciones() {
    // Solo trae las que pertenecen al usuario que tiene la sesión abierta
    $reservaciones = Reservacion::where('user_id', auth()->id())
                                ->with('sucursal')
                                ->get();

    return view('ver_reservacion', compact('reservaciones'));
}

   // Para borrar una reservación
public function eliminar($id) {
    $reserva = Reservacion::where('id', $id)->where('user_id', auth()->id())->first();
    if($reserva) {
        $reserva->delete();
        return redirect()->back()->with('success', 'Reservación eliminada.');
    }
    return redirect()->back()->with('error', 'No se pudo eliminar.');
}

// Para mostrar el formulario de editar (si lo necesitas)
// Para Nueva Reservación
public function crear() {
    $sucursales = \App\Models\Sucursal::all(); // Quita error image_a3a99b.png
    $usuarios = \App\Models\User::all();     // Quita error image_a35342.png
    return view('realizar_reservacion', compact('sucursales', 'usuarios'));
}

// Para Editar Reservación
public function editar($id) {
    $reservacion = \App\Models\Reservacion::findOrFail($id); // Quita error image_ae9604.png
    $sucursales = \App\Models\Sucursal::all();
    $usuarios = \App\Models\User::all();
    return view('editar_reservacion', compact('reservacion', 'sucursales', 'usuarios'));
}


    public function actualizar(Request $req, $id) {
        $req->validate([
            'user_id' => 'required',
            'sucursal_id' => 'required',
            'fecha_hora' => 'required',
            'numero_personas' => 'required|integer',
            'estatus' => 'required' 
        ]);

        $reservacion = Reservacion::findOrFail($id);
        $reservacion->user_id = $req->user_id;
        $reservacion->sucursal_id = $req->sucursal_id;
        $reservacion->fecha_hora = $req->fecha_hora;
        $reservacion->numero_personas = $req->numero_personas;
        $reservacion->estatus = $req->estatus; 
        $reservacion->save();

        return redirect()->route('reservaciones.ver')->with('success', 'Reservación actualizada con éxito.');
    } 
    
    
    
}