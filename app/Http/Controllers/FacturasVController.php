<?php

namespace App\Http\Controllers;

use App;
use App\facturav;
use App\clientes;
use App\inventario;
use App\producto;
use App\venta;
use App\empresa;
use App\iva;
use Bitacora;
use App\Alert;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FacturasVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



       $facturav = \DB::select('SELECT clientes.id, clientes.nombre, facturav.n_factura, facturav.total, facturav.fecha, facturav.id AS id_factura FROM facturav, clientes WHERE facturav.clientes_id= clientes.id');



       return view('process.facturav.index', compact('facturav'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {   
        $products=producto::all();
        $iva= iva::all();
        return view('process.facturav.create', compact('iva', 'products'));
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $buscar=facturav::where ('n_factura', $request->n_factura)->get();
        if (count($buscar)>0) {
            # no permitir registrar
            flash('numero de factura ya existe', 'danger');
            return redirect()->back();
        } else {
            # permitir regitrar
        //registro en la tabla facturav----------------------------
       $facturav= new facturav();

             $facturav->clientes_id=$request->clientes_id;
            $facturav->productos_id=$request->productos_id;
            $facturav->n_factura=$request->n_factura;
            $facturav->fecha=$request->fecha;
            $facturav->n_control=$request->n_control;
            $facturav->domicilio=$request->domicilio;
            $facturav->f_pago=$request->f_pago;
            $facturav->divisa=$request->divisa;
            $facturav->cantidad=$request->cantidad;
            $facturav->importe=$request->importe;
            $facturav->sub_total=$request->sub_total;
            $facturav->iva=$request->iva;
            $facturav->p_iva=$request->p_iva;
            $facturav->total=$request->total;
            $facturav->save();

            

            //-----------Registrar accion en libro de venta--------------------
        $venta = new venta();

            $venta->facturav_id=$facturav->id;
            $venta->clientes_id=$request->clientes_id;
            $venta->save();
        //-------------------------------------------------------------------

             if ($facturav->save()) {
            flash('Registro Exitoso!', 'success');



            //-------ACTUALIZAR EXISTENCIA-Inventario------------

            $inventario = \DB::select('SELECT productos.id, productos.codigo, inventario.existencia AS exis_inv

        FROM inventario, productos

        WHERE inventario.productos_id='.$request->productos_id.' LIMIT 0,1');

            foreach ($inventario as $val) {
            $nuevo= $val->exis_inv - $request->cantidad ;
            }

        $inventario = \DB::select('UPDATE inventario SET existencia ='.$nuevo.' WHERE inventario.productos_id='.$request->productos_id);


       //registrar accion en bitacora-----------------------------------
            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha registrado una factura de venta';
            $bitacoras->save();
            return redirect()->to('facturav');
            } else {

            flash('No se pudo registrar!', 'danger');
                return redirect()->to('facturav');
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
          /*      $hoy=date('Y-m-d');
     $desde=\DB::select('SELECT  * FROM facturac  WHERE facturac.fecha='.$hoy.' AND facturac.id='.$id );
*/
        $this->actualizar_inventario_delete($id);
        $this->actualizar_venta_delete($id);

        $facturav = facturav::find($id);
        $facturav->delete();

            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha Eliminado una factura de compras';
            $bitacoras->save();

        flash('Registro eliminado satisfactoriamente');

        return back();
    }

    
    public function pdf($id_factura)

    {
        $facturav = \DB::select('SELECT  clientes.id, clientes.nombre, clientes.direccion, clientes.email, productos.id, productos.nombre AS producto, productos.precio, productos.descripcion, facturav.n_factura, facturav.total, facturav.fecha, facturav.cantidad, facturav.importe, facturav.sub_total, facturav.iva, facturav.divisa, facturav.n_control, facturav.p_iva

        FROM facturav, clientes, productos

        WHERE facturav.clientes_id = clientes.id AND facturav.productos_id=productos.id AND facturav.id='.$id_factura );

        $i = 1;

        $empresa = empresa::all();



        $dompdf = PDF::loadView('pdf.facturav', compact('facturav', 'i','empresa'));

        return $dompdf->stream('facturav.pdf');
    }
    
    
    

    public function ivaupdate (Request $request)
    {
  
/*  dd($request);*/
    $ivaupdate=iva::find($request->id);
    $ivaupdate->porcentaje= $request->porcentaje;
    $ivaupdate->save();
    
    return redirect()->back();
    }

     public function actualizar_venta_delete($id)
    {
         $venta_eliminar=venta::find($id);
         if ($venta_eliminar != null) {
           $venta_eliminar->delete();
         }
    }

     public function actualizar_inventario_delete($id)
    {

        //consulta para obtener cantidad y id del producto----------
        $sql=\DB::select('SELECT id, cantidad, productos_id FROM facturav
        WHERE id='.$id );

        foreach ($sql as $val) {
       $producto_stock=$val->cantidad;
       $id_producto= $val->productos_id;
        }
        //-----------------------------------------------------------
        //consulta para obtener existencia de esos productos---------
        $x=\DB::select('SELECT existencia FROM inventario
        WHERE productos_id='.$id_producto );


       foreach ($x as $val2) {
       $existencia=$val2->existencia;
        }
        //------------------------------------------------------------
        //regresar stock y actualizar---------------------------------
       $regresar=$existencia+$producto_stock;
       

        $cambiar= \DB::select('UPDATE inventario SET existencia ='.$regresar.' WHERE inventario.productos_id='.$id_producto);

    }


}
