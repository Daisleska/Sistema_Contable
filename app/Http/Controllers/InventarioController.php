<?php

namespace App\Http\Controllers;

use App;
use App\inventario;
use App\producto;
use Bitacora;
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
      $inventario = \DB::select('SELECT inventario.existencia AS inv_asis, productos.id, productos.nombre,  productos.precio, inventario.existencia, productos.unidad,  productos.stock_min, productos.stock_max, productos.descripcion, productos.codigo

        FROM productos, inventario

        WHERE inventario.productos_id = productos.id');
  
       return view('process.inventario.index', compact('inventario'));
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
        $inventario = \DB::select('SELECT   inventario.existencia AS inv_asis, productos.id, productos.nombre,  productos.precio, inventario.existencia, productos.unidad,  productos.stock_min, productos.stock_max, productos.descripcion, productos.codigo

        FROM productos, inventario

        WHERE inventario.productos_id = productos.id');

         $i = 1;

         $date = date('d-m-Y');
        $dompdf = PDF::loadView('pdf.inventario', compact('inventario', 'i','date'));
        $dompdf->setPaper('a4', 'landscape');

        return $dompdf->stream('inventario.pdf');
    }

}
