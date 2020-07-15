<?php

namespace App\Http\Controllers;

use App;
use App\proveedor;
use Bitacora;
use App\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
       return view('admin.proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('admin.proveedores.create');
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
            $proveedor= new proveedor();
            $proveedor->nombre=$request->nombre;
            $proveedor->tipo_documento=$request->tipo_documento;
            $proveedor->ruf=$request->ruf;
            $proveedor->representante=$request->representante;
            $proveedor->direccion=$request->direccion;
            $proveedor->correo=$request->correo;
            $proveedor->codigo=$request->codigo;
            $proveedor->telefono=$request->telefono;

            $proveedor->save();

             /*registrar accion en bitacora*/
            $bitacoras = new Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha registrado un nuevo proveedor';
            $bitacoras->save();
       

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
        $proveedores=proveedor::find($id_proveedor);
        return view ('admin.proveedores.edit', compact ('proveedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Repuestos  $repuestos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $buscar=proveedor::where('ruf', $request->ruf)->where('id', '<>', $id)->get();

        if (count($buscar)>0) {
            # no puede actualizar
            return redirect()-> route('proveedores.index');
        } else {
            # podemos actualizar los datos
            $proveedor=proveedor::find($id);
            $proveedor->nombre=$request->nombre;
            $proveedor->tipo_documento=$request->tipo_documento;
            $proveedor->ruf=$request->ruf;
            $proveedor->representante=$request->representante;
            $proveedor->direccion=$request->direccion;
            $proveedor->correo=$request->correo;
            $proveedor->codigo=$request->codigo;
            $proveedor->telefono=$request->telefono;
            $proveedor->save();

            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha modificado al proveedor';
            $bitacoras->save();

            flash('<i class="icon-circle-check"></i> Proveedor Actualizado satisfactoriamente!')->success()->important();
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

        $proveedor=proveedor::find($id);

        if ($proveedor->delete()) {
            flash('Registro eliminado satisfactoriamente!', 'success');

             /*registrar accion en bitacora*/
            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha Eliminado un proveedor';
            $bitacoras->save();

                return redirect()->back();

        } else {

            flash('No se pudo eliminar el registro, posiblemente esté siendo usada su información en otra área!', 'error');
                return redirect()->back();
        }

    }

     public function buscar_proveedor($proveedor)
    {
          $resultado=proveedor::where('ruf', $proveedor)->get();
        
        return $resultado;

    }

}
