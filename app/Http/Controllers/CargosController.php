<?php

namespace App\Http\Controllers;

use App;
use App\Cargos;
use App\Bitacora;
use App\Alert;
use App\empresa;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CargosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cargos= cargos::all();
       return view('admin.cargos.index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.cargos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $buscar=cargos::where ('nombre', $request->nombre)->get();

        if (count($buscar)>0) {
            # no permitir registrar
            flash('<i class="icon-circle-check"></i> ¡Ya existe el cargo!')->warning()->important();
              return redirect()->back();

        } else {

            $cargos= new cargos();
            $cargos->nombre=$request->nombre;
            $cargos->tipo=$request->tipo;
            $cargos->save();



            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha registrado un Cargo';
            $bitacoras->save();
            flash('<i class="icon-circle-check"></i>¡Cargo registrado exitosamente!')->success()->important();
           return redirect()->to('cargos');

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
    public function edit($id_cargos)
    {
        $cargos=cargos::find($id_cargos);
        return view ('admin.cargos.edit', compact ('cargos'));
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
        $buscar=cargos::where('nombre', $request->nombre)->where('id', '<>', $id)->get();

        if (count($buscar)>0) {
             
            return redirect()-> route('cargos.index');
        } else {
            # podemos actualizar los datos
        $cargos=cargos::find($id);
        $cargos->nombre=$request->nombre;
        $cargos->tipo=$request->tipo;
        $cargos->save();

            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha modificado un Cargo';
            $bitacoras->save();


            flash('<i class="icon-circle-check"></i>¡Cargo actualizado satisfactoriamente!')->success()->important();
            return redirect ()->to('cargos');
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
       $cargos = cargos::find($id);
        $cargos->delete();  

      
        $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha Eliminado un Cargo';
            $bitacoras->save();

        flash('¡Registro eliminado satisfactoriamente!', 'success');


        return back()->with('info', 'El Cargo ha sido eliminado');
    }


    public function pdf(){

        $cargos= cargos::all();

        $i = 1;

        $empresa= empresa::all();
        $date = date('d-m-Y');
        $dompdf = PDF::loadView('pdf.cargos', compact('cargos', 'i','date', 'empresa'));

        return $dompdf->stream('cargos.pdf');

    }
}
