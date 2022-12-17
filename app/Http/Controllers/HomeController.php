<?php

namespace App\Http\Controllers;

use App\inventario;
use App\producto;
use App\empresa;
use App\cliente;
use App\proveedor;
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
     
        }else{
            $valor_inventario=0;

        }
        
        //    $clientes= cliente::all();
        //    $productos=producto::all();
        //    $proveedores=proveedor::all();

          
        //    $anio_factura=\DB::select('SELECT DISTINCT YEAR( facturav.fecha) AS year FROM facturav');
          
        // return view('home', compact('valor_inventario','clientes', 'productos', 'proveedores', 'resultado', 'anio_factura'));
        
    }

     public function busquedaA($anio){

        // Consulta para grafica de ventas
           $fechas = [1,2,3,4,5,6,7,8,9,10,11,12];
           for ($i=1; $i <= count($fechas); $i++) { 
           $resul = \DB::select('SELECT DISTINCT n_control FROM facturav WHERE MONTH(facturav.fecha)='.$i.' AND YEAR(facturav.fecha)='.$anio);
            $resultado[$i] = count($resul);
           }
           //fin

           return $resultado;

     }
}
