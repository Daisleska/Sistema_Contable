<?php

namespace App\Http\Controllers;

use App\cotizacion;
use App\producto;
use App\iva;
use App\cliente;
use App\User;
use App\descuento;
use Bitacora;
use App\empresa;
use App\Alert;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CotizacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
       $cotizacion = \DB::select('SELECT clientes.id, clientes.nombre, clientes.tipo_documento, clientes.ruf, clientes.email, cotizaciones.id AS id_cotizacion, cotizaciones.fecha, cotizaciones.n_cotizacion, cotizaciones.total FROM cotizaciones, clientes WHERE cotizaciones.clientes_id= clientes.id');


       return view('process.cotizaciones.index', compact('cotizacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy=date('Y-m-d');
        $iva= iva::all();
        $products= producto::all();
        $descuento= descuento::all();
        $clients=cliente::all();
        $users=User::all();
        return view('process.cotizaciones.create', compact('iva', 'descuento', 'products','users', 'clients','hoy'));
    }

     public function search_clients($user_id)
    {
        return $clients=cliente::where('id','<>','0')->get();
    }

    public function search_products($user_id)
    {
        return $products=producto::where('id','<>','0')->get();
    }

    public function products_add($product_id)
    {
    
        return $products=producto::where('id',$product_id)->get(); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      /*dd($request);*/
        $buscar=cotizacion::where ('n_cotizacion', $request->n_cotizacion)->get();
        if (count($buscar)>0) {
            # no permitir registrar
            flash('numero de cotización ya existe', 'danger');
            return redirect()->back();
        } else {
            # permitir regitrar
        $i=1;
       /* dd($num);*/
      foreach ($request->product_id as $val) {  
        $total=\DB::select('SELECT  id, precio FROM productos WHERE id='.$val);

            foreach ($total as $valor) {      
        $totales[$i][0]=$valor->id;
        $totales[$i][1]=$valor->precio;
        }
        $i++;
      }

        dd($totales);
        //registro en la tabla cotizaciones----------------------------

            $cotizacion= new cotizacion();

            $cotizacion->clientes_id=$request->clientes_id;
            $cotizacion->productos_id=$request->productos_id;
            $cotizacion->n_cotizacion=$request->n_cotizacion;
            $cotizacion->fecha=$request->fecha;
            $cotizacion->c_pago=$request->c_pago;
            $cotizacion->validez=$request->validez;
            $cotizacion->cantidad=$request->cantidad;
 /*           $cotizacion->importe=$request->importe;*/
            $cotizacion->sub_total=$request->sub_total;
            $cotizacion->descuento=$request->descuento;
            $cotizacion->p_des=$request->p_des;
            $cotizacion->iva=$request->iva;
/*            $cotizacion->p_iva=$request->p_iva;*/
            $cotizacion->divisa=$request->divisa;
            $cotizacion->total=$request->total;
            $cotizacion->comentarios=$request->comentarios;
            $cotizacion->address_to=$request->address_to;
            $cotizacion->email_comments=$request->email_comments;
            $cotizacion->save();

            
             if ($cotizacion->save()) {
            flash('¡Registro Exitoso!', 'success');



       //registrar accion en bitacora-----------------------------------
            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha registrado una cotización';
            $bitacoras->save();
            return redirect()->to('cotizacion');
            } else {

            flash('No se pudo registrar!', 'danger');
                return redirect()->to('cotizacion');
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
        //
    }

    public function descupdate (Request $request)
    {
  
/*  dd($request);*/
    $descupdate=descuento::find($request->id);
    $descupdate->porcen= $request->porcen;
    $descupdate->save();
    
    return redirect()->back();
    }


    public function pdf($id_cotizacion)

    {
        $cotizacion = \DB::select('SELECT  clientes.id, clientes.nombre, clientes.direccion, clientes.email, productos.id, productos.nombre AS producto, productos.precio, productos.descripcion, cotizaciones.n_cotizacion, cotizaciones.total, cotizaciones.fecha, cotizaciones.cantidad, cotizaciones.importe, cotizaciones.sub_total, cotizaciones.iva, cotizaciones.c_pago, cotizaciones.validez, cotizaciones.descuento, cotizaciones.p_iva, cotizaciones.p_des, cotizaciones.divisa

        FROM cotizaciones, clientes, productos

        WHERE cotizaciones.clientes_id = clientes.id AND cotizaciones.productos_id=productos.id AND cotizaciones.id='.$id_cotizacion );

        $i = 1;

        $empresa = empresa::all();



        $dompdf = PDF::loadView('pdf.cotizacion', compact('cotizacion', 'i','empresa'));

        return $dompdf->stream('cotizacion.pdf');
    }


      public function buscar_producto($product)
    {
       return $producto=producto::where('codigo', $product)->get();
        
       

    }

  
    

  
}
