<?php

namespace App\Http\Controllers;

use App;
use App\Empleado;
use App\Bitacora;
use App\Departamento;
use App\Cargos;
use App\Alert;
use PDF;
use App\empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $empleado = empleado::all();
       return view('admin.empleado.index', compact('empleado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $departamento=departamento::all();
        $cargos=cargos::all();
       return view ('admin.empleado.create', compact('departamento', 'cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $empleado= new empleado();
            $empleado->nombres=$request->nombres;
            $empleado->apellidos=$request->apellidos;
            $empleado->tipo_doc=$request->tipo_doc;
            $empleado->cedula=$request->cedula;
            $empleado->fecha_nac=$request->fecha_nac;
            $empleado->sexo=$request->sexo;
            $empleado->estado_civil=$request->estado_civil;
            $empleado->tipo_personal=$request->tipo_personal;
            $empleado->cargo=$request->cargo;
            $empleado->adscripcion=$request->adscripcion;
            $empleado->fecha_ingreso=$request->fecha_ingreso;
            $empleado->direccion=$request->direccion;
            $empleado->save();

           $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha registrado un nuevo Empleado';
            $bitacoras->save();
       flash('<i class="icon-circle-check"></i>¡Empleado registrado exitosamente!')->success()->important();
           return redirect()->to('empleado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id_empleado)
    {
        $empleado=empleado::find($id_empleado);
         $departamento=departamento::all();
        $cargos=cargos::all();
        return view ('admin.empleado.edit', compact ('empleado', 'departamento', 'cargos'));
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
       $buscar=empleado::where('cedula', $request->cedula)->where('id', '<>', $id)->get();

        if (count($buscar)>0) {
            # no puede actualizar
            return redirect()-> route('empleado.index');
        } else {
            # podemos actualizar los datos
            $empleado=empleado::find($id);
            $empleado->nombres=$request->nombres;
            $empleado->apellidos=$request->apellidos;
            $empleado->tipo_doc=$request->tipo_doc;
            $empleado->cedula=$request->cedula;
            $empleado->fecha_nac=$request->fecha_nac;
            $empleado->sexo=$request->sexo;
            $empleado->estado_civil=$request->estado_civil;
            $empleado->tipo_personal=$request->tipo_personal;
            $empleado->cargo=$request->cargo;
            $empleado->adscripcion=$request->adscripcion;
            $empleado->fecha_ingreso=$request->fecha_ingreso;
            $empleado->direccion=$request->direccion;
            $empleado->save();

            $bitacoras = new App\Bitacora;
            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha modificado al Empleado';
            $bitacoras->save();

            flash('<i class="icon-circle-check"></i> ¡Empleado Actualizado satisfactoriamente!')->success()->important();

            return redirect ()->route('empleado.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = empleado::find($id);
        $empleado->delete();

            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha Eliminado un Empleado';
            $bitacoras->save();

        flash('¡Registro eliminado satisfactoriamente!', 'success');

        return back()->with('info', 'El Empleado ha sido eliminado');
    }


    public function pdf(){

        $empleado = empleado::all();

        $i = 1;

        $empresa= empresa::all();
        $date = date('d-m-Y');
        $dompdf = PDF::loadView('pdf.empleado', compact('empleado', 'i','date', 'empresa'));

        return $dompdf->stream('empleado.pdf');

    }
}
