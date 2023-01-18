<?php

namespace App\Http\Controllers;

use App;
use App\Bienes;
use App\Empleado;
use App\Bitacora;
use App\BienesInventario;
use App\Alert;
use App\empresa;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BienesInventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $departamento = \DB::select('SELECT * FROM `departamento`');
       $bienes = \DB::select('SELECT * FROM `bienes`');

       $inventario = \DB::select('SELECT DISTINCT departamento.id, departamento.tipo, departamento.nombre, bienesinventario.id as n_inven, bienesinventario.fecha, bienesinventario.status, bienes.codigo, bienes.nombre  FROM bienesinventario, departamento, bienes WHERE bienesinventario.departamento_id= departamento.id AND bienesinventario.bienes_id=bienes.id');

       return view('process.bienesinventario.index', compact('inventario', 'departamento', 'bienes'));
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
        //
    }


    public function bienesinventario_add($id)
    {
    
        return $bienes=bienes::where('id',$id)->get(); 
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
     public function asignar_departamentos(Request $request)
    {
         $coun=count($request->bienes_id);

         

         for ($i=0; $i <$coun ; $i++) {

            $cons = \DB::select('SELECT * FROM bienesinventario WHERE bienes_id='.$request->bienes_id[$i][0]);

            if(count($cons)>0){


            }else{

         $consulta = \DB::select('SELECT * FROM bienesinventario WHERE bienes_id='.$request->bienes_id[$i][0].' AND departamento_id='.$request->departamento_id);

            if (count($consulta)>0) {
            }else{
        

        $bienesinventario= new bienesinventario();
        $bienesinventario->fecha=$request->fecha;
        $bienesinventario->departamento_id=$request->departamento_id;
        $bienesinventario->bienes_id=$request->bienes_id[$i][0];
        $bienesinventario->save(); 

        



}
    }
}

               

    $i++;

        
      return redirect()->to('bienesinventario');        
            

   
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


        public function busquedaAjax($departamento)
     {    


   return $inven = \DB::select('SELECT departamento.id, departamento.tipo, departamento.nombre,bienesinventario.id as id_inventario, bienesinventario.fecha, bienes.codigo, bienes.valor_u, bienes.nombre as bien FROM departamento, bienesinventario, bienes WHERE bienesinventario.departamento_id='.$departamento.' AND departamento.id=bienesinventario.departamento_id AND bienesinventario.bienes_id=bienes.id');
        
       
   }



   public function asignar_departamento($id_inventario){

        
      

        $empresa= empresa::all();

        $dompdf = PDF::loadView('pdf.bienesinventario', compact( 'empresa'));

       

        return $dompdf->stream('bienesinventario.pdf');

    }



    public function bienesinvendepart($id){

    $autoridad = \DB::select('SELECT nombres, apellidos, tipo_doc, cedula, sexo, cargo FROM `empleado` WHERE cargo="MAXIMA AUTORIDAD"'); 
      
    $empresa= empresa::all();
    
    $inven = \DB::select('SELECT departamento.id, departamento.tipo, departamento.nombre,bienesinventario.id as id_inventario, bienesinventario.fecha, bienes.codigo, bienes.cantidad,bienes.grupo, bienes.sub_grupo, bienes.sec, bienes.valor_u, bienes.nombre as bien FROM departamento, bienesinventario, bienes WHERE bienesinventario.departamento_id='.$id.' AND departamento.id=bienesinventario.departamento_id AND bienesinventario.bienes_id=bienes.id');

     $nom = \DB::select('SELECT departamento.id, departamento.tipo, departamento.nombre FROM departamento, bienesinventario, bienes WHERE bienesinventario.departamento_id='.$id.' AND departamento.id=bienesinventario.departamento_id AND bienesinventario.bienes_id=bienes.id LIMIT 1');

     $info = \DB::select('SELECT bienesinventario.fecha FROM bienesinventario WHERE bienesinventario.departamento_id='.$id.'');

    foreach($inven as $key)
    {
    
    $var=$key->tipo.' de '.$key->nombre;
    }

    $respon = \DB::select('SELECT empleado.id, empleado.nombres as respo_nombre, empleado.apellidos as respo_apellido FROM empleado, resoluciones WHERE empleado.adscripcion="'.$var.'" AND resoluciones.empleado_id=empleado.id');



       
        $dompdf = PDF::loadView('pdf.bienesinvendepart', compact('inven', 'empresa', 'autoridad', 'respon', 'info', 'nom'))->setPaper('a4', 'landscape');
        return $dompdf->stream('bienesinvendepart.pdf');

    }




     public function actaresponsablesporuso($id){

    $autoridad = \DB::select('SELECT nombres, apellidos, tipo_doc, cedula, sexo, cargo FROM `empleado` WHERE cargo="MAXIMA AUTORIDAD"'); 
      
    $empresa= empresa::all();
    
    $inven = \DB::select('SELECT departamento.id, departamento.tipo, departamento.nombre,bienesinventario.id as id_inventario, bienesinventario.fecha FROM departamento, bienesinventario, bienes WHERE bienesinventario.departamento_id='.$id.' AND departamento.id=bienesinventario.departamento_id AND bienesinventario.bienes_id=bienes.id LIMIT 1');

    foreach($inven as $key)
    {
    
    $var=$key->tipo.' de '.$key->nombre; 
    }

    $respon = \DB::select('SELECT empleado.id, empleado.sexo, empleado.tipo_doc, empleado.cedula, empleado.cargo, empleado.nombres, empleado.apellidos, empleado.adscripcion, resoluciones.n_resolucion, resoluciones.fecha as fecha_reso, resoluciones.condicion, resoluciones.cargo as tipocargo FROM empleado, resoluciones WHERE empleado.adscripcion="'.$var.'" AND resoluciones.empleado_id=empleado.id');


    $admin = \DB::select('SELECT empleado.id, empleado.tipo_doc, empleado.cedula, empleado.cargo, empleado.nombres, empleado.apellidos, empleado.adscripcion, resoluciones.n_resolucion, resoluciones.fecha as fecha_reso, resoluciones.condicion, resoluciones.cargo as tipocargo FROM empleado, resoluciones WHERE empleado.adscripcion="Gerencia de Administración y Finanzas" AND resoluciones.empleado_id=empleado.id');


  print_r($admin);
       
        $dompdf = PDF::loadView('pdf.responsablesporusoacta', compact('inven', 'empresa', 'autoridad', 'respon', 'admin'));
        return $dompdf->stream('responsablesporusoacta.pdf');

    }



    

     
 }       

