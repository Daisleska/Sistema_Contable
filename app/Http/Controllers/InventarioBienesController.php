<?php

namespace App\Http\Controllers;

use App;
use App\Bienes;
use App\Empleado;
use App\Bitacora;
use App\InventarioBienes;
use App\Alert;
use App\empresa;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventarioBienesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $empleado = \DB::select('SELECT * FROM `empleado`');
       $bienes = \DB::select('SELECT * FROM `bienes`');

       $inventario = \DB::select('SELECT DISTINCT empleado.id, empleado.nombres, empleado.apellidos, inventariobienes.id as n_inven, inventariobienes.fecha, inventariobienes.status, bienes.codigo, bienes.nombre  FROM inventariobienes, empleado, bienes WHERE inventariobienes.empleado_id= empleado.id AND inventariobienes.bienes_id=bienes.id');

        $personal = \DB::select('SELECT DISTINCT empleado.id, empleado.nombres, empleado.apellidos FROM inventariobienes, empleado WHERE inventariobienes.empleado_id= empleado.id;');

       return view('process.inventariobienes.index', compact('inventario', 'empleado', 'bienes', 'personal'));
    }




  public function bienes_add($id)
    {
    
        return $bienes=bienes::where('id',$id)->get(); 
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function asignar_personas(Request $request)
    {
         $coun=count($request->bienes_id);

         

         for ($i=0; $i <$coun ; $i++) {

            $cons = \DB::select('SELECT * FROM inventariobienes WHERE bienes_id='.$request->bienes_id[$i][0]);

            if(count($cons)>0){


            }else{

         $consulta = \DB::select('SELECT * FROM inventariobienes WHERE bienes_id='.$request->bienes_id[$i][0].' AND empleado_id='.$request->empleado_id);

            if (count($consulta)>0) {
            }else{
        

        $inventariobienes= new inventariobienes();
        $inventariobienes->fecha=$request->fecha;
        $inventariobienes->empleado_id=$request->empleado_id;
        $inventariobienes->bienes_id=$request->bienes_id[$i][0];
        $inventariobienes->save(); 

        



}
    }
}

               

    $i++;

        
      return redirect()->to('inventariobienes');        
            

   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function asignar_departamentos()
    {
        //
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




    public function inventariob_personas_pdf(){

        $inventariobienes = \DB::select('SELECT DISTINCT empleado.id, empleado.nombres, empleado.apellidos, inventariobienes.id as n_inven, inventariobienes.fecha, inventariobienes.status, bienes.codigo, bienes.nombre  FROM inventariobienes, empleado, bienes WHERE inventariobienes.empleado_id= empleado.id AND inventariobienes.bienes_id=bienes.id');

        $i = 1;

        $empresa= empresa::all();
        $date = date('d-m-Y');
        $dompdf = PDF::loadView('pdf.inventariob_personas', compact('inventariobienes', 'i','date', 'empresa'));

        return $dompdf->stream('inventariob_personas.pdf');

    }


    public function asignar_acta(Request $request)
    {

        $asignacion = \DB::select('SELECT DISTINCT empleado.nombres, empleado.apellidos, empleado.tipo_doc, empleado.cedula, empleado.tipo_personal, empleado.adscripcion, empleado.cargo, empleado.sexo, inventariobienes.fecha FROM empleado, inventariobienes WHERE inventariobienes.empleado_id=empleado.id AND empleado.id='.$request->empleado_id);

        $bienes = \DB::select('SELECT DISTINCT bienes.codigo, bienes.nombre, bienes.valor_u FROM inventariobienes, bienes WHERE inventariobienes.bienes_id=bienes.id AND inventariobienes.empleado_id='.$request->empleado_id);


         $admin = \DB::select('SELECT nombres, apellidos, tipo_doc, cedula, cargo FROM empleado WHERE tipo_personal="Alto Nivel" AND adscripcion="Gerencia de Administración y Finanzas"');

         //$delegado = \DB::select('SELECT nombres, apellidos, tipo_doc, cedula, cargo FROM empleado WHERE cargo="Delegado de Bienes Publicos"');

        $empresa= empresa::all();
        $dompdf = PDF::loadView('pdf.inventarioacta_personas', compact( 'empresa', 'asignacion', 'admin', 'bienes'));

        return $dompdf->stream('inventariacta_personas.pdf');

    }
}
