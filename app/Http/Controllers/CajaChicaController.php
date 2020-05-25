<?php

namespace App\Http\Controllers;

use App\cajachica;
use App\cuenta;
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
    public function index() {


    $semana = date('W')-1;
    $mes = date('F');

        $cajachica = \DB::select('SELECT * FROM cajachica WHERE WEEK(fecha)='.$semana);
       return view('process.cajachica.index', compact('cajachica', 'semana','mes'));
       
  
    }//fin index


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store (Request $request) {
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
    


     public function ingreso(Request $request) {

     $cajach = \DB::select('SELECT * FROM cajachica');
    //
     if ($cajach){

    $cajac = \DB::select('SELECT saldo FROM cajachica ORDER BY id  DESC LIMIT 1');

    foreach ($cajac as $val) {
        $saldo=$val->saldo;
        }

        $egreso=0;
       
        $saldos=$saldo+$request->ingreso-$egreso;


        $cajachica= new cajachica();

           $cajachica->fecha=$request->fecha;
           $cajachica->concepto=$request->concepto;
           $cajachica->n_comp=$request->n_comp;
           $cajachica->ingresos=$request->ingreso;
           $cajachica->egresos=$egreso;
           $cajachica->saldo=$saldos;
           $cajachica->save();

          return redirect()->to('cajachica');



    }else{

        $saldoi= cuenta::all(); 

        foreach ($saldoi as $val) {

        $saldoinicial=$val->saldo;
        
        }
     
        $egreso=0;

       
        $saldos=$saldoinicial+$request->ingreso-$egreso;
   
        $cajachica= new cajachica();

           $cajachica->fecha=$request->fecha;
           $cajachica->concepto=$request->concepto;
           $cajachica->n_comp=$request->n_comp;
           $cajachica->ingresos=$request->ingreso;
           $cajachica->egresos=$egreso;
           $cajachica->saldo=$saldos;
           $cajachica->save();


              return redirect()->to('cajachica');


    }
}
    
    public function egreso(Request $request) {

     $cajach = \DB::select('SELECT * FROM cajachica');
    //
     if ($cajach){

    $cajac = \DB::select('SELECT saldo FROM cajachica ORDER BY id  DESC LIMIT 1');

    foreach ($cajac as $val) {
        $saldo=$val->saldo;
        }

        $ingreso=0;
       
        $saldos=$saldo+$ingreso-$request->egreso;


        $cajachica= new cajachica();

           $cajachica->fecha=$request->fecha;
           $cajachica->concepto=$request->concepto;
           $cajachica->n_comp=$request->n_comp;
           $cajachica->ingresos=$ingreso;
           $cajachica->egresos=$request->egreso;
           $cajachica->saldo=$saldos;
           $cajachica->save();

          return redirect()->to('cajachica');



    }else{

        $saldoi= cuenta::all(); 

        foreach ($saldoi as $val) {

        $saldoinicial=$val->saldo;
        
        }
     
        $ingreso=0;

       
        $saldos=$saldoinicial+$ingreso-$request->egreso;
   
        $cajachica= new cajachica();

           $cajachica->fecha=$request->fecha;
           $cajachica->concepto=$request->concepto;
           $cajachica->n_comp=$request->n_comp;
           $cajachica->ingresos=$ingreso;
           $cajachica->egresos=$request->egreso;
           $cajachica->saldo=$saldos;
           $cajachica->save();


              return redirect()->to('cajachica');


    }

    }//fin función


     public function pdf(Request $request)

    {
        $pdf= \DB::select('SELECT id, fecha, concepto, ingresos, egresos, saldo

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

        $dompdf = PDF::loadView('pdf.cajachica', compact('pdf', 'i','empresa', 'fecha', 'fecha2', 'total_ingresos', 'total_egresos'));

        return $dompdf->stream('cajachica.pdf');
    }
    
    
    


   


}
