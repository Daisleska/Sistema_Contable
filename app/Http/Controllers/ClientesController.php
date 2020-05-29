<?php

namespace App\Http\Controllers;

use App\cliente;
use App\Bitacora;
use App\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $clientes = cliente::all();
       return view('admin.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente= new cliente();
            $cliente->nombre=$request->nombre;
            $cliente->tipo_documento=$request->tipo_documento;
            $cliente->ruf=$request->ruf;
            $cliente->email=$request->email;
            $cliente->direccion=$request->direccion;
            $cliente->telefono=$request->telefono;
            $cliente->save();

           $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha registrado un nuevo Cliente';
            $bitacoras->save();
       flash('<i class="icon-circle-check"></i> Cliente registrado exitosamente
                ')->success()->important();
           return redirect()->to('clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(clientes $clientes)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_cliente)
    {
        $clientes=cliente::find($id_cliente);
        return view ('admin.clientes.edit', compact ('clientes'));
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
         $buscar=cliente::where('ruf', $request->ruf)->where('id', '<>', $id)->get();

        if (count($buscar)>0) {
            # no puede actualizar
            return redirect()-> route('clientes.index');
        } else {
            # podemos actualizar los datos
            $cliente=cliente::find($id);
            $cliente->nombre=$request->nombre;
            $cliente->tipo_documento=$request->tipo_documento;
            $cliente->ruf=$request->ruf;     
            $cliente->email=$request->email;
            $cliente->direccion=$request->direccion;
            $cliente->telefono=$request->telefono;
            $cliente->save();

            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha modificado al Cliente';
            $bitacoras->save();

            flash('<i class="icon-circle-check"></i> Cliente Actualizado satisfactoriamente!')->success()->important();

            return redirect ()->route('clientes.index');
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
        $cliente = cliente::find($id);
        $cliente->delete();

            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha Eliminado un Cliente';
            $bitacoras->save();

        flash('Registro eliminado satisfactoriamente');

        return back()->with('info', 'El cliente ha sido eliminado');
    }


    public function buscar_cliente($cliente)
    {
          $resultado=cliente::where('ruf', $cliente)->get();
        
        return $resultado;

    }

}
