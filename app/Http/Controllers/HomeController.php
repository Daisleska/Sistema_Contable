<?php

namespace App\Http\Controllers;

use App\inventario;
use App\producto;
use App\empresa;
use App\cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //valor del inventario-------------------------------------
        $inventario = \DB::select('SELECT inventario.existencia AS inv_asis, productos.id, productos.nombre,  productos.precio, inventario.existencia, productos.unidad,  productos.stock_min, productos.stock_max, productos.descripcion, productos.codigo  FROM productos, inventario WHERE inventario.productos_id = productos.id');

        if ($inventario) {
            foreach ($inventario as $key) {   
           $valor_inventario[]= $key->precio* $key->existencia;
         }

          //FIN valor del inventario-------------------------------------
         $clientes= cliente::all();
        return view('home', compact('valor_inventario','clientes'));

        }else{
            $valor_inventario=0;

            $clientes= cliente::all();
        return view('home', compact('valor_inventario','clientes'));

        }
        
        
    }
}
