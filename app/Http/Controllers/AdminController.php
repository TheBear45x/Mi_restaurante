<?php

namespace App\Http\Controllers;
use App\Models\Platillo;
use App\Models\Provedor;
use App\Models\Sucursal;
use App\Models\User;
use App\Models\Venta; // O el nombre de tu modelo de pedidos

class AdminController extends Controller {
    public function index() {
        $platillos = Platillo::all();
        $provedores = Provedor::all();
        $sucursales = Sucursal::all();
        $usuarios = User::all();
        $ventas = Venta::with('user')->get(); // Para ver quién compró qué

        return view('admin.panel', compact('platillos', 'proveedores', 'sucursales', 'usuarios', 'ventas'));
    }
}