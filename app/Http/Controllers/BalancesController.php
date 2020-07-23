<?php

namespace App\Http\Controllers;

use App;
use Bitacora;
use App\Alert;
use App\cuentas;
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

    //Formulas//
// * Ventas Netas:  
// Vn = Vb - Desct - Rbj - DelV


    
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

       return view('process.balances.index', compact('comprobacion', 'a','res_cuenta','totales_C', 'saldos', 'res_saldo_general'));
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
}
