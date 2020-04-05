<?php

namespace App\Http\Controllers;

use App\empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $empresa = empresa::all();
       return view('admin.empresa.index', compact('empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $empresa= new empresa();
            $empresa->nombre=$request->nombre;
            $empresa->tipo_documento=$request->tipo_documento;
            $empresa->ruf=$request->ruf;
            $empresa->email=$request->email;
            $empresa->direccion=$request->direccion;
            $empresa->codigo=$request->codigo;
            $empresa->telefono=$request->telefono;
            $empresa->save();

           return redirect()->to('empresa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_empresa)
    {
         $empresa=empresa::find($id_cliente);
        return view ('admin.empresa.edit', compact ('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_empresa)
    {
        $buscar=empresa::where('ruf', $request->ruf)->where('id', '<>', $id_cliente)->get();

        if (count($buscar)>0) {
            # no puede actualizar
            return redirect()-> route('empresa.index');
        } else {
            # podemos actualizar los datos
            $empresa=empresa::find($id_cliente);
            $empresa->nombre=$request->nombre;
            $empresa->tipo_documento=$request->tipo_documento;
            $empresa->ruf=$request->ruf;     
            $empresa->email=$request->email;
            $empresa->direccion=$request->direccion;
            $empresa->codigo=$request->codigo;
            $empresa->telefono=$request->telefono;
            $empresa->save();

            return redirect ()->route('empresa.index');
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
       $empresa = empresa::find($id);
        $empresa->delete();

        return back()->with('info', 'La empresa ha sido eliminado');
    }
}
