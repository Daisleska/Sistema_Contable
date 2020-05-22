<?php

namespace App\Http\Controllers;

use App;
use App\diario;
use App\cuenta;
use App\cuenta_has_diario;
use Bitacora;
use App\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cuentas=cuenta::all();

       $diario = \DB::select('SELECT * FROM diario, cuentas, cuenta_has_diario WHERE cuenta_has_diario.cuenta_id=cuentas.id AND cuenta_has_diario.diario_id=diario.id');
      /* dd($diario);*/

       return view('process.diario.index', compact('diario', 'cuentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      /*  dd($request);*/
            $diario= new diario();
            $diario->fecha=$request->fecha;
            $diario->descripcion=$request->descripcion;
            $diario->monto=$request->monto;
            $diario->debe_haber=$request->debe_haber;
            $diario->save();

            $cuenta_has_diario=new cuenta_has_diario();
            $cuenta_has_diario->cuenta_id=$request->cuenta_id;
            $cuenta_has_diario->diario_id=$request->diario_id;
            $cuenta_has_diario->de_cuentas=$request->de_cuentas;
            $cuenta_has_diario->a_cuentas=$request->a_cuentas;
            $cuenta_has_diario->save();

            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha realizado un registro en libro diario';
            $bitacoras->save();
       flash('<i class="icon-circle-check"></i> Cliente registrado exitosamente
                ')->success()->important();
           return redirect()->to('diario');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
