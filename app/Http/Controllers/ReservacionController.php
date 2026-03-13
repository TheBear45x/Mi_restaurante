<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservacion; 

class ReservacionController extends Controller
{
    public function guardar(Request $req) {
        $req->validate([
            'cliente_id' => 'required',
            'sucursal_id' => 'required',
            'fecha_hora' => 'required',
            'numero_personas' => 'required|integer'
        ]);

        $reservacion = New Reservacion();
        $reservacion->cliente_id = $req->cliente_id;
        $reservacion->sucursal_id = $req->sucursal_id;
        $reservacion->fecha_hora = $req->fecha_hora;
        $reservacion->numero_personas = $req->numero_personas;
        $reservacion->estatus = "pendiente";
        $reservacion->save();

        return redirect()->back()->with('success', 'Reservación guardada.');
    }

    public function mostrar(){
        $reservaciones = Reservacion::with(['cliente', 'sucursal'])->get();
        return view('reservaciones', compact('reservaciones'));
    }

    public function misReservaciones() {
        $usuarioId = auth()->id();
        
        $reservaciones = Reservacion::with('sucursal')->where('cliente_id', $usuarioId)->get();

        return view('mis_reservaciones', compact('reservaciones'));
    }

    public function eliminar($id){
        $reservacion = Reservacion::find($id);
        
        if($reservacion){
            $reservacion->delete();
            return redirect()->back()->with('success', 'Reservación eliminada.');
        }

        return redirect()->back()->with('error', 'No se encontró la reservación.');
    }

    public function editar($id){
        $reservacion = Reservacion::find($id);
        
        if($reservacion){
            return view('editar_reservacion', compact('reservacion'));
        }

        return redirect()->back()->with('error', 'No se encontró la reservación.');
    }

    public function actualizar(Request $req, $id) {
        $req->validate([
            'cliente_id' => 'required',
            'sucursal_id' => 'required',
            'fecha_hora' => 'required',
            'numero_personas' => 'required|integer',
            'estatus' => 'required' 
        ]);

        $reservacion = Reservacion::findOrFail($id);
        $reservacion->cliente_id = $req->cliente_id;
        $reservacion->sucursal_id = $req->sucursal_id;
        $reservacion->fecha_hora = $req->fecha_hora;
        $reservacion->numero_personas = $req->numero_personas;
        $reservacion->estatus = $req->estatus; 
        $reservacion->save();

        return redirect()->route('reservaciones.index')->with('success', 'Reservación actualizada con éxito.');
    }     
}