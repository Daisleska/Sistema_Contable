<?php

namespace App\Exports;

use App\mayor;
use App\empresa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class MayorExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return mayor::all();
        return empresa::all();
    }


     public function view():view
    {
        
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
    
      $mes = date('M');
        $anio = date('Y');

    	return view('exports.mayor',
    		 compact('cuen', 'bus', 'total', 'saldos', 'empresa', 'i', 'mes', 'anio'));
    }
}

