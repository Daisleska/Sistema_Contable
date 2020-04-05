<?php

namespace App\Http\Controllers;

use App\cliente;
use Illuminate\Http\Request;

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
        $cliente=cliente::find($id_cliente);
        return view ('admin.clientes.edit', compact ('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_cliente)
    {
        $buscar=cliente::where('ruf', $request->ruf)->where('id', '<>', $id_cliente)->get();

        if (count($buscar)>0) {
            # no puede actualizar
            return redirect()-> route('clientes.index');
        } else {
            # podemos actualizar los datos
            $cliente=cliente::find($id_cliente);
            $cliente->nombre=$request->nombre;
            $cliente->tipo_documento=$request->tipo_documento;
            $cliente->ruf=$request->ruf;     
            $cliente->email=$request->email;
            $cliente->direccion=$request->direccion;
            $cliente->telefono=$request->telefono;
            $cliente->save();

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

        return back()->with('info', 'El cliente ha sido eliminado');
    }


    public function buscar_cliente($cliente)
    {
        return Clientes::where('ruf', $cliente)->get();
    }

    public function buscar_clientes($id)
    {
        return Cliente::where('ruf', $id)->get();
    }
}
