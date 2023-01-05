<?php

namespace App\Http\Controllers;
use App;
use App\Bienes;
use App\Bitacora;
use App\Alert;
use App\empresa;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BienesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $bienes= bienes::all();
       return view('admin.bienes.index', compact('bienes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view ('admin.bienes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buscar=bienes::where('codigo',$request->codigo)->where('codigo',$request->codigo)->first();

        
        if ($buscar !== null && count($buscar) > 0) {
            
            flash('<i class="icon-circle-check"></i>¡Ya tiene un Bien Público registrado con este N° de Ident!')->warning()->important();
            return redirect()->to('bienes');

        } else {

            $bienes= new bienes();
            $bienes->nombre=$request->nombre;
            $bienes->codigo=$request->codigo;
            $bienes->cantidad=$request->cantidad;
            $bienes->grupo=$request->grupo;
            $bienes->sub_grupo=$request->sub_grupo;
            $bienes->sec=$request->sec;
            $bienes->valor_u=$request->valor_u;
            $bienes->save();



            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha registrado un Bien Público';
            $bitacoras->save();
            flash('<i class="icon-circle-check"></i>¡Bien Público registrado exitosamente!')->success()->important();
           return redirect()->to('bienes');

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
    public function edit($id_bienes)
    {
        $bienes=bienes::find($id_bienes);
        return view ('admin.bienes.edit', compact ('bienes'));
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
        $buscar=bienes::where('codigo', $request->codigo)->where('id', '<>', $id)->get();

        if (count($buscar)>0) {
             
            return redirect()-> route('bienes.index');
        } else {
            # podemos actualizar los datos
        $bienes=bienes::find($id);
        $bienes->nombre=$request->nombre;
        $bienes->codigo=$request->codigo;
        $bienes->cantidad=$request->cantidad;
        $bienes->grupo=$request->grupo;
        $bienes->sub_grupo=$request->sub_grupo;
        $bienes->sec=$request->sec;
        $bienes->valor_u=$request->valor_u;
        $bienes->save();

            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha modificado un Bien Público';
            $bitacoras->save();


            flash('<i class="icon-circle-check"></i>¡Bien Público actualizado satisfactoriamente!')->success()->important();
            return redirect ()->to('bienes');
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
       $bienes = bienes::find($id);
       $bienes->delete();  

      
        $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha Eliminado un Bien Público';
            $bitacoras->save();

        flash('¡Registro eliminado satisfactoriamente!', 'success');


        return back()->with('info', 'El Bien Público ha sido eliminado');
    
    }



    public function pdf(){

        $bienes= bienes::all();

        $i = 1;

        $empresa= empresa::all();
        $date = date('d-m-Y');
        $dompdf = PDF::loadView('pdf.bienes', compact('bienes', 'i','date', 'empresa'));

        return $dompdf->stream('bienes.pdf');

    }
}
