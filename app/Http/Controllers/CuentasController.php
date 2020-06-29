<?php

namespace App\Http\Controllers;

use App;
use App\cuenta;
use Bitacora;
use App\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class CuentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentas=cuenta::all();
         return view ('admin.cuentas.index', compact('cuentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('admin.cuentas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $cuenta= new cuenta();
            $cuenta->codigo=$request->codigo;
            $cuenta->nombre=$request->nombre;
            $cuenta->descripcion=$request->descripcion;
            $cuenta->tipo=$request->tipo;
            $cuenta->saldo=$request->saldo;
            $cuenta->save();

            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha registrado una nueva cuenta';
            $bitacoras->save();
       flash('<i class="icon-circle-check"></i> Nueva cuenta registrada exitosamente
                ')->success()->important();
           return redirect()->to('cuentas');
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
         $cuentas=cuenta::find($id);
        return view ('admin.cuentas.edit', compact ('cuentas'));
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
         $buscar=cuenta::where('codigo', $request->codigo)->where('id', '<>', $id)->get();

        if (count($buscar)>0) {
             
            return redirect()-> route('cuentas.index');
        } else {
            # podemos actualizar los datos
            $cuenta=cuenta::find($id);
            $cuenta->codigo=$request->codigo;
            $cuenta->nombre=$request->nombre;
            $cuenta->descripcion=$request->descripcion;
            $cuenta->tipo=$request->tipo;
            $cuenta->saldo=$request->saldo;
            $cuenta->save();

            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha modificado una Cuenta';
            $bitacoras->save();


            flash('<i class="icon-circle-check"></i> Cuenta Actualizada satisfactoriamente!')->success()->important();
            return redirect ()->route('cuentas.index');
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
         $cuentas = cuenta::find($id);
        $cuentas->delete();  

      
        $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha Eliminado una cuenta';
            $bitacoras->save();

        flash('Registro eliminado satisfactoriamente!');


        return back()->with('info', 'la cuenta ha sido eliminado');
    
    }
}
