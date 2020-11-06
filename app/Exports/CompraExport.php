<?php

namespace App\Exports;

use App\compra;
use App\empresa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class CompraExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return compra::all();
        return empresa::all();
    }


     public function view():view
    { 
      $i=1;
    $x=1;
    $num=1;
    $anio = date('Y');
    $meses = ['Enero', 'Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

         $compra =  \DB::select('SELECT  proveedores.nombre, proveedores.tipo_documento, proveedores.ruf, compra.proveedores_id, compra.facturac_id,  facturac.fecha, facturac.n_factura, facturac.total, facturac.n_control,facturac.sub_total, facturac.iva, facturac.p_iva

        FROM compra, proveedores, facturac

        WHERE compra.proveedores_id = proveedores.id AND compra.facturac_id = facturac.id AND YEAR(facturac.fecha)='.$anio);

         //para sumar los total de facturac

        foreach ($compra as $key) {  
           $total_total[]= $key->total;
           $total_subtotal[]= $key->sub_total;
           $total_IVA[]= $key->iva;
         }

         if (isset($total_total)== false) {
                            //TOTALES
                         $total_total=0;
                         $total_subtotal=0;
                         $total_IVA=0;
                      }
          

      $empresa= empresa::all();
    
      $mes = date('M');
      $anio = date('Y');

    	return view('exports.compra',
    		 compact('compra','i', 'mesactual', 'meses','x','num','costo_t', 'total_total','total_subtotal','total_IVA', 'empresa', 'mes', 'anio'));
    }
}

