<?php

namespace App\Http\Controllers;

use App;
use App\facturac;
use App\proveedor;
use App\inventario;
use App\producto;
use App\compra;
use Bitacora;
use App\Alert;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FacturasCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    
    {
      $facturac = \DB::select('SELECT  proveedores.id, proveedores.nombre,  facturac.n_factura, facturac.total, facturac.fecha

        FROM facturac, proveedores

        WHERE facturac.proveedores_id = proveedores.id');


       return view('process.facturac.index', compact('facturac'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('process.facturac.create');
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
            $fact_comp->proveedores_id=$request->proveedores_id;
            $fact_comp->productos_id=$request->productos_id;
            $fact_comp->save();

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

       public function pdf()

    {
        $facturac = \DB::select('SELECT  proveedores.id, proveedores.nombre,  facturac.n_factura, facturac.total, facturac.fecha

        FROM facturac, proveedores

        WHERE facturac.proveedores_id = proveedores.id');

         $i = 1;

         $date = date('d-m-Y');
        $dompdf = PDF::loadView('pdf.facturac', compact('facturac', 'i','date'));

        return $dompdf->stream('facturac.pdf');
    }


}
