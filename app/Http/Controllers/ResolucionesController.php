<?php

namespace App\Http\Controllers;

use App;
use App\Resoluciones;
use App\Empleado;
use App\Bitacora;
use App\Alert;
use App\empresa;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResolucionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resoluciones = \DB::select('SELECT empleado.nombres,empleado.apellidos, resoluciones.n_resolucion, resoluciones.fecha, resoluciones.cargo, resoluciones.adscripcion, resoluciones.status, resoluciones.condicion FROM `resoluciones`, `empleado` WHERE empleado.id=resoluciones.empleado_id');
        
        $empleado = \DB::select('SELECT * FROM `empleado` WHERE tipo_personal="Alto Nivel"');

       return view('process.resoluciones.index', compact('resoluciones', 'empleado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('process.resoluciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crear(Request $request)
    {

         $buscar = \DB::select('SELECT * FROM `resoluciones` WHERE status="Activo" AND empleado_id='.$request->empleado_id);


        
        if ($buscar !== null && count($buscar) > 0) {
            
            flash('<i class="icon-circle-check"></i>¡Ya tiene una resolución activa este funcionario!')->warning()->important();
            return redirect()->to('resoluciones');

        } else {

            $emple=\DB::select('SELECT * FROM `empleado` WHERE id='.$request->empleado_id);
            foreach($emple as $k){
      
            $resoluciones= new resoluciones();
            $resoluciones->fecha=$request->fecha;
            $resoluciones->n_resolucion=$request->n_resolucion;
            $resoluciones->empleado_id=$request->empleado_id;
            $resoluciones->cargo=$request->cargo;
            $resoluciones->adscripcion=$k->adscripcion;
            $resoluciones->condicion=$request->condicion;
            $resoluciones->save();



            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha registrado una resolución';
            $bitacoras->save();
            flash('<i class="icon-circle-check"></i>¡Resolución registrada exitosamente!')->success()->important();
           return redirect()->to('resoluciones');
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



     public function pdf($n_resolucion)

    {
        

        $resoluciones = \DB::select('SELECT empleado.nombres,empleado.apellidos, empleado.sexo, empleado.estado_civil, empleado.tipo_doc, empleado.cedula, empleado.direccion, resoluciones.n_resolucion, resoluciones.fecha, resoluciones.cargo, resoluciones.adscripcion, resoluciones.condicion FROM `resoluciones`, `empleado` WHERE resoluciones.n_resolucion="'.$n_resolucion.'" AND empleado.id=resoluciones.empleado_id');


        $autoridad = \DB::select('SELECT nombres, apellidos, tipo_doc, cedula, sexo, cargo FROM `empleado` WHERE cargo="MAXIMA AUTORIDAD"');

        $empresa = empresa::all();



        $dompdf = PDF::loadView('pdf.resoluciones', compact('resoluciones','empresa', 'autoridad'));

        return $dompdf->stream('resoluciones.pdf');
    }



     public function pdfgeneral(){
          $resoluciones = \DB::select('SELECT empleado.nombres,empleado.apellidos, resoluciones.n_resolucion, resoluciones.fecha, resoluciones.cargo, resoluciones.adscripcion, resoluciones.status, resoluciones.condicion FROM `resoluciones`, `empleado` WHERE empleado.id=resoluciones.empleado_id');

         $dompdf = PDF::loadView('pdf.resolucionesgeneral', compact('resoluciones'));

        return $dompdf->stream('resolucionesgeneral.pdf');
    }



    public function noti_resolucion($n_resolucion){


          $resoluciones = \DB::select('SELECT empleado.nombres,empleado.apellidos, empleado.sexo, empleado.estado_civil, empleado.tipo_doc, empleado.cedula, empleado.direccion, resoluciones.n_resolucion, resoluciones.fecha, resoluciones.cargo, resoluciones.adscripcion, resoluciones.condicion FROM `resoluciones`, `empleado` WHERE resoluciones.n_resolucion="'.$n_resolucion.'" AND empleado.id=resoluciones.empleado_id');


        $autoridad = \DB::select('SELECT nombres, apellidos, tipo_doc, cedula, sexo, cargo FROM `empleado` WHERE cargo="MAXIMA AUTORIDAD"');

        $empresa = empresa::all();

         $dompdf = PDF::loadView('pdf.noti_resolucion', compact('resoluciones', 'autoridad','empresa'));

        return $dompdf->stream('noti_resolucion.pdf');
    }


}
