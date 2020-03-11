<?php

namespace App\Http\Controllers;

use App\producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = producto::all();
       return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('productos.create');
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
            $producto= new producto();
            $producto->codigo=$request->codigo;
            $producto->nombre=$request->nombre;
            $producto->descripcion=$request->descripcion;
            $producto->precio=$request->precio;
            $producto->save();

           return redirect()->to('productos');
       /* }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Repuestos  $repuestos
     * @return \Illuminate\Http\Response
     */
    public function show(productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Repuestos  $repuestos
     * @return \Illuminate\Http\Response
     */
    public function edit( $id_producto)
    {
        $producto=producto::find($id_producto);
        return view ('productos.edit', compact ('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Repuestos  $repuestos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_producto)
    {
         $buscar=producto::where('codigo', $request->codigo)->where('id', '<>', $id_producto)->get();

        if (count($buscar)>0) {
            # no puede actualizar
            return redirect()-> route('productos.index');
        } else {
            # podemos actualizar los datos
            $producto=producto::find($id_proveedor);
            $producto->codigo=$request->codigo;
            $producto->nombre=$request->nombre;
            $producto->descripcion=$request->descripcion;
            $producto->precio=$request->precio;
            $producto->save();

            return redirect ()->route('productos.index');
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
         $producto = producto::find($id);
        $producto->delete();

        return back()->with('info', 'El producto ha sido eliminado');
    }
}
