<?php

namespace App\Exports;

use App\cuentas;
use App\mayor;
use App\empresa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class ComprobacionExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {  
        return mayor::all();
        return cuentas::all();
        return empresa::all();
    }


     public function view():view
    { 

      $a=\DB::select('SELECT DISTINCT YEAR( mayor.created_at) AS year FROM mayor');

        $anio = date('Y');
        $comprobacion= \DB::select('SELECT DISTINCT cuentas.nombre, cuentas.tipo, mayor.cuenta_id, cuentas.codigo FROM cuentas, mayor WHERE mayor.cuenta_id=cuentas.id AND YEAR(mayor.created_at)='.$anio.' ORDER BY cuentas.tipo ASC');
        $cuenta=count($comprobacion);
        $i=1;

        foreach ($comprobacion as $val) {      
        
        $res= \DB::select('SELECT SUM(mayor.debe) AS cuenta_debe,  SUM(mayor.haber) AS cuenta_haber FROM mayor WHERE mayor.cuenta_id='.$val->cuenta_id.' AND YEAR(mayor.created_at)='.$anio.'');


        foreach ($res as $key) {      
        $res_cuenta[$i][0]=$key->cuenta_debe;
        $res_cuenta[$i][1]=$key->cuenta_haber;

        $saldos[]=$res_cuenta[$i][0] - $res_cuenta[$i][1]; 
        }
        $i++;

        }//

        $totales_C= \DB::select('SELECT SUM(mayor.debe) AS debe, SUM(mayor.haber) AS haber FROM  mayor WHERE YEAR(mayor.created_at)='.$anio.'');
    
      $empresa= empresa::all();
    

    	return view('exports.comprobacion',
    		 compact('comprobacion', 'totales_C','res_cuenta', 'saldos', 'empresa'));
    }
}

