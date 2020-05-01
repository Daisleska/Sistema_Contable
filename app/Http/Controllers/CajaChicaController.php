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

    //$factura = \DB::select('SELECT SUM(facturav.total) AS ingresos, SUM(facturac.total) AS egresos FROM facturav, facturac WHERE facturav.fecha=CURRENT_DATE AND facturac.fecha=CURRENT_DATE');
     
    //consultar cajachica
    $cajachica = \DB::select('SELECT * FROM cajachica WHERE fecha=CURRENT_DATE');
 
    foreach ($cajachica as $val) {
    $id_caja=$val->id;
    }

    if ($cajachica){

    //consultar facturas 
    $facturav = \DB::select('SELECT SUM(total) AS ingresos FROM facturav WHERE fecha=CURRENT_DATE');
    if($facturav){
    foreach ($facturav as $val) {
    $ingreso=$val->ingresos;
    }
    }else{
    $ingreso=0;  
    }

    $facturac = \DB::select('SELECT SUM(total) AS egresos FROM facturac WHERE fecha=CURRENT_DATE');
    if($facturac){
    foreach ($facturac as $val) {
       $egreso=$val->egresos;
    }
    }else{
    $egreso=0;
    }

    $cajac = \DB::select('SELECT saldo FROM cajachica WHERE id!='.$id_caja.'  ORDER BY id  DESC LIMIT 1');
    
    if($cajac) {
     foreach ($cajac as $val) {
       $saldo=$val->saldo;
    }

    }else{
    $saldo=0;
    }

    $saldo=$saldo+$ingreso-$egreso;

        if($facturav || $facturac){

    //actualizar y mostrar index 
    //actualizar 
    $caja = \DB::select('UPDATE cajachica SET ingresos ='.$ingreso.', egresos ='.$egreso.', saldo ='.$saldo.' WHERE fecha=CURRENT_DATE');

        $cajachica = cajachica::all();
       return view('process.cajachica.index', compact('cajachica'));

         }else{
    //index 

       $cajachica = cajachica::all();
       return view('process.cajachica.index', compact('cajachica'));
         }
    
    }else{
    
    //consultar facturas 
    $facturav = \DB::select('SELECT SUM(total) AS ingresos FROM facturav WHERE fecha=CURRENT_DATE');

    if($facturav) {
    foreach ($facturav as $val) {
    $ingreso=$val->ingresos;
    }
    
    }else{
    $ingreso=0;
    }

    



    $facturac = \DB::select('SELECT SUM(total) AS egresos FROM facturac WHERE fecha=CURRENT_DATE');

    if($facturac) {
    foreach ($facturac as $val) {
    $egreso=$val->egresos;
    }
    
    }else{
    $egreso=0;
    }

    
    
 
    $cajac = \DB::select('SELECT saldo FROM cajachica ORDER BY id DESC LIMIT 1');


    if($cajac) {
    foreach ($cajac as $val) {
    $saldo=$val->saldo;
    }
   
    }else{
    $saldo=0;
    }


    $saldo=$saldo+$ingreso-$egreso;

        if($facturav || $facturac){
      

    //insertar y mostrar index 
        $caja = \DB::select('INSERT INTO cajachica (fecha, ingresos, egresos, saldo) VALUES(CURRENT_DATE, '.$ingreso.', '.$egreso.', '.$saldo.')');

        $cajachica = cajachica::all();
       return view('process.cajachica.index', compact('cajachica'));


         }else{

    //index 
        $cajachica = cajachica::all();
       return view('process.cajachica.index', compact('cajachica')); 
    
         }
    }
  



    }//fin función index 

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
