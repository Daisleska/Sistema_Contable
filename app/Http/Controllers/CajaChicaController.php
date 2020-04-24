<?php

namespace App\Http\Controllers;

use App\cajachica;
use App\facturav;
use App\facturac;
use Illuminate\Http\Request;

class CajaChicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cajachica = cajachica::all();
       return view('process.cajachica.index', compact('cajachica'));
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

    $hoy=CURDATE();
  

    //$facturav= facturav::where("fecha","=",CURDATE())->select(SUM("total"), "id")->get();
    $facturav = \DB::select('SELECT SUM(total) AS ingresos, fecha FROM facturav WHERE fecha=$hoy');
    

    //$facturac= facturac::where("fecha","=",CURDATE())->select(SUM("total"), "id")->get();
    

    $facturac = \DB::select('SELECT SUM(total) AS egresos, fecha FROM facturac WHERE fecha=$hoy');

    $saldo=0;
    //saldo=saldo+ingresos-egresos;
    $saldo=$saldo+$ingresos-$egresos;
       
       $cajachica= new cajachica();
            
            $cajachica->facturav_id=$facturav_id;
            $cajachica->facturac_id=$facturac_id;
            $cajachica->fecha=$fecha;
            $cajachica->ingresos=$ingresos;
            $cajachica->egresos=$egresos;
            $cajachica->saldo=$saldo;
           
            
            $cajachica->save();


    
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

   


}
