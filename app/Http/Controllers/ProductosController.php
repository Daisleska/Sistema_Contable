<?php

namespace App\Http\Controllers;

use App\producto;
use App\inventario;
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
       $productos= producto::all();
       return view('admin.productos.index', compact('productos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('admin.productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $buscar=producto::where('codigo',$request->codigo)->where('codigo',$request->codigo)->first();

        
        if ($buscar !== null && count($buscar) > 0) {
            
            flash('<i class="icon-circle-check"></i> Ya tiene un producto registrado con este código!')->warning()->important();
            return redirect()->to('productos');

        } else {

            $producto= new producto();
            $producto->codigo=$request->codigo;
            $producto->nombre=$request->nombre;
            $producto->descripcion=$request->descripcion;
            $producto->existencia=$request->existencia;
            $producto->unidad=$request->unidad;
            $producto->precio=$request->precio;
            $producto->stock_min=$request->stock_min;
            $producto->stock_max=$request->stock_max;
            $producto->save();


           
        
            //---registro nuevo producto en inventario=======

            $inventario=new inventario();
            $inventario->existencia=$request->existencia;
            $inventario->productos_id=$producto->id;
            $inventario->save();
             
             if ($inventario->save()) {

           return redirect()->to('productos');
            }
            
               }

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
    public function edit( $id)
    {
        $producto=producto::find($id);
        return view ('admin.productos.edit', compact ('producto'));
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
             flash('<i class="icon-circle-check"></i> Ya tiene un producto registrado con este código!')->warning()->important();
            return redirect()-> route('productos.index');
        } else {
            # podemos actualizar los datos
            $producto=producto::find($id_proveedor);
            $producto->ruf=$request->ruf;
            $producto->nombre=$request->nombre;
            $producto->descripcion=$request->descripcion;
            $producto->precio=$request->precio;
            $producto->save();

            flash('<i class="icon-circle-check"></i> Producto Actualizado con satisfactoriamente!')->success()->important();

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

     public function buscar_producto($product)
    {
          return producto::where('codigo', $product)->get();

    }
  
    
}
