<?php

namespace App\Http\Controllers;

use App;
use App\diario;
use App\empresa;
use App\cuenta;
use App\mayor;
use App\cuenta_has_diario;
use Bitacora;
use PDF;
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

       $diario = \DB::select('SELECT DISTINCT fecha, descripcion, diario.id AS id_d FROM diario, cuenta_has_diario WHERE diario.id=cuenta_has_diario.diario_id');

       $i=1;

    
       return view('process.diario.index', compact('diario', 'cuentas', 'i'));
    }

     public function mayor()
    {
      $cuentas=cuenta::all();

       return view('process.diario.mayor', compact('cuentas'));
    }

      public function balance()
    {
      

       return view('process.diario.balance');
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

         
             $lon=count($request->de_monto);
             for ($i=0; $i < $lon ; $i++) { 

                $montos[]=$request->de_monto[$i];
            }  

            $monto=array_sum($montos);
            


            $diario= new diario();
            $diario->fecha=$request->fecha;
            $diario->descripcion=$request->descripcion;
            $diario->monto=$monto;//¿?
            $diario->save();

        //restar el valor que esta saliendo a la cuenta 

        //$cuenta = \DB::select('SELECT saldo FROM cuentas WHERE id='.$request->de_cuentas.'');

        
        //foreach ($cuenta as $val) {
        //$saldo=$val->saldo;
        //}
         
        //$nuevosaldo=$saldo-$request->monto;

        //$cuenta = \DB::select('UPDATE cuentas SET saldo ='.$nuevosaldo.' WHERE id='.$request->de_cuentas.'');


        //sumar el valor que esta entrando a la cuenta 
        
        //$cuen = \DB::select('SELECT saldo FROM cuentas WHERE id='.$request->a_cuentas.'');

        
        //foreach ($cuen as $val) {
        //$saldo=$val->saldo;
        //}
         
        //$saldonuevo=$saldo+$request->monto;

        //$cuentas = \DB::select('UPDATE cuentas SET saldo ='.$saldonuevo.' WHERE id='.$request->a_cuentas.'');


             $id = \DB::select('SELECT id FROM diario ORDER BY id  DESC LIMIT 1');
            
            foreach ($id as $val) {
            $diario_id=$val->id;
            } 

            
            //
            $l=count($request->de_cuenta);

            $lon=count($request->a_cuenta);
            

            for ($i=0;$i<$l; $i++){
           
            for ($j=0;$j<$lon; $j++){
            $cuenta_has_diario=new cuenta_has_diario();
            $cuenta_has_diario->cuenta_id=$request->de_cuenta[$i];
            $cuenta_has_diario->diario_id=$diario_id;
            $cuenta_has_diario->c_destino=$request->a_cuenta[$j];
            $cuenta_has_diario->de_monto=$request->de_monto[$i];
            $cuenta_has_diario->a_monto=$request->a_monto[$j];
            $cuenta_has_diario->save();


            }
             
            }


            //Para de cuentas 
            for ($i=0; $i<$l ; $i++) { 

            $consul= \DB::select('SELECT id, tipo FROM cuentas WHERE id='.$request->de_cuenta[$i].'');

            foreach ($consul as $key) {
                
                if ($key->tipo=="activo" || $key->tipo=="egreso") {
                   //Debe
            $mayor=new mayor();
            $mayor->cuenta_id=$key->id;
            $mayor->debe=$request->de_monto[$i];
            $mayor->save();
                }else{
                    //Haber
            $mayor=new mayor();
            $mayor->cuenta_id=$key->id;
            $mayor->debe=$request->de_monto[$i];
            $mayor->save();
                }
            }
            } 


            //Para a cuentas 
            for ($j=0; $j<$lon ; $j++) { 
            
            $consulta= \DB::select('SELECT id, tipo FROM cuentas WHERE id='.$request->a_cuenta[$j].'');
            
            
            foreach ($consulta as $val) {
                
                if ($val->tipo=="activo" || $val->tipo=="egreso") {
                   //Debe
            $mayor=new mayor();
            $mayor->cuenta_id=$val->id;
            $mayor->haber=$request->a_monto[$j];
            $mayor->save();
                }else{
                    //Haber
            $mayor=new mayor();
            $mayor->cuenta_id=$val->id;
            $mayor->haber=$request->a_monto[$j];
            $mayor->save();
                }
            }
            } 



            $bitacoras = new App\Bitacora;

            $bitacoras->user =  Auth::user()->name;
            $bitacoras->lastname =  Auth::user()->name;
            $bitacoras->role =  Auth::user()->user_type;
            $bitacoras->action = 'Ha realizado un registro en libro diario';
            $bitacoras->save();
       flash('<i class="icon-circle-check"></i> registro exitoso
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


     public function pdf()

    {
        $diario = \DB::select('SELECT DISTINCT fecha, descripcion, diario.id AS id_d FROM diario, cuenta_has_diario WHERE diario.id=cuenta_has_diario.diario_id');

        $i=1;
        $empresa= empresa::all();
        $dompdf = PDF::loadView('pdf.diario', compact('diario', 'empresa', 'i'));
        $dompdf->setPaper('a4', 'landscape');

        return $dompdf->stream('diario.pdf');
    }

    public function busquedaAjax($cuenta)
   {    
        //Datos de cuenta
        $cuen= \DB::select('SELECT mayor.cuenta_id, cuentas.nombre, cuentas.codigo, cuentas.tipo FROM mayor, cuentas WHERE mayor.cuenta_id='.$cuenta.' AND cuentas.id='.$cuenta.' LIMIT 1');

        //Debe
        $buscar= \DB::select('SELECT  mayor.cuenta_id, mayor.debe FROM mayor WHERE cuenta_id='.$cuenta.' AND mayor.debe IS NOT NULL');
         
         //haber
        $buscar2= \DB::select('SELECT  mayor.cuenta_id, mayor.haber FROM mayor WHERE cuenta_id='.$cuenta.' AND mayor.haber IS NOT NULL');

       
       
        //return response()->json(['buscar' => $buscar, 'buscar2'=> $buscar2]);
        return $datos = array("cuen" => $cuen, "buscar" => $buscar, "buscar2" => $buscar2 );
   }




   public function busqueda($anio)
   {
        //$activo= \DB::select('');

        //SELECT DISTINCT cuentas.codigo, cuentas.nombre, mayor.debe FROM mayor, cuentas WHERE cuentas.tipo="activo" falta por fecha y que no se repitan las cuentas 

        //$pasivo= \DB::select('');
       
          //return $a=20;
       
        //return response()->json(['buscar' => $buscar, 'buscar2'=> $buscar2]);
        //return $datos = array("buscar" => $activo, "buscar2" => $pasivo );
   }
}
