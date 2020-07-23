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


       $d= \DB::select('SELECT * FROM diario WHERE anio=YEAR(CURRENT_DATE) and estado="Abierto"');

       if ($d) {

        $diario = \DB::select('SELECT DISTINCT fecha, descripcion, diario.id AS id_d, n_asiento FROM diario, cuenta_has_diario WHERE diario.id=cuenta_has_diario.diario_id AND diario.anio=YEAR(CURRENT_DATE)');

        $n= \DB::select('SELECT n_folio FROM diario WHERE anio=YEAR(CURRENT_DATE)');
        
        foreach($n as $val) {
            $n_folio=$val->n_folio;
        }

      

    
       return view('process.diario.index', compact('diario', 'cuentas', 'n_folio'));

           
       }else{

         $historial= \DB::select('SELECT * FROM diario WHERE estado="Cerrado"');

        return view('process.diario.index1', compact('historial','cuentas'));

       }

       
    }


    public function abrir(){

           $ldiario=diario::select('id', 'n_folio')->take(1)->orderBy('id', 'desc')->first();
          
           if($ldiario) {
           
               
           $id=$ldiario->id+1;
           $folio=$ldiario->n_folio+1;

           $d= \DB::select ('INSERT INTO diario (`id`, `n_folio`, `anio`, `estado`) VALUES ("'.$id.'", "'.$folio.'",YEAR(CURRENT_DATE),"Abierto")');
            
          
            

           }else{

        
            $d= \DB::select ('INSERT INTO diario (`id`, `n_folio`, `anio`, `estado`) VALUES (1,1,YEAR(CURRENT_DATE),"Abierto")');


     
            }

            $cuentas=cuenta::all();
       
             $diario = \DB::select('SELECT DISTINCT fecha, descripcion, diario.id AS id_d, n_asiento FROM diario, cuenta_has_diario WHERE diario.id=cuenta_has_diario.diario_id AND diario.anio=YEAR(CURRENT_DATE)');

             $n= \DB::select('SELECT n_folio FROM diario WHERE anio=YEAR(CURRENT_DATE)');
        
             foreach($n as $val) {
              $n_folio=$val->n_folio;
              }

    
       return view('process.diario.index', compact('diario', 'cuentas', 'n_folio'));

    }

     
     public function cerrar($n_folio){

        $cuentas=cuenta::all();
        $diario = \DB::update('UPDATE diario SET estado ="Cerrado" WHERE n_folio='.$n_folio);
        $historial= \DB::select('SELECT * FROM diario WHERE estado="Cerrado"');

 
         return view('process.diario.index1', compact('cuentas', 'historial'));


     }


     public function mayor()
    {
      $cuentas=cuenta::all();

       return view('process.mayor.mayor', compact('cuentas'));
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
      

         
        //restar el valor que esta saliendo a la cuenta 

        $d_cuenta=count($request->de_cuenta);


        for ($i=0; $i <$d_cuenta ; $i++) { 

            //cosultamos 
            $cuenta = \DB::select('SELECT saldo FROM cuentas WHERE id='.$request->de_cuenta[$i].'');


            foreach ($cuenta as $val) {

            $saldo=$val->saldo;

            }

            $nuevosaldo=$saldo-$request->de_monto[$i];

     

            $cuen = \DB::update('UPDATE cuentas SET saldo ='.$nuevosaldo.' WHERE id='.$request->de_cuenta[$i].'');


        }



        //sumar el valor que esta entrando a la cuenta 

        $a_cuentas=count($request->a_cuenta);

        for ($i=0; $i <$a_cuentas ; $i++) { 
 
            //cosultamos 
            $cuenta = \DB::select('SELECT saldo FROM cuentas WHERE id='.$request->a_cuenta[$i].'');

            foreach ($cuenta as $key) {

            $saldo=$key->saldo;

            }

            $nuevosaldo=$saldo+$request->a_monto[$i];
         
            $cuen = \DB::update('UPDATE cuentas SET saldo ='.$nuevosaldo.' WHERE id='.$request->a_cuenta[$i].'');


        }
        
       

             $id = \DB::select('SELECT id FROM diario ORDER BY id  DESC LIMIT 1');
            
            foreach ($id as $val) {
            $diario_id=$val->id;
            } 

            
            //
            $l=count($request->de_cuenta);

            $lon=count($request->a_cuenta);


            $diario= \DB::select('SELECT n_asiento FROM cuenta_has_diario, diario WHERE diario.anio=YEAR(CURRENT_DATE) AND diario.n_folio=cuenta_has_diario.diario_id ORDER BY n_asiento DESC LIMIT 1');
          
           if($diario) {

           foreach ($diario as $key) {
           
            $n_asiento=$key->n_asiento+1;
            }
           }else{

            $n_asiento=1;

           }
            

            for ($i=0;$i<$l; $i++){
           
            for ($j=0;$j<$lon; $j++){
            $cuenta_has_diario=new cuenta_has_diario();
            $cuenta_has_diario->fecha=$request->fecha;
            $cuenta_has_diario->descripcion=$request->descripcion;
            $cuenta_has_diario->n_asiento=$n_asiento;
            $cuenta_has_diario->diario_id=$diario_id;
            $cuenta_has_diario->cuenta_id=$request->de_cuenta[$i];
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
            $mayor->chd_as=$n_asiento;
            $mayor->cuenta_id=$key->id;
            $mayor->debe=$request->de_monto[$i];
            $mayor->save();
                }else{
                    //Haber
            $mayor=new mayor();
            $mayor->chd_as=$n_asiento;
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
            $mayor->chd_as=$n_asiento;
            $mayor->cuenta_id=$val->id;
            $mayor->haber=$request->a_monto[$j];
            $mayor->save();
                }else{
                    //Haber
            $mayor=new mayor();
            $mayor->chd_as=$n_asiento;
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
       
        $diario = \DB::select('SELECT DISTINCT fecha, descripcion, diario.id AS id_d, n_asiento FROM diario, cuenta_has_diario WHERE diario.id=cuenta_has_diario.diario_id AND diario.anio=YEAR(CURRENT_DATE)');

        $n= \DB::select('SELECT n_folio FROM diario WHERE anio=YEAR(CURRENT_DATE)');

        foreach($n as $val) {
            $n_folio=$val->n_folio;
        }

        $empresa= empresa::all();
        $dompdf = PDF::loadView('pdf.diario', compact('diario', 'empresa', 'n_folio'));
       
        return $dompdf->stream('diario.pdf');
    }



     public function pdfmayor(){
       
       
        //Datos de cuenta
        $cuen= \DB::select('SELECT DISTINCT mayor.cuenta_id, cuentas.nombre, cuentas.codigo, cuentas.tipo FROM mayor, cuentas WHERE cuentas.id=mayor.cuenta_id AND YEAR(mayor.created_at)=YEAR(CURRENT_DATE) ORDER BY cuentas.codigo ASC');

       $i=0;
       foreach ($cuen as $key) {

           $totales= \DB::select('SELECT SUM(mayor.debe) AS totald, SUM(mayor.haber) AS totalh FROM mayor WHERE mayor.cuenta_id='.$key->cuenta_id.' AND YEAR(mayor.created_at)=YEAR(CURRENT_DATE)');
    
           foreach ($totales as $val) {


          $total[$i][0]=$key->cuenta_id;
          $total[$i][1]=$val->totald;
          $total[$i][2]=$val->totalh;
       $i++; }
       }
       
       
       
       
       $i=0;
       foreach ($cuen as $val) {

           $buscar= \DB::select('SELECT  mayor.cuenta_id, mayor.debe, mayor.haber FROM mayor WHERE cuenta_id='.$val->cuenta_id.' AND YEAR(mayor.created_at)=YEAR(CURRENT_DATE)');
           
            $saldo=0;
           foreach ($buscar as $key) {

            if ($key->debe) {
               $debe=$key->debe;
           }else{

            $debe=0;
           }
           
           if ($key->haber) {
               $haber=$key->haber;
           }else{

            $haber=0;
           }
           

           $saldo=$saldo+$debe-$haber;

           $saldos[$i][0]=$key->cuenta_id;
           $saldos[$i][1]=$saldo;

           
          $i++;
           }
       }
       
     
      


       $bus= \DB::select('SELECT DISTINCT cuenta_has_diario.fecha, cuenta_has_diario.n_asiento, diario.n_folio, mayor.cuenta_id, mayor.debe, mayor.haber, cuenta_has_diario.descripcion FROM mayor, cuenta_has_diario, diario WHERE cuenta_has_diario.n_asiento=mayor.chd_as AND YEAR(mayor.created_at)=YEAR(CURRENT_DATE) ORDER BY cuenta_has_diario.n_asiento ASC');

      
        $i=0;

        

        $empresa= empresa::all();

        $dompdf = PDF::loadView('pdf.mayor', compact('cuen', 'bus', 'total', 'saldos', 'empresa', 'i'));
       
        return $dompdf->stream('mayor.pdf');
    }


    public function mayorindividual($anio){
       
       
        //Datos de cuenta
        $cuen= \DB::select('SELECT DISTINCT mayor.cuenta_id, cuentas.nombre, cuentas.codigo, cuentas.tipo FROM mayor, cuentas WHERE cuentas.id=mayor.cuenta_id AND YEAR(mayor.created_at)='.$anio.' ORDER BY cuentas.codigo ASC');

       $i=0;
       foreach ($cuen as $key) {

           $totales= \DB::select('SELECT SUM(mayor.debe) AS totald, SUM(mayor.haber) AS totalh FROM mayor WHERE mayor.cuenta_id='.$key->cuenta_id.' AND YEAR(mayor.created_at)='.$anio.'');
    
           foreach ($totales as $val) {


          $total[$i][0]=$key->cuenta_id;
          $total[$i][1]=$val->totald;
          $total[$i][2]=$val->totalh;
       $i++; }
       }
       
       
       
       
       $i=0;
       foreach ($cuen as $val) {

           $buscar= \DB::select('SELECT  mayor.cuenta_id, mayor.debe, mayor.haber FROM mayor WHERE cuenta_id='.$val->cuenta_id.' AND YEAR(mayor.created_at)='.$anio.'');
           
            $saldo=0;
           foreach ($buscar as $key) {

            if ($key->debe) {
               $debe=$key->debe;
           }else{

            $debe=0;
           }
           
           if ($key->haber) {
               $haber=$key->haber;
           }else{

            $haber=0;
           }
           

           $saldo=$saldo+$debe-$haber;

           $saldos[$i][0]=$key->cuenta_id;
           $saldos[$i][1]=$saldo;

           
          $i++;
           }
       }
       
     
      


       $bus= \DB::select('SELECT DISTINCT cuenta_has_diario.fecha, cuenta_has_diario.n_asiento, diario.n_folio, mayor.cuenta_id, mayor.debe, mayor.haber, cuenta_has_diario.descripcion FROM mayor, cuenta_has_diario, diario WHERE cuenta_has_diario.n_asiento=mayor.chd_as AND YEAR(mayor.created_at)='.$anio.' ORDER BY cuenta_has_diario.n_asiento ASC');

      
        $i=0;

        

        $empresa= empresa::all();

        $dompdf = PDF::loadView('pdf.indimayor', compact('cuen', 'bus', 'total', 'saldos', 'empresa', 'i', 'anio'));
       
        return $dompdf->stream('indimayor.pdf');
    }



    public function individual($n_folio){

        $diario = \DB::select('SELECT DISTINCT fecha, descripcion, diario.id AS id_d, n_asiento, diario.anio FROM diario, cuenta_has_diario WHERE diario.id=cuenta_has_diario.diario_id AND diario.n_folio='.$n_folio.'');

      

        $empresa= empresa::all();

        $dompdf = PDF::loadView('pdf.individual', compact('diario', 'empresa', 'n_folio'));

       

        return $dompdf->stream('individual.pdf');

    }

    public function busquedaAjax($cuenta)
   {    
        //Datos de cuenta
        $cuen= \DB::select('SELECT mayor.cuenta_id, cuentas.nombre, cuentas.codigo, cuentas.tipo FROM mayor, cuentas WHERE cuentas.id='.$cuenta.' AND YEAR(mayor.created_at)=YEAR(CURRENT_DATE) LIMIT 1');
      
        //Debe
        $buscar= \DB::select('SELECT  mayor.cuenta_id, mayor.debe, mayor.haber FROM mayor WHERE cuenta_id='.$cuenta.' AND YEAR(mayor.created_at)=YEAR(CURRENT_DATE)');


        $descrip= \DB::select('SELECT DISTINCT descripcion, fecha FROM diario, cuenta_has_diario, mayor WHERE cuenta_has_diario.n_asiento=mayor.chd_as AND cuenta_has_diario.cuenta_id='.$cuenta.' OR cuenta_has_diario.c_destino='.$cuenta.' ORDER BY n_asiento ASC');
        

        $info= \DB::select('SELECT DISTINCT n_asiento, n_folio FROM diario, cuenta_has_diario, mayor WHERE cuenta_has_diario.n_asiento=mayor.chd_as AND cuenta_has_diario.cuenta_id='.$cuenta.' OR cuenta_has_diario.c_destino='.$cuenta.' ORDER BY n_asiento ASC');
     

           $saldo=0;
           $i=0;
          foreach ($buscar as $key) {

           if ($key->debe) {
               $debe=$key->debe;
           }else{

            $debe=0;
           }
           
           if ($key->haber) {
               $haber=$key->haber;
           }else{

            $haber=0;
           }

           $saldo=$saldo+$debe-$haber;

           $saldos[$i]=$saldo;
           $i++;
     }
        
        
     
        //return response()->json(['buscar' => $buscar, 'buscar2'=> $buscar2]);
        return $datos = array("cuen" => $cuen, "buscar" => $buscar, "saldos" => $saldos, "descrip" => $descrip, "info" => $info );
   }


 public function historial()
   {
    $historial= \DB::select('SELECT * FROM diario WHERE estado="Cerrado"');

      return view('process.diario.historial_diario', compact('historial'));
   }

   public function historial_mayor()
   {
    $historial= \DB::select('SELECT DISTINCT YEAR(created_at) AS anio FROM mayor');


      return view('process.mayor.historial_mayor', compact('historial'));
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

