<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function agregar(Request $request)
    {
        $comentario = new Comentario();
        $comentario->nombre = $request->input('nombre');
        $comentario->email = $request->input('email');
        $comentario->mensaje = $request->input('mensaje');
        $comentario->save();

        return redirect()->back()->with('success', 'Comentario agregado exitosamente.');
    }

    public function mostrar()
    {
        $comentarios = Comentario::all();
        return view('comentarios', compact('comentarios'));
    }

    public function misComentarios() {
        $usuarioId = auth()->id();
        
        $reservaciones = Reservacion::with('comentarios')->where('cliente_id', $usuarioId)->get();

        return view('mis_comentarios', compact('comentarios'));
    }

    public function eliminar($id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();

        return redirect()->back()->with('success', 'Comentario eliminado exitosamente.');
    }

    public function editar($id)
    {
        $comentario = Comentario::findOrFail($id);
        return view('editar_comentario', compact('comentario'));
    }

    public function actualizar(Request $request, $id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->nombre = $request->input('nombre');
        $comentario->email = $request->input('email');
        $comentario->mensaje = $request->input('mensaje');
        $comentario->save();

        return redirect()->back()->with('success', 'Comentario actualizado exitosamente.');
    }
}