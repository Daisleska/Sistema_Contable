<?php

namespace App\Http\Controllers;

use App;
use App\facturac;
use App\proveedor;
use App\inventario;
use App\has_inventario;
use App\producto;
use App\compra;
use App\empresa;
use App\Bitacora;
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
      $facturac = \DB::select('SELECT DISTINCT proveedores.id, proveedores.nombre,  facturac.n_factura, facturac.total, facturac.fecha, facturac.divisas

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
        $products=producto::all();
        $iva= iva::all();
         
        return view ('process.facturac.create', compact('iva', 'products'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //dd($request);
       $buscar=facturac::where ('n_factura', $request->n_factura)->get();
        if (count($buscar)>0) {
            # no permitir registrar
            flash('numero de factura ya existe', 'danger');
            return redirect()->back();
        } else {
            # permitir regitrar
        //registro en la tabla facturac----------------------------
            $i=0;
            foreach ($request->product_id as $val) {  
            $producto=\DB::select('SELECT precio FROM productos WHERE id='.$val);

            foreach ($producto as $valor) {      
      
            $precio[$i]=$valor->precio;

            }
            $i++;
            }


            $coun=count($request->product_id);
            
            for ($i=0; $i <$coun ; $i++) { 

            $fact_comp= new facturac();

            $importe=$precio[$i]*$request->amount[$i];

            $fact_comp->n_factura=$request->n_factura;
            $fact_comp->fecha=$request->fecha;
            $fact_comp->proveedores_id=$request->proveedores_id;
            $fact_comp->productos_id=$request->product_id[$i];
            $fact_comp->domicilio=$request->domicilio;
            $fact_comp->f_pago=$request->f_pago;
            $fact_comp->cantidad=$request->amount[$i];
            $fact_comp->importe=$importe;//
            $fact_comp->sub_total=$request->sub_total;
            $fact_comp->iva=$request->iva;
            $fact_comp->p_iva=$request->p_iva;
            $fact_comp->total=$request->total;
            $fact_comp->n_control=$request->n_control;
            $fact_comp->divisas=$request->divisas;
            
            $fact_comp->save();


           
//-------ACTUALIZAR EXISTENCIA-Inventario------------

        $inventario = \DB::select('SELECT productos.id, productos.codigo, inventario.existencia AS exis_inv FROM inventario, productos
       WHERE inventario.productos_id='.$request->product_id[$i].' LIMIT 0,1');

       foreach ($inventario as $val) {
       $nuevo=$val->exis_inv + $request->amount[$i];
       }

        $inventario = \DB::update('UPDATE inventario SET existencia ='.$nuevo.' WHERE inventario.productos_id='.$request->product_id[$i]);

         // Registrar en tabla Has_inventario 

        $nuevo_total= \DB::select('SELECT inventario.existencia AS inv_asis, productos.id, productos.precio, inventario.existencia FROM productos, inventario WHERE inventario.productos_id = productos.id');
         foreach ($nuevo_total as $key) {  
           $inventario_t[]= $key->precio* $key->existencia;
         }

         $total_inventario = array_sum($inventario_t);
         $has_inventario= new has_inventario();
            $has_inventario->anio=$request->fecha;
            $has_inventario->valor=$total_inventario;
            $has_inventario->save();


         //----------Actualizar existencia en productos----------------
        $pro_update = \DB::select('SELECT productos.id, productos.codigo, productos.existencia FROM  productos
            WHERE productos.id='.$request->product_id[$i].' LIMIT 0,1');

            foreach ($pro_update as $val) {
            $nuevo= $val->existencia + $request->amount[$i] ;
            }

        $pro_update = \DB::update('UPDATE productos SET existencia ='.$nuevo.' WHERE productos.id='.$request->product_id[$i]);

         }//fin del ciclo

         //-----------Registrar accion en libro de compra--------------------
            $compra = new compra();

            $compra->facturac_id=$fact_comp->id;
            $compra->proveedores_id=$request->proveedores_id;
            $compra->save();
//-------------------------------------------------------------------

         
       //registrar accion en bitacora-----------------------------------
            if ($fact_comp->save()) {
            flash('¡Registro Exitoso!', 'success');
 

            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha registrado una factura de compra';
            $bitacoras->save();
            return redirect()->to('facturac');
            } else {

            flash('¡No se pudo registrar!', 'danger');
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
  /*      $hoy=date('Y-m-d');
     $desde=\DB::select('SELECT  * FROM facturac  WHERE facturac.fecha='.$hoy.' AND facturac.id='.$id );
*/
        $this->actualizar_inventario_delete($id);
        $this->actualizar_compra_delete($id);

        $facturac = facturac::find($id);
        $facturac->delete();

            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha Eliminado una factura de compras';
            $bitacoras->save();

        flash('Registro eliminado satisfactoriamente');

        return back();
    }

      public function pdf($n_factura)

    {
        $facturac = \DB::select('SELECT DISTINCT proveedores.id, proveedores.nombre, proveedores.direccion, proveedores.correo, proveedores.tipo_documento, proveedores.ruf, facturac.sub_total, facturac.iva, facturac.p_iva, facturac.n_factura, facturac.n_control, facturac.domicilio, facturac.total, facturac.fecha, facturac.sub_total, facturac.f_pago, facturac.divisas FROM facturac, proveedores WHERE facturac.proveedores_id = proveedores.id AND facturac.n_factura='.$n_factura);

        $producto = \DB::select('SELECT  productos.id, productos.nombre, productos.precio, productos.descripcion, facturac.total, facturac.cantidad, facturac.importe, facturac.divisas FROM facturac, productos WHERE facturac.productos_id=productos.id AND facturac.n_factura='.$n_factura );

        $empresa = empresa::all();



        $dompdf = PDF::loadView('pdf.facturac', compact('facturac', 'producto','empresa'));

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

    public function actualizar_compra_delete($id)
    {
         $compra_eliminar=compra::find($id);
         if ($compra_eliminar != null) {
           $compra_eliminar->delete();
         }
    }

    public function actualizar_inventario_delete($id)
    {

        //consulta para obtener cantidad y id del producto----------
        $sql=\DB::select('SELECT id, cantidad, productos_id FROM facturac
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
       $regresar=$existencia-$producto_stock;
       

        $cambiar= \DB::update('UPDATE inventario SET existencia ='.$regresar.' WHERE inventario.productos_id='.$id_producto);

    }



}
