<?php

namespace App\Http\Controllers;

use App;
use App\Contratos;
use App\Empleado;
use App\Bitacora;
use App\Alert;
use App\empresa;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContratosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
     

        
        $contratos = \DB::select('SELECT empleado.nombres,empleado.apellidos, empleado.cargo, empleado.adscripcion, contratos.id AS numero, contratos.fecha, contratos.fecha_inicio, contratos.fecha_final, contratos.status FROM `contratos`, `empleado` WHERE empleado.id=contratos.empleado_id');
        
        $empleado = \DB::select('SELECT * FROM `empleado` WHERE tipo_personal="Contratado"');

       return view('process.contratos.index', compact('contratos', 'empleado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('process.contratos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crear(Request $request)
    {

        $buscar = \DB::select('SELECT * FROM `contratos` WHERE empleado_id='.$request->empleado_id.' ORDER BY id DESC LIMIT 1');


        if (count($buscar)>0) {

            
            
            foreach ($buscar as $key) {

            

            if ($key->fecha_final<=$request->fecha) {
            $contratos=contratos::find($key->id);
            $contratos->status="Vencido";
            $contratos->save();


             $emple=\DB::select('SELECT * FROM `empleado` WHERE id='.$request->empleado_id);

               
                     foreach ($emple as $k) {

            $contratos= new contratos();
            $contratos->empleado_id=$request->empleado_id;
            $contratos->tarea=$request->tarea;
            $contratos->fecha=$request->fecha;
            $contratos->fecha_inicio=$request->fecha_inicio;
            $contratos->fecha_final=$request->fecha_final;
            $contratos->cargo=$k->cargo;
            $contratos->area=$request->area;
            $contratos->adscripcion=$k->adscripcion;
            $contratos->save();


            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha registrado un Contrato';
            $bitacoras->save();
            flash('<i class="icon-circle-check"></i>¡Contrato registrado exitosamente!')->success()->important();
           return redirect()->to('contratos');
           } 
      

           


            }else{
                # no permitir registrar
            flash('<i class="icon-circle-check"></i> ¡Hay un contrato vigente!')->warning()->important();
              return redirect()->back();
            }
}
        } else {
             $emple=\DB::select('SELECT * FROM `empleado` WHERE id='.$request->empleado_id);

             foreach ($emple as $k) {

        $contratos= new contratos();
            $contratos->empleado_id=$request->empleado_id;
            $contratos->tarea=$request->tarea;
            $contratos->fecha=$request->fecha;
            $contratos->fecha_inicio=$request->fecha_inicio;
            $contratos->fecha_final=$request->fecha_final;
            $contratos->cargo=$k->cargo;
            $contratos->area=$request->area;
            $contratos->adscripcion=$k->adscripcion;
            $contratos->save();


            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha registrado un Contrato';
            $bitacoras->save();
            flash('<i class="icon-circle-check"></i>¡Contrato registrado exitosamente!')->success()->important();
           return redirect()->to('contratos');
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



     public function pdf($numero)

    {
        

        $contratos = \DB::select('SELECT empleado.nombres,empleado.apellidos, empleado.sexo, empleado.estado_civil, empleado.tipo_doc, empleado.cedula, empleado.direccion, contratos.id AS numero, contratos.fecha, contratos.fecha_inicio, contratos.fecha_final, contratos.cargo, contratos.adscripcion, contratos.tarea, contratos.area FROM `contratos`, `empleado` WHERE empleado.id=contratos.empleado_id AND contratos.id='.$numero);

        $autoridad = \DB::select('SELECT nombres, apellidos, tipo_doc, cedula, sexo, cargo FROM `empleado` WHERE cargo="MAXIMA AUTORIDAD"');

        $empresa = empresa::all();



        $dompdf = PDF::loadView('pdf.contratos', compact('contratos','empresa', 'autoridad'));

        return $dompdf->stream('contratos.pdf');
    }



    public function pdfgeneral(){
         $contratos = \DB::select('SELECT empleado.nombres,empleado.apellidos, empleado.cargo, empleado.adscripcion, contratos.id AS numero, contratos.fecha, contratos.fecha_inicio, contratos.fecha_final, contratos.status FROM `contratos`, `empleado` WHERE empleado.id=contratos.empleado_id');

         $dompdf = PDF::loadView('pdf.contratosgeneral', compact('contratos'));

        return $dompdf->stream('contratosgeneral.pdf');
    }



       public function notipdf($numero)

    {
        





        $dompdf = PDF::loadView('pdf.noti_contrato');

        return $dompdf->stream('noti_contrato.pdf');
    }
}
