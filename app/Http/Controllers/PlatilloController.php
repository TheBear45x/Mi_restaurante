<?php

namespace App\Http\Controllers;
use App\Models\Platillo;
use Illuminate\Http\Request;

class PlatilloController extends Controller
{
        function nuevo(){
        $platillos = Platillo::all();
        return view('registrar_platillo', compact('platillos'));
    }
        function guardar(Request $request){
        $platillo = new Platillo();
        $platillo->nombre = $request->nombre;
        $platillo->descripcion = $request->descripcion;
        $platillo->precio = $request->precio;
        $platillo->foto = $request->foto;
        $ruta = null;
        if($request->hasFile('foto')):
        $ruta = $request->file('foto')->store('imagenes','public');
        endif;
        $platillo->foto = $ruta ?? 'sin foto';

        $platillo->save();

        return redirect()->route('platillo.mostrar')->with('success', 'Platillo guardado correctamente');
    }
        function mostrar(){
        // $platillos = Platillo::select('productos.*','categorias.nombre as nombre_categoria')->join('categorias','categorias.id','=','productos.categoria_id')->get();
        $platillos = Platillo::all();
        // $user = Auth::user();
        return view('lista_platillos', compact('platillos'));

    }
        function editar($id){
//recuerden que la funncion editar especificamos que iba a recibir el id, 
    //primero es buscar el registro con ese id;
    $platillos  = Platillo::findOrFail($id);
    //cuando ya tenenmos el producto, lo enviamos al formulario donde se va editar, pero que ya  tenga los datos precargado del producto
    return view("editar_platillo", compact('platillos'));

    //
    }
        function actualizar(Request $req){
        // $producto = new Producto();
        $platillo  = Platillo::findOrFail($req->id);
        $platillo->nombre = $req->nombre;
        $platillo->precio = $req->precio;
        $platillo->descripcion = $req->descripcion;
        $platillo->foto = $req->foto;
        $platillo->save();

        return redirect()->route('platillo.mostrar');
}
    function eliminar($id){
        $platillo = Platillo::findOrFail($id);
        $platillo->delete();
        //si nomas le dejas esto sin moverle al modelo producto, se va eliminar de la base de datos y no va a poner fecha y lo deja en la base de datos
        return redirect()->route('platillo.mostrar');
    }
}
