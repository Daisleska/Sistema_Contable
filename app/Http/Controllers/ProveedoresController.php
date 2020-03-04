<?php

namespace App\Http\Controllers;

use App\proveedor;
use Illuminate\Http\Request;


class ProveedoresController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = proveedor::all();
       return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* dd($request);*/
       /* $buscar=Repuestos::where ('descripcion', $require->descripcion)->get();
        if (count($buscar)>0) {
            # no permitir registrar
            return redirect()->back();
        } else {*/
            # permitir regitrar
            $proveedor= new proveedores();
            $proveedor->tipo_documento=$request->tipo_documento;
            $proveedor->codigo=$request->codigo;
            $proveedor->nombre=$request->nombre;
            $proveedor->correo=$request->correo;
            $proveedor->direccion=$request->direccion;
            $proveedor->telefono=$request->telefono;
            $proveedor->save();

           return redirect()->to('proveedores');
       /* }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Repuestos  $repuestos
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedores $proveedores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Repuestos  $repuestos
     * @return \Illuminate\Http\Response
     */
    public function edit( $id_proveedor)
    {
        $proveedor=proveedor::find($id_proveedor);
        return view ('proveedores.edit', compact ('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Repuestos  $repuestos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_proveedor)
    {
         $buscar=proveedor::where('codigo', $request->codigo)->where('id', '<>', $id_proveedor)->get();

        if (count($buscar)>0) {
            # no puede actualizar
            return redirect()-> route('proveedores.index');
        } else {
            # podemos actualizar los datos
            $proveedor=proveedor::find($id_proveedor);
            $proveedor->codigo=$request->codigo;
            $proveedor->nombre=$request->nombre;
            $proveedor->correo=$request->correo;
            $proveedor->direccion=$request->direccion;
            $proveedor->telefono=$request->telefono;
            $proveedor->save();

            return redirect ()->route('proveedores.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Repuestos  $repuestos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $proveedor = proveedor::find($id);
        $proveedor->delete();

        return back()->with('info', 'El proveedor ha sido eliminado');
    }
}
