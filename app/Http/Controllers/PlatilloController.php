<?php
<<<<<<< HEAD

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
=======
namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Platillo;   // Importante
use App\Models\Comentario; // ESTA LÍNEA arregla el error de la imagen af9226
use App\Models\Sucursal;   // Importante

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
    'cliente_id'  => auth()->id(), // Agregamos esta línea
    'comentario'  => $request->contenido,
]);

    return redirect()->back()->with('success', '¡Comentario agregado!');
}   

    public function misComentarios() {
        $comentarios = Comentario::where('user_id', auth()->id())->with('platillo')->get();
        return view('ver_comentarios', compact('comentarios'));
    }
}
>>>>>>> c11c1cb8f6eb3b7faba8267b95161886eb919961
