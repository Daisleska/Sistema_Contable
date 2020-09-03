<?php

namespace App\Http\Controllers;

use App;
use App\producto;
use App\inventario;
use App\Bitacora;
use App\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            
            flash('<i class="icon-circle-check"></i>¡Ya tiene un producto registrado con este código!')->warning()->important();
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


            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha registrado un nuevo producto';
            $bitacoras->save();
            flash('<i class="icon-circle-check"></i>¡Producto registrado exitosamente!')->success()->important();
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
    public function edit( $id_producto)
    {
        $productos=producto::find($id_producto);
        return view ('admin.productos.edit', compact ('productos'));
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
         $buscar=producto::where('codigo', $request->codigo)->where('id', '<>', $id)->get();

        if (count($buscar)>0) {
             
            return redirect()-> route('productos.index');
        } else {
            # podemos actualizar los datos
            $producto=producto::find($id);
        $producto->codigo=$request->codigo;
        $producto->nombre=$request->nombre;
        $producto->descripcion=$request->descripcion;
        $producto->existencia=$request->existencia;
        $producto->unidad=$request->unidad;
        $producto->precio=$request->precio;
        $producto->stock_min=$request->stock_min;
        $producto->stock_max=$request->stock_max;
            $producto->save();

            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha modificado un producto';
            $bitacoras->save();


            flash('<i class="icon-circle-check"></i>¡Producto actualizado satisfactoriamente!')->success()->important();
            return redirect ()->to('productos');
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

      
        $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha Eliminado un Producto';
            $bitacoras->save();

        flash('¡Registro eliminado satisfactoriamente!');


        return back()->with('info', 'El producto ha sido eliminado');
    
           
    }

     public function buscar_producto($product)
    {
          return producto::where('codigo', $product)->get();

    }
  
    
}
