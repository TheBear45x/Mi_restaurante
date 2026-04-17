<?php

namespace App\Http\Controllers;

use App\Models\Provedor;
use Illuminate\Http\Request;

class ProvedorController extends Controller
{
    public function index()
    {
        $provedores = Provedor::all();
        return view('listas_provedorea', compact('provedores'));
    }

    public function agregar(Request $req)
    {
        $provedor = new Provedor();
        $provedor->nombre = $req->nombre;
        $provedor->encargado = $req->encargado;
        $provedor->telefono = $req->telefono;
        $provedor->correo = $req->correo;
        $provedor->estatus = $req->estatus;
        $provedor->save();

        $provedores = Provedor::all();
        return view('listas_provedores', compact('provedores'))->with('success', 'Proveedor agregado correctamente.');
    }

    public function editar($id)
    {
        $provedor = Provedor::findOrFail($id);
        return view('editar_provedores', compact('provedor'));
    }

    public function actualizar(Request $request, $id)
    {
        $provedor = Provedor::findOrFail($id);
        $provedor->nombre = $request->nombre;
        $provedor->encargado = $request->encargado;
        $provedor->telefono = $request->telefono;
        $provedor->correo = $request->correo;
        $provedor->estatus = $request->estatus;
        $provedor->save();
        return redirect()->route('provedores.lista')->with('success', 'Proveedor actualizado correctamente.');
    }

    public function mostrar(){ // Agrega la 'r' que falta
    $provedores = Provedor::all();
    return view('listas_provedores', compact('provedores'));
}
}