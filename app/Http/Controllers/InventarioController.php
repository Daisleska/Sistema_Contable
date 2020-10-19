<?php

namespace App\Http\Controllers;

use App;
use App\inventario;
use App\producto;
use App\Bitacora;
use App\empresa;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     $anio_actual = date('Y');

    $inventario = \DB::select('SELECT inventario.existencia AS inv_asis, productos.id, productos.nombre,  productos.precio, inventario.existencia, productos.unidad,  productos.stock_min, productos.stock_max, productos.descripcion, productos.codigo

        FROM productos, inventario

        WHERE inventario.productos_id = productos.id AND YEAR(inventario.updated_at)='.$anio_actual);


  foreach ($inventario as $key) {
           
           $costo_t[]= $key->precio* $key->existencia;
         }
  
       return view('process.inventario.index', compact('inventario','costo_t'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

       public function pdf()

    {
        $inventario = \DB::select('SELECT   inventario.existencia AS inv_asis, productos.id, productos.nombre AS descripcion,  productos.precio, inventario.existencia, productos.unidad,  productos.stock_min, productos.stock_max, productos.codigo

        FROM productos, inventario

        WHERE inventario.productos_id = productos.id');

         $i = 1;

         $empresa= empresa::all();
         $date = date('d-m-Y');
        $dompdf = PDF::loadView('pdf.inventario', compact('inventario', 'i','date', 'empresa'));
       

        return $dompdf->stream('inventario.pdf');
    }

      public function buscar_inventario($product)
    {

          $resultado= inventario::join("productos", "inventario.productos_id", "=", "productos.id")->where("productos.codigo", "=", $product)->get();
        
        return $resultado;

    }

}
