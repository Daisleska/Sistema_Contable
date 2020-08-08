<?php

namespace App\Http\Controllers;

use App;
use Bitacora;
use App\Alert;
use App\cuentas;
use App\ganancias_perdidas;
use App\mayor;
use App\empresa;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $anio = date('Y');
         $mes= date('m');
         $informacion= \DB::select('SELECT * FROM ganancias_perdidas WHERE MONTH(fecha)='.$mes.' AND YEAR(fecha)='.$anio);
    if (empty($informacion)) {
         /*-----------------datos para balance de comprobacion---------------*/
    $a=\DB::select('SELECT DISTINCT YEAR( mayor.created_at) AS year FROM mayor');

        $comprobacion= \DB::select('SELECT DISTINCT cuentas.nombre, cuentas.tipo, mayor.cuenta_id, cuentas.codigo FROM cuentas, mayor WHERE mayor.cuenta_id=cuentas.id AND YEAR(mayor.created_at)='.$anio.' ORDER BY cuentas.tipo ASC');
        $cuenta=count($comprobacion);
        $i=1;

        foreach ($comprobacion as $val) {      
        
        $res= \DB::select('SELECT SUM(mayor.debe) AS cuenta_debe,  SUM(mayor.haber) AS cuenta_haber FROM mayor WHERE mayor.cuenta_id='.$val->cuenta_id.' AND YEAR(mayor.created_at)='.$anio.'');


        foreach ($res as $key) {      
        $res_cuenta[$i][0]=$key->cuenta_debe;
        $res_cuenta[$i][1]=$key->cuenta_haber;

        $saldos[]=$res_cuenta[$i][0] - $res_cuenta[$i][1]; 
        }
        $i++;

        }//

        $totales_C= \DB::select('SELECT SUM(mayor.debe) AS debe, SUM(mayor.haber) AS haber FROM  mayor WHERE YEAR(mayor.created_at)='.$anio.'');

        //dd($comprobacion,$res, $res_cuenta, $totales_C);

    /*------------------------FIN COMPROBACION-------------------------*/
    /*-----------Datos para balance de ganancias y perdidas------------*/
    
    $ventas = 0;
    $compras = 0;
    $inventario_inicial =0;
    $inventario_final =0;
     $inventario_ini = \DB::select('SELECT id, anio, valor, created_at, updated_at FROM has_inventario 
        WHERE YEAR(anio)='.$anio.' ORDER BY id ASC LIMIT 0,1');
         foreach ($inventario_ini as $key) {  
           $inicio = $key->anio;
         }
     $inventario_fin = \DB::select('SELECT id, anio, valor, created_at, updated_at FROM has_inventario 
        WHERE YEAR(anio)='.$anio.' ORDER BY id DESC LIMIT 0,1');
         foreach ($inventario_fin as $key) {  
           $final = $key->anio;
     }
    /*-------------Datos para el balance general----------------------*/

    $general= \DB::select('SELECT DISTINCT cuentas.nombre, cuentas.tipo, cuentas.t_cuenta, mayor.cuenta_id, cuentas.codigo FROM cuentas, mayor WHERE mayor.cuenta_id=cuentas.id AND YEAR(mayor.created_at)='.$anio.' ORDER BY cuentas.tipo ASC');
    $j=1;

    foreach ($general as $gen) {

     $gener= \DB::select('SELECT SUM(mayor.debe) AS cuenta_debe,  SUM(mayor.haber) AS cuenta_haber FROM mayor WHERE mayor.cuenta_id='.$gen->cuenta_id.' AND YEAR(mayor.created_at)='.$anio.'');


        foreach ($gener as $keyk) {    
        $res_saldo_general[$j][0]=$gen->nombre;
        $res_saldo_general[$j][1]=$gen->tipo;  
        $res_saldo_general[$j][2]=$gen->t_cuenta;
        $res_saldo_general[$j][3]=$keyk->cuenta_debe;
        $res_saldo_general[$j][4]=$keyk->cuenta_haber;
        }
        $j++;

    }
        $er = 1;
        return view('process.balances.index', 
        compact('comprobacion', 'a','res_cuenta','totales_C', 'saldos', 'res_saldo_general',
        'ventas', 'compras', 'inventario_inicial', 'inventario_final', 'inicio', 'final', 'er'));
    }else{
     /*-----------------datos para balance de comprobacion---------------*/
    $a=\DB::select('SELECT DISTINCT YEAR( mayor.created_at) AS year FROM mayor');

        $comprobacion= \DB::select('SELECT DISTINCT cuentas.nombre, cuentas.tipo, mayor.cuenta_id, cuentas.codigo FROM cuentas, mayor WHERE mayor.cuenta_id=cuentas.id AND YEAR(mayor.created_at)='.$anio.' ORDER BY cuentas.tipo ASC');
        $cuenta=count($comprobacion);
        $i=1;

        foreach ($comprobacion as $val) {      
        
        $res= \DB::select('SELECT SUM(mayor.debe) AS cuenta_debe,  SUM(mayor.haber) AS cuenta_haber FROM mayor WHERE mayor.cuenta_id='.$val->cuenta_id.' AND YEAR(mayor.created_at)='.$anio.'');


        foreach ($res as $key) {      
        $res_cuenta[$i][0]=$key->cuenta_debe;
        $res_cuenta[$i][1]=$key->cuenta_haber;

        $saldos[]=$res_cuenta[$i][0] - $res_cuenta[$i][1]; 
        }
        $i++;

        }//

        $totales_C= \DB::select('SELECT SUM(mayor.debe) AS debe, SUM(mayor.haber) AS haber FROM  mayor WHERE YEAR(mayor.created_at)='.$anio.'');

        //dd($comprobacion,$res, $res_cuenta, $totales_C);

    /*------------------------FIN COMPROBACION-------------------------*/

    $compra =  \DB::select('SELECT compra.facturac_id,facturac.fecha, facturac.total, facturac.sub_total, facturac.iva, facturac.p_iva FROM compra, facturac WHERE compra.facturac_id = facturac.id AND YEAR(facturac.fecha)='.$anio);

    foreach ($compra as $key) {  
           $compras[]= $key->total;
           $subtotal_compra[]= $key->sub_total;
           $IVA_compra[]= $key->iva;
         }
         if (isset($compras)== false) {
             $compras=0;
             $subtotal_compra=0;
             $IVA_compra=0;
          }
    $venta =  \DB::select('SELECT venta.facturav_id, facturav.fecha, facturav.total,facturav.sub_total, facturav.iva, iva.porcentaje FROM venta, facturav, iva WHERE venta.facturav_id = facturav.id AND YEAR(facturav.fecha)='.$anio);
    foreach ($venta as $key) {  
           $ventas[]= $key->total;
           $subtotal_venta[]= $key->sub_total;
           $IVA_venta[]= $key->iva;
         }
     if (isset($ventas)== false) {
         $ventas=0;
         $subtotal_venta=0;
         $IVA_venta=0;
      }

    $inventario_ini = \DB::select('SELECT id, anio, valor, created_at, updated_at FROM has_inventario 
        WHERE YEAR(anio)='.$anio.' ORDER BY id ASC LIMIT 0,1');
         foreach ($inventario_ini as $key) {  
           $inventario_inicial= $key->valor;
           $inicio = $key->anio;
         }
     $inventario_fin = \DB::select('SELECT id, anio, valor, created_at, updated_at FROM has_inventario 
        WHERE YEAR(anio)='.$anio.' ORDER BY id DESC LIMIT 0,1');
         foreach ($inventario_fin as $key) {  
           $inventario_final= $key->valor;
           $final = $key->anio;
     }

    /*---------------------FIN GANANCIAS Y PERDIDAS--------------------*/
    /*-------------Datos para el balance general----------------------*/

    $general= \DB::select('SELECT DISTINCT cuentas.nombre, cuentas.tipo, cuentas.t_cuenta, mayor.cuenta_id, cuentas.codigo FROM cuentas, mayor WHERE mayor.cuenta_id=cuentas.id AND YEAR(mayor.created_at)='.$anio.' ORDER BY cuentas.tipo ASC');
    $j=1;

    foreach ($general as $gen) {

     $gener= \DB::select('SELECT SUM(mayor.debe) AS cuenta_debe,  SUM(mayor.haber) AS cuenta_haber FROM mayor WHERE mayor.cuenta_id='.$gen->cuenta_id.' AND YEAR(mayor.created_at)='.$anio.'');


        foreach ($gener as $keyk) {    
        $res_saldo_general[$j][0]=$gen->nombre;
        $res_saldo_general[$j][1]=$gen->tipo;  
        $res_saldo_general[$j][2]=$gen->t_cuenta;
        $res_saldo_general[$j][3]=$keyk->cuenta_debe;
        $res_saldo_general[$j][4]=$keyk->cuenta_haber;
        }
        $j++;

    }
   //dd($res_saldo_general);
        $er = 2;
       return view('process.balances.index', 
        compact('comprobacion', 'a','res_cuenta','totales_C', 'saldos', 'res_saldo_general',
        'inicio', 'final', 'ventas', 'subtotal_venta', 'IVA_venta', 'compras', 'subtotal_compra', 'IVA_compra', 'inventario_inicial', 'inventario_final', 'informacion', 'er'));
      }
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
     $con= count($request->nombres);
     for ($i=0; $i <$con ; $i++) {
        $guardar= new ganancias_perdidas();

            $guardar->nombre=$request->nombres[$i];
            $guardar->valor=$request->valor[$i];
            $guardar->fecha=$request->fecha;

            $guardar->save();
    }
    $anio= date('Y');
    $mes= date('m');
    $informacion= \DB::select('SELECT * FROM ganancias_perdidas WHERE MONTH(fecha)='.$mes.' AND YEAR(fecha)='.$anio);
        /*-----------------datos para balance de comprobacion---------------*/
    $a=\DB::select('SELECT DISTINCT YEAR( mayor.created_at) AS year FROM mayor');

        $anio = date('Y');
        $comprobacion= \DB::select('SELECT DISTINCT cuentas.nombre, cuentas.tipo, mayor.cuenta_id, cuentas.codigo FROM cuentas, mayor WHERE mayor.cuenta_id=cuentas.id AND YEAR(mayor.created_at)='.$anio.' ORDER BY cuentas.tipo ASC');
        $cuenta=count($comprobacion);
        $i=1;

        foreach ($comprobacion as $val) {      
        
        $res= \DB::select('SELECT SUM(mayor.debe) AS cuenta_debe,  SUM(mayor.haber) AS cuenta_haber FROM mayor WHERE mayor.cuenta_id='.$val->cuenta_id.' AND YEAR(mayor.created_at)='.$anio.'');


        foreach ($res as $key) {      
        $res_cuenta[$i][0]=$key->cuenta_debe;
        $res_cuenta[$i][1]=$key->cuenta_haber;

        $saldos[]=$res_cuenta[$i][0] - $res_cuenta[$i][1]; 
        }
        $i++;

        }//

        $totales_C= \DB::select('SELECT SUM(mayor.debe) AS debe, SUM(mayor.haber) AS haber FROM  mayor WHERE YEAR(mayor.created_at)='.$anio.'');

        //dd($comprobacion,$res, $res_cuenta, $totales_C);

    /*------------------------FIN COMPROBACION-------------------------*/
    /*-----------Datos para balance de ganancias y perdidas------------*/

    $compra =  \DB::select('SELECT compra.facturac_id,facturac.fecha, facturac.total, facturac.sub_total, facturac.iva, facturac.p_iva FROM compra, facturac WHERE compra.facturac_id = facturac.id AND YEAR(facturac.fecha)='.$anio);

    foreach ($compra as $key) {  
           $compras[]= $key->total;
           $subtotal_compra[]= $key->sub_total;
           $IVA_compra[]= $key->iva;
         }
         if (isset($compras)== false) {
             $compras=0;
             $subtotal_compra=0;
             $IVA_compra=0;
          }
    $venta =  \DB::select('SELECT venta.facturav_id, facturav.fecha, facturav.total,facturav.sub_total, facturav.iva, iva.porcentaje FROM venta, facturav, iva WHERE venta.facturav_id = facturav.id AND YEAR(facturav.fecha)='.$anio);
    foreach ($venta as $key) {  
           $ventas[]= $key->total;
           $subtotal_venta[]= $key->sub_total;
           $IVA_venta[]= $key->iva;
         }
     if (isset($ventas)== false) {
         $ventas=0;
         $subtotal_venta=0;
         $IVA_venta=0;
      }

    $inventario_ini = \DB::select('SELECT id, anio, valor, created_at, updated_at FROM has_inventario 
        WHERE YEAR(anio)='.$anio.' ORDER BY id ASC LIMIT 0,1');
         foreach ($inventario_ini as $key) {  
           $inventario_inicial= $key->valor;
           $inicio = $key->anio;
         }
     $inventario_fin = \DB::select('SELECT id, anio, valor, created_at, updated_at FROM has_inventario 
        WHERE YEAR(anio)='.$anio.' ORDER BY id DESC LIMIT 0,1');
         foreach ($inventario_fin as $key) {  
           $inventario_final= $key->valor;
           $final = $key->anio;
     }

    /*---------------------FIN GANANCIAS Y PERDIDAS--------------------*/
    /*-------------Datos para el balance general----------------------*/

    $general= \DB::select('SELECT DISTINCT cuentas.nombre, cuentas.tipo, cuentas.t_cuenta, mayor.cuenta_id, cuentas.codigo FROM cuentas, mayor WHERE mayor.cuenta_id=cuentas.id AND YEAR(mayor.created_at)='.$anio.' ORDER BY cuentas.tipo ASC');
    $j=1;

    foreach ($general as $gen) {

     $gener= \DB::select('SELECT SUM(mayor.debe) AS cuenta_debe,  SUM(mayor.haber) AS cuenta_haber FROM mayor WHERE mayor.cuenta_id='.$gen->cuenta_id.' AND YEAR(mayor.created_at)='.$anio.'');


        foreach ($gener as $keyk) {    
        $res_saldo_general[$j][0]=$gen->nombre;
        $res_saldo_general[$j][1]=$gen->tipo;  
        $res_saldo_general[$j][2]=$gen->t_cuenta;
        $res_saldo_general[$j][3]=$keyk->cuenta_debe;
        $res_saldo_general[$j][4]=$keyk->cuenta_haber;
        }
        $j++;

    }
   //dd($res_saldo_general);
         $er = 2;
       return view('process.balances.index', 
        compact('comprobacion', 'a','res_cuenta','totales_C', 'saldos', 'res_saldo_general',
        'inicio', 'final', 'ventas', 'subtotal_venta', 'IVA_venta', 'compras', 'subtotal_compra', 'IVA_compra', 'inventario_inicial', 'inventario_final', 'informacion', 'er'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      /*-----------------datos para balance de comprobacion---------------*/
        $a=\DB::select('SELECT DISTINCT YEAR( mayor.created_at) AS year FROM mayor');

        $anio = $request->anio;
        $comprobacion= \DB::select('SELECT DISTINCT cuentas.nombre, cuentas.tipo, mayor.cuenta_id, cuentas.codigo FROM cuentas, mayor WHERE mayor.cuenta_id=cuentas.id AND YEAR(mayor.created_at)='.$anio.' ORDER BY cuentas.tipo');
        $cuenta=count($comprobacion);
        $i=1;

        foreach ($comprobacion as $val) {      
        
        $res= \DB::select('SELECT SUM(mayor.debe) AS cuenta_debe,  SUM(mayor.haber) AS cuenta_haber FROM mayor WHERE mayor.cuenta_id='.$val->cuenta_id.' AND YEAR(mayor.created_at)='.$anio.'');

        foreach ($res as $key) {      
        $res_cuenta[$i][0]=$key->cuenta_debe;
        $res_cuenta[$i][1]=$key->cuenta_haber;
        }
        $i++;
        }//
        $totales_C= \DB::select('SELECT SUM(mayor.debe) AS debe, SUM(mayor.haber) AS haber FROM  mayor WHERE YEAR(mayor.created_at)='.$anio.'');
    /*------------------------FIN COMPROBACION-------------------------*/

        return view('process.balances.index', compact('comprobacion', 'a','res_cuenta','totales_C'));
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

    public function pdfcomprobacion(){

     $a=\DB::select('SELECT DISTINCT YEAR( mayor.created_at) AS year FROM mayor');

        $anio = date('Y');
        $comprobacion= \DB::select('SELECT DISTINCT cuentas.nombre, cuentas.tipo, mayor.cuenta_id, cuentas.codigo FROM cuentas, mayor WHERE mayor.cuenta_id=cuentas.id AND YEAR(mayor.created_at)='.$anio.' ORDER BY cuentas.tipo ASC');
        $cuenta=count($comprobacion);
        $i=1;

        foreach ($comprobacion as $val) {      
        
        $res= \DB::select('SELECT SUM(mayor.debe) AS cuenta_debe,  SUM(mayor.haber) AS cuenta_haber FROM mayor WHERE mayor.cuenta_id='.$val->cuenta_id.' AND YEAR(mayor.created_at)='.$anio.'');


        foreach ($res as $key) {      
        $res_cuenta[$i][0]=$key->cuenta_debe;
        $res_cuenta[$i][1]=$key->cuenta_haber;

        $saldos[]=$res_cuenta[$i][0] - $res_cuenta[$i][1]; 
        }
        $i++;

        }//

        $totales_C= \DB::select('SELECT SUM(mayor.debe) AS debe, SUM(mayor.haber) AS haber FROM  mayor WHERE YEAR(mayor.created_at)='.$anio.'');

        $empresa = empresa::all();


            $dompdf = PDF::loadView('pdf.comprobacion', compact('comprobacion', 'totales_C','res_cuenta', 'saldos', 'empresa'));

            return $dompdf->stream('comprobacion.pdf');
 
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

     public function historial()
    {
        return view('process.balances.historial.historial');
    }
}
