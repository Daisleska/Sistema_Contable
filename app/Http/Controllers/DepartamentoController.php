<?php

namespace App\Http\Controllers;

use App;
use App\Departamento;
use App\Bitacora;
use App\Alert;
use App\empresa;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $departamento= departamento::all();
       return view('admin.departamento.index', compact('departamento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.departamento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $buscar=departamento::where('nombre',$request->nombre)->first();

        
        if ($buscar !== null && count($buscar) > 0) {
            
            flash('<i class="icon-circle-check"></i>¡Ya tiene un Departamento registrado con este nombre!')->warning()->important();
            return redirect()->to('departamento');

        } else {

            $departamento= new departamento();
            $departamento->tipo=$request->tipo;
            $departamento->nombre=$request->nombre;
            $departamento->save();



            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha registrado un Departamento';
            $bitacoras->save();
            flash('<i class="icon-circle-check"></i>¡Departamento registrado exitosamente!')->success()->important();
           return redirect()->to('departamento');

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
    public function edit($id_departamento)
    {
        $departamento=departamento::find($id_departamento);
        return view ('admin.departamento.edit', compact ('departamento'));
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
         $buscar=departamento::where('nombre', $request->nombre)->where('id', '<>', $id)->get();

        if (count($buscar)>0) {
             
            return redirect()-> route('departamento.index');
        } else {
            # podemos actualizar los datos
        $departamento=departamento::find($id);
        $departamento->tipo=$request->tipo;
        $departamento->nombre=$request->nombre;
        $departamento->save();

            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha modificado un Departamento';
            $bitacoras->save();


            flash('<i class="icon-circle-check"></i>¡Departamento actualizado satisfactoriamente!')->success()->important();
            return redirect ()->to('departamento');
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
       $departamento = departamento::find($id);
       $departamento->delete();  

      
        $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha Eliminado un Departamento';
            $bitacoras->save();

        flash('¡Registro eliminado satisfactoriamente!', 'success');


        return back()->with('info', 'El Departamento ha sido eliminado');
    }


    public function pdf(){

        $departamento= departamento::all();

        $i = 1;

        $empresa= empresa::all();
        $date = date('d-m-Y');
        $dompdf = PDF::loadView('pdf.departamento', compact('departamento', 'i','date', 'empresa'));

        return $dompdf->stream('departamento.pdf');

    }
}
