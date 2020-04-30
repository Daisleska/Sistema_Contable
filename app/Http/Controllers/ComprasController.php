<?php

namespace App\Http\Controllers;

use App\compra;
use App\venta;
use App\facturac;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $mesactual = date('m');
    $meses = ['Enero', 'Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

         $compra =  \DB::select('SELECT  proveedores.nombre, proveedores.tipo_documento, proveedores.ruf, compra.proveedores_id, compra.facturac_id,  facturac.fecha, facturac.n_factura, facturac.total, facturac.n_control

        FROM compra, proveedores, facturac

        WHERE compra.proveedores_id = proveedores.id AND compra.facturac_id = facturac.id AND MONTH(facturac.fecha)='.$mesactual);

          $venta = venta::all();

          $i=1;
          $x= 1;
       return view('process.compra_venta.index', compact('compra', 'venta','i', 'mesactual', 'meses','x'));
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
        dd($request);
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

    public function buscador($mes,$anio,$dia)
    {
        if ($mes>0) {
         $res_mes=compra::join("facturac", "compra.facturac_id", "=", "facturac.id")->join("proveedores", "compra.proveedores_id", "=", "proveedores.id")->whereMonth('fecha', '=', $mes)->get();
          return $res_mes;

        }if ($dia>0) {
            $res_dia=compra::join("facturac", "compra.facturac_id", "=", "facturac.id")->join("proveedores", "compra.proveedores_id", "=", "proveedores.id")->whereDate('fecha', $dia)->get();
          return $res_dia;
        }if ($anio >2000) {
            $res_anio=compra::join("facturac", "compra.facturac_id", "=", "facturac.id")->join("proveedores", "compra.proveedores_id", "=", "proveedores.id")->whereYear('fecha', $anio)->get();
          return $res_anio;
        }
    }
}
