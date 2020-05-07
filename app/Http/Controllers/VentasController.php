<?php

namespace App\Http\Controllers;

use App\venta;
use App\facturav;
use App\iva;
use App\cliente;

use Illuminate\Http\Request;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
      //$venta = \DB::select('SELECT facturav.id AS n_operacion,facturav.fecha, facturav.n_factura, facturav.n_control, clientes.id, clientes.nombre, clientes.tipo_documento, clientes.rut, facturav.total, facturav.sub_total, facturav.iva, iva.porcentaje, facturav.divisa FROM facturav, clientes, iva WHERE facturav.clientes_id= clientes.id');

    $mesactual = date('m');
   

        $venta =  \DB::select('SELECT  clientes.nombre, clientes.tipo_documento, clientes.ruf, venta.clientes_id, venta.facturav_id, facturav.fecha, facturav.n_factura, facturav.total, facturav.n_control,facturav.sub_total, facturav.iva, iva.porcentaje, facturav.divisa

        FROM venta, clientes, facturav, iva

        WHERE venta.clientes_id = clientes.id AND venta.facturav_id = facturav.id AND MONTH(facturav.fecha)='.$mesactual);

        dd($venta);

         //para sumar los total de facturav
        foreach ($venta as $key) {  
           $total_total[]= $key->total;
           $total_subtotal[]= $key->sub_total;
           $total_IVA[]= $key->iva;
         }
         // $ventas = venta::all();
        //fin

       return view('process.compra_venta.index', compact('venta', 'mesactual', 'total_total','total_subtotal','total_IVA'));

    
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
}
