<?php

namespace App\Http\Controllers;

use App;
use App\cotizacion;
use App\producto;
use App\iva;
use App\cliente;
use App\User;
use App\descuento;
use Bitacora;
use App\empresa;
use App\Alert;
use App\Mail\email_Cotizacion;
use Mail;
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
       $cotizacion = \DB::select('SELECT DISTINCT clientes.id, clientes.nombre, clientes.tipo_documento, clientes.ruf, clientes.email, cotizaciones.fecha, cotizaciones.n_cotizacion, cotizaciones.total, cotizaciones.divisa FROM cotizaciones, clientes WHERE cotizaciones.clientes_id= clientes.id');



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
        $i=0;
      
       /* dd($num);*/
      foreach ($request->product_id as $val) {  
        $total=\DB::select('SELECT  id, precio FROM productos WHERE id='.$val);

            foreach ($total as $valor) {      
        $totales[$i][0]=$valor->id;
        $totales[$i][1]=$valor->precio;

        
        $sub_totales[$i]=$request->amount[$i]*$valor->precio;

        }
        $i++;
      
      }

        $sub_total=array_sum($sub_totales);
        $descuento=$sub_total*$request->p_des/100;
        $total=$sub_total-$descuento;

        //dd($totales, $request->amount, $sub_totales, $sub_total, $total);
        //registro en la tabla cotizaciones----------------------------
        $coun=count($sub_totales);
        for ($i=0; $i <$coun ; $i++) { 
            
            $cotizacion= new cotizacion();

            $cotizacion->n_cotizacion=$request->n_cotizacion;
            $cotizacion->fecha=$request->fecha;
            $cotizacion->clientes_id=$request->clientes_id;
            $cotizacion->productos_id=$totales[$i][0];
            $cotizacion->c_pago=$request->c_pago;
            $cotizacion->validez=$request->validez;
            $cotizacion->cantidad=$request->amount[$i];
            $cotizacion->importe=$sub_totales[$i];
            $cotizacion->sub_total=$sub_total;
            $cotizacion->descuento=$descuento;
            $cotizacion->p_des=$request->p_des;

            //$cotizacion->iva=$request->iva;
            //$cotizacion->p_iva=$request->p_iva;

            $cotizacion->divisa=$request->divisa;
            $cotizacion->total=$total;

            $cotizacion->comentarios=$request->comentarios;
            $cotizacion->address_to=$request->address_to;
            $cotizacion->email_comments=$request->email_comments;
            $cotizacion->save();

        }
            if ($cotizacion->save()) {
             $pdf=$this->pdf($request->n_cotizacion);
            $clientes=cliente::find($request->clientes_id);
            Mail::to($clientes->email)->send(new email_Cotizacion($cotizacion->id, $pdf)); 

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
        $cotizacion = cotizacion::find($id);
    /*    dd($cotizacion);*/
        $cotizacion->delete();

            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha Eliminado una cotización';
            $bitacoras->save();

        flash('Registro eliminado satisfactoriamente');

        return back();
    }

    public function descupdate (Request $request)
    {
  
/*  dd($request);*/
    $descupdate=descuento::find($request->id);
    $descupdate->porcen= $request->porcen;
    $descupdate->save();
    
    return redirect()->back();
    }


    public function pdf($n_cotizacion)

    {
        $cotizacion = \DB::select('SELECT DISTINCT clientes.id, clientes.nombre, clientes.direccion, clientes.email, clientes.tipo_documento, clientes.ruf, cotizaciones.n_cotizacion, cotizaciones.total, cotizaciones.fecha, cotizaciones.sub_total, cotizaciones.c_pago, cotizaciones.validez, cotizaciones.descuento, cotizaciones.p_des, cotizaciones.divisa, cotizaciones.comentarios, cotizaciones.address_to, cotizaciones.email_comments FROM cotizaciones, clientes WHERE cotizaciones.clientes_id = clientes.id AND cotizaciones.n_cotizacion='.$n_cotizacion);

        foreach ($cotizacion as $key) {
            
          
        
            $fechaven=date("d-m-Y",strtotime($key->fecha. "+" .$key->validez. "days"));
            $fechae=date("d-m-Y", strtotime($key->fecha));

       }
         
    
        $producto= \DB::select('SELECT productos.id, productos.nombre, productos.precio, productos.descripcion, cotizaciones.cantidad, cotizaciones.importe FROM cotizaciones, productos WHERE  cotizaciones.productos_id=productos.id AND cotizaciones.n_cotizacion='.$n_cotizacion);



        $empresa = empresa::all();



        $dompdf = PDF::loadView('pdf.cotizacion', compact('cotizacion', 'producto','empresa', 'fechaven', 'fechae'));

        return $dompdf->stream('cotizacion.pdf');
    }

    //   public function buscar_producto($product)
    // {
    //    return $producto=producto::where('codigo', $product)->get();
        
       

    // }

  
    

  
}
