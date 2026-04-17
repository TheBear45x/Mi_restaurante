<?php

namespace App\Http\Controllers;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function agregar(REQUEST $req){
    $sucursal = new Sucursal();
    $sucursal->nombre = $req->nombre;
    $sucursal->numero_sucursal = $req->numero_sucursal;
    $sucursal->calle = $req->calle;
    $sucursal->telefono = $req->telefono;
    $sucursal->gerente = $req->gerente;
    $sucursal->codigo_postal = $req->codigo_postal;
    $sucursal->estatus = $req->estatus;
    $sucursal->save();

    $sucursales = Sucursal::all();

    return view('listas_sucursales', compact('sucursales'))->with('success', 'Sucursal agregada correctamente.');
    }

    public function mostrar(){
    $sucursales = Sucursal::all();
    
    return view('listas_sucursales', compact('sucursales'));
    }

public function eliminar($id) {
    $sucursal = Sucursal::find($id);
        if ($sucursal) {
            $sucursal->delete();
            return redirect()->route('sucursales.lista')->with('success', 'Sucursal eliminada correctamente.');
        } else {
            return redirect()->route('sucursales.lista')->with('error', 'Sucursal no encontrada.');
        }
    }   

    public function editar($id) {
        $sucursal = Sucursal::findOrFail($id);
        return view('editar_sucursales', compact('sucursal'));
    }

    public function actualizar(Request $req, $id) {
        $sucursal = Sucursal::findOrFail($id);
        $sucursal->nombre = $req->nombre;
        $sucursal->numero_sucursal = $req->numero_sucursal;
        $sucursal->calle = $req->calle;
        $sucursal->telefono = $req->telefono;
        $sucursal->gerente = $req->gerente;
        $sucursal->codigo_postal = $req->codigo_postal;
        $sucursal->estatus = $req->estatus;
        $sucursal->save();

        return redirect()->route('sucursales.lista')->with('success', 'Sucursal actualizada correctamente.');
    }
}