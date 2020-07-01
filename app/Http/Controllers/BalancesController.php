<?php

namespace App\Http\Controllers;

use App;
use Bitacora;
use App\Alert;
use App\cuentas;
use App\mayor;
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
    $a=\DB::select('SELECT DISTINCT YEAR( mayor.created_at) AS year FROM mayor');

    $anio = date('Y');
        $comprobacion= \DB::select('SELECT DISTINCT cuentas.nombre, cuentas.tipo, mayor.cuenta_id FROM cuentas, mayor WHERE mayor.cuenta_id=cuentas.id AND YEAR(mayor.created_at)='.$anio.' ORDER BY cuentas.tipo');
        $cuenta=count($comprobacion);
        $i=1;

        while ( $i <= $cuenta) {
        $res_cuenta[]= \DB::select('SELECT SUM(mayor.debe) AS cuenta_debe,  SUM(mayor.haber) AS cuenta_haber FROM mayor WHERE mayor.cuenta_id='.$i.' AND YEAR(mayor.created_at)='.$anio.'');
        $i++;
        }


        $totales_C= \DB::select('SELECT SUM(mayor.debe) AS debe, SUM(mayor.haber) AS haber FROM  mayor WHERE YEAR(mayor.created_at)='.$anio.'');

          
       return view('process.balances.index', compact('comprobacion', 'a','res_cuenta','totales_C'));
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
         $a=\DB::select('SELECT DISTINCT YEAR( mayor.created_at) AS year FROM mayor');

    $anio = $request->anio;
        $comprobacion= \DB::select('SELECT DISTINCT cuentas.nombre, cuentas.tipo, mayor.cuenta_id FROM cuentas, mayor WHERE mayor.cuenta_id=cuentas.id AND YEAR(mayor.created_at)='.$anio.' ORDER BY cuentas.tipo');
        $cuenta=count($comprobacion);
        $i=1;

        while ( $i <= $cuenta) {
        $res_cuenta[]= \DB::select('SELECT SUM(mayor.debe) AS cuenta_debe,  SUM(mayor.haber) AS cuenta_haber FROM mayor WHERE mayor.cuenta_id='.$i.' AND YEAR(mayor.created_at)='.$anio.'');
        $i++;
        }


        $totales_C= \DB::select('SELECT SUM(mayor.debe) AS debe, SUM(mayor.haber) AS haber FROM  mayor WHERE YEAR(mayor.created_at)='.$anio.'');

          
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
