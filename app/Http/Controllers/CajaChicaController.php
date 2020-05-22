<?php

namespace App\Http\Controllers;

use App\cajachica;
use App\facturav;
use App\facturac;
use App\empresa;
use App\Alert;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


date_default_timezone_set('UTC');
ini_set('max_execution_time', 3000);
set_time_limit(3000);
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

    $semana = date('W')-1;
    $mes = date('F');

 
    foreach ($cajachica as $val) {
    $id_caja=$val->id;
    }

    if ($cajachica){

    //consultar facturas 
    $facturav = \DB::select('SELECT SUM(total) AS ingresos FROM facturav WHERE fecha=CURRENT_DATE AND f_pago="efectivo"');

    foreach ($facturav as $x){
    $facturav_f=is_null($x->ingresos);
 
    }

    if($facturav_f !=true) {

    foreach ($facturav as $val) {
    $ingreso=$val->ingresos;
    }
    
    }else{
    $ingreso=0;
  
    }

    $facturac = \DB::select('SELECT SUM(total) AS egresos FROM facturac WHERE fecha=CURRENT_DATE AND f_pago="efectivo"');

    foreach ($facturac as $y){
    $facturac_f=is_null($y->egresos);
    }

    if($facturac_f !=true) {
    foreach ($facturac as $val) {
    $egreso=$val->egresos;
    
    } 
    
    }else{
    $egreso=0;
    
    }

    $cajac = \DB::select('SELECT saldo FROM cajachica WHERE id!='.$id_caja.'  ORDER BY id  DESC LIMIT 1');
    
    if($cajac !=null) {
    foreach ($cajac as $val) {
    $saldo=$val->saldo;
    }
   
    }else{
    $saldo=0;
    }


    $saldo=$saldo+$ingreso-$egreso;


        if($facturac_f !=true || $facturav_f !=true ){

    //actualizar y mostrar index 
    //actualizar 
    $caja = \DB::select('UPDATE cajachica SET ingresos ='.$ingreso.', egresos ='.$egreso.', saldo ='.$saldo.' WHERE fecha=CURRENT_DATE');

        $semana = date('W')-1;
       
        $cajachica = \DB::select('SELECT * FROM cajachica WHERE WEEK(fecha)='.$semana);

       return view('process.cajachica.index', compact('cajachica', 'semana','mes'));

         }else{
    //index 

      $semana = date('W')-1;
       
        $cajachica = \DB::select('SELECT * FROM cajachica WHERE WEEK(fecha)='.$semana);
       return view('process.cajachica.index', compact('cajachica', 'semana','mes'));
         }
    
    }else{
    
    //consultar facturas 
    $facturav = \DB::select('SELECT SUM(total) AS ingresos FROM facturav WHERE fecha=CURRENT_DATE AND f_pago="efectivo"');


foreach ($facturav as $x){
  $facturav_f=is_null($x->ingresos);
 
}

    if($facturav_f !=true) {

    foreach ($facturav as $val) {
    $ingreso=$val->ingresos;
    }
    
    }else{
    $ingreso=0;
  
    }


    $facturac = \DB::select('SELECT SUM(total) AS egresos FROM facturac WHERE fecha=CURRENT_DATE AND f_pago="efectivo"');
  /*$y=is_null($facturac);*/
  foreach ($facturac as $y){
  $facturac_f=is_null($y->egresos);
}

    if($facturac_f !=true) {
    foreach ($facturac as $val) {
    $egreso=$val->egresos;
    
    } 
    
    }else{
    $egreso=0;
    
    }

    $cajac = \DB::select('SELECT saldo FROM cajachica ORDER BY id DESC LIMIT 1');

  /*$z=is_null($cajac);*/
    if($cajac !=null) {
    foreach ($cajac as $val) {
    $saldo=$val->saldo;
    }
   
    }else{
    $saldo=0;
    }


    $saldo=$saldo+$ingreso-$egreso;

        if($facturac_f !=true || $facturav_f !=true ) {
       
    /*   foreach ($facturac as $key ) {
           $egreso=$key->egresos;
       }*/

    //insertar y mostrar index 
        $caja = \DB::select('INSERT INTO cajachica (fecha, ingresos, egresos, saldo) VALUES(CURRENT_DATE, '.$ingreso.', '.$egreso.', '.$saldo.')');


        $cajachica = cajachica::all();
       return view('process.cajachica.index', compact('cajachica', 'semana','mes'));


         }else{

    //index 
        $cajachica = cajachica::all();
       return view('process.cajachica.index', compact('cajachica', 'semana','mes')); 
    
         }
    }
  
    }//fin index


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
/*
    $hoy=CURDATE();
  */

    //$facturav= facturav::where("fecha","=",CURDATE())->select(SUM("total"), "id")->get();
/*    $facturav = \DB::select('SELECT SUM(total) AS ingresos, fecha FROM facturav WHERE fecha='.$hoy);
    */

    //$facturac= facturac::where("fecha","=",CURDATE())->select(SUM("total"), "id")->get();
    

/*    $facturac = \DB::select('SELECT SUM(total) AS egresos, fecha FROM facturac WHERE fecha='.$hoy);

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
           
            
            $cajachica->save();*/


    
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


     public function pdf(Request $request)

    {
        $pdf= \DB::select('SELECT fecha, ingresos, egresos, saldo

        FROM cajachica

        WHERE fecha BETWEEN "'.$request->fecha.'" AND "'.$request->fecha2.'"');

        $i = 1;

        foreach ($pdf as $key) {  
           $total_ingresos[]= $key->ingresos;
           $total_egresos[]= $key->egresos;
          
         }
          

        $empresa = empresa::all();

        $fecha=$request->fecha;
        $fecha2=$request->fecha2;

        $dompdf = PDF::loadView('pdf.cajachica', compact('pdf', 'fecha', 'fecha2','empresa', 'total_ingresos', 'total_egresos'));

        return $dompdf->stream('cajachica.pdf');
    }
    
    
    


   


}
