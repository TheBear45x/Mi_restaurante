<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Platillo; // Asegúrate de importar tu modelo

class VentaController extends Controller
{
    // Esta es la función que te falta según el error
    public function crear($id)
    {
        // Buscamos el platillo por su ID
        $platillo = Platillo::findOrFail($id);

        // Retornamos la vista (asegúrate de que el archivo exista)
        return view('ventas.crear', compact('platillo'));
    }

    public function store(Request $request)
    {
        // Aquí irá la lógica para guardar la venta en la DB
        // ...
        return redirect()->route('platillos.vista')->with('success', 'Venta realizada');
    }
}