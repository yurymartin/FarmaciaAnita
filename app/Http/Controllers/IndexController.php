<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Compra;
use App\Empleado;
use App\Producto;
use App\Producto_has_Sintoma;
use App\Proveedor;
use App\User;
use App\Venta;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $ventas = Venta::borrado()->get()->count();
        $clientes = Cliente::borrado()->get()->count();
        $compras = Compra::borrado()->get()->count();
        $productos = Producto::borrado()->get()->count();
        $proveedores = Proveedor::borrado()->get()->count();
        $recetas = Producto_has_Sintoma::get()->count();
        $empleados = Empleado::borrado()->get()->count();
        $usuarios = User::borrado()->get()->count();
        return view('admin.index',compact('ventas','clientes','compras','productos','proveedores','recetas','empleados','usuarios'));
    }
}
