<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Platillo;   // Importante
use App\Models\Comentario; // ESTA LÍNEA arregla el error de la imagen af9226
use App\Models\Sucursal; // Importante
use Illuminate\Support\Facades\Storage;

class PlatilloController extends Controller {
    
    // Lista para el Administrador
    public function mostrar() {
    $platillos = Platillo::all();
    return view('listas_platillos', compact('platillos'));
}

    public function agregar(Request $request) {
    $platillo = new Platillo();
    $platillo->nombre = $request->nombre;
    $platillo->descripcion = $request->descripcion;
    $platillo->precio = $request->precio;

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $nombreFoto = time() . '_' . $file->getClientOriginalName();
        // Esto lo guarda en public/img/platillos/
        $file->move(public_path('img/platillos'), $nombreFoto);
        $platillo->foto = $nombreFoto;
    }

    $platillo->save();
    return redirect()->route('platillos.lista')->with('success', 'Platillo creado correctamente');
}
    // Editar (Cargar vista)
    public function editar($id) {
        $platillo = Platillo::find($id);
        return view('editar_platillos', compact('platillo'));
    }

    // Actualizar datos
   public function actualizar(Request $request, $id) {
    // 1. Buscamos el platillo
    $platillo = Platillo::find($id);

    // 2. Actualizamos los textos
    $platillo->nombre = $request->nombre;
    // ... otros campos ...

    // 3. Lógica para la foto: SOLO si subieron un archivo
    if ($request->hasFile('foto')) {
        // Borrar la foto vieja si existe (para no llenar el disco)
        if ($platillo->foto && file_exists(public_path('img/platillos/' . $platillo->foto))) {
            unlink(public_path('img/platillos/' . $platillo->foto));
        }

        // Subir la nueva foto
        $file = $request->file('foto');
        $nombreFoto = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('img/platillos'), $nombreFoto);
        
        // Guardar el nuevo nombre
        $platillo->foto = $nombreFoto;
    } 
    // Si NO hay archivo en el request, no hacemos nada con $platillo->foto
    // y se mantiene el nombre de la foto vieja.

    // 4. Guardar cambios
    $platillo->save();

    return redirect()->route('platillos.lista')->with('success', 'Platillo actualizado');
}

    // Eliminar
    public function eliminar($id) {
        $platillo = Platillo::find($id);
        if($platillo->foto) { Storage::disk('public')->delete($platillo->foto); }
        $platillo->delete();
        return redirect()->route('platillos.lista')->with('success', 'Platillo eliminado');
    }

    public function index() {
    $platillos = \App\Models\Platillo::with('comentarios.user')->get();
    $sucursales = \App\Models\Sucursal::all(); // Esto arregla el error de la imagen af7ba4
    
    return view('menu', compact('platillos', 'sucursales'));
}

    public function guardarComentario(Request $request)
{
    $request->validate([
        'platillo_id' => 'required|exists:platillos,id',
        'contenido' => 'required|string',
    ]);

    Comentario::create([
    'platillo_id' => $request->platillo_id,
    'user_id'     => auth()->id(),
    'comentario'   => $request->contenido,
    'calificacion' => 5,
]);

    return redirect()->back()->with('success', '¡Comentario agregado!');
}   

    public function misComentarios() {
        $comentarios = Comentario::where('user_id', auth()->id())->with('platillo')->get();
        return view('ver_comentarios', compact('comentarios'));
    }
}
