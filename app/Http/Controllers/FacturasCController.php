<?php

namespace App\Http\Controllers;

use App;
use App\facturac;
use App\proveedor;
use App\inventario;
use App\producto;
use App\compra;
use App\empresa;
use Bitacora;
use App\Alert;
use App\iva;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

date_default_timezone_set('UTC');
ini_set('max_execution_time', 3000);
set_time_limit(3000);

class FacturasCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    
    {
        $mesactual = date('m');
      $facturac = \DB::select('SELECT  proveedores.id, proveedores.nombre,  facturac.n_factura, facturac.total, facturac.fecha, facturac.divisas, facturac.iva, facturac.id AS id_factura

        FROM facturac, proveedores

        WHERE facturac.proveedores_id = proveedores.id AND MONTH(facturac.fecha)='.$mesactual);



       return view('process.facturac.index', compact('facturac', 'mesactual'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
/*
         $facturac = \DB::select('SELECT iva

        FROM facturac  LIMIT 0,1');*/

        $iva= iva::all();
         
        return view ('process.facturac.create', compact('iva'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* dd($request);*/
       $buscar=facturac::where ('n_factura', $request->n_factura)->get();
        if (count($buscar)>0) {
            # no permitir registrar
            flash('numero de factura ya existe', 'danger');
            return redirect()->back();
        } else {
            # permitir regitrar
        //registro en la tabla facturac----------------------------
        $fact_comp= new facturac();

            $fact_comp->n_factura=$request->n_factura;
            $fact_comp->fecha=$request->fecha;
            $fact_comp->domicilio=$request->domicilio;
            $fact_comp->f_pago=$request->f_pago;
            $fact_comp->cantidad=$request->cantidad_articulos;
            $fact_comp->importe=$request->importe;
            $fact_comp->sub_total=$request->sub_total;
            $fact_comp->total=$request->total;
            $fact_comp->n_control=$request->n_control;
            $fact_comp->proveedores_id=$request->proveedores_id;
            $fact_comp->productos_id=$request->productos_id;
            $fact_comp->divisas=$request->divisas;
             $fact_comp->iva=$request->iva;
             $fact_comp->p_iva=$request->p_iva;
            $fact_comp->save();

//-----------Registrar accion en libro de compra--------------------
        $compra = new compra();

            $compra->facturac_id=$fact_comp->id;
            $compra->proveedores_id=$request->proveedores_id;
            $compra->save();
//-------------------------------------------------------------------

             if ($fact_comp->save()) {
            flash('Registro Exitoso!', 'success');

//-------ACTUALIZAR EXISTENCIA-Inventario------------

            $inventario = \DB::select('SELECT productos.id, productos.codigo, inventario.existencia AS exis_inv

        FROM inventario, productos

        WHERE inventario.productos_id='.$request->productos_id.' LIMIT 0,1');

foreach ($inventario as $val) {
       $nuevo=$request->cantidad_articulos + $val->exis_inv;
}

        $inventario = \DB::select('UPDATE inventario SET existencia ='.$nuevo.' WHERE inventario.productos_id='.$request->productos_id);


       //registrar accion en bitacora-----------------------------------
            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha registrado una factura de compra';
            $bitacoras->save();
            return redirect()->to('facturac');
            } else {

            flash('No se pudo registrar!', 'danger');
                return redirect()->to('facturac');
        }
    
    }


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
    public function update(Request $request)
    {
      
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

      public function pdf($id_factura)

    {
        $facturac = \DB::select('SELECT  proveedores.id, proveedores.nombre, proveedores.direccion, proveedores.correo, productos.id, productos.nombre AS producto, productos.precio, productos.descripcion, facturac.n_factura, facturac.total, facturac.fecha, facturac.cantidad, facturac.importe, facturac.sub_total, facturac.iva, facturac.divisas, facturac.n_control

        FROM facturac, proveedores, productos

        WHERE facturac.proveedores_id = proveedores.id AND facturac.productos_id=productos.id AND facturac.id='.$id_factura );

        $i = 1;

        $empresa = empresa::all();



        $dompdf = PDF::loadView('pdf.facturac', compact('facturac', 'i','empresa'));

        return $dompdf->stream('facturac.pdf');
    }
    

    
    public function ivaupdate (Request $request)
    {
  
/*  dd($request);*/
    $ivaupdate=iva::find($request->id);
    $ivaupdate->porcentaje= $request->porcentaje;
    $ivaupdate->save();
    
    return redirect()->back();
    }


}
