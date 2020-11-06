<?php

namespace App\Exports;

use App\venta;
use App\empresa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class VentaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return venta::all();
        return empresa::all();
    }


     public function view():view
    { 
      
    $i=1;
    $x=1;
    $num=1;
    $anio = date('Y');
    $meses = ['Enero', 'Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

        $venta =  \DB::select('SELECT DISTINCT clientes.nombre, clientes.tipo_documento, clientes.ruf, venta.clientes_id, facturav.fecha, facturav.n_factura, facturav.total, facturav.n_control,facturav.sub_total, facturav.iva, iva.porcentaje, facturav.divisa FROM venta, clientes, facturav, iva WHERE venta.clientes_id = clientes.id AND YEAR(facturav.fecha)='.$anio);

        /*dd($venta);
*/
         //para sumar los total de facturav
        foreach ($venta as $key) {  
           $total_venta[]= $key->total;
           $total_subventa[]= $key->sub_total;
           $total_IVA_venta[]= $key->iva;
         }

         if (isset($total_venta)== false) {
                             //TOTALES
                         $total_venta=0;
                         $total_subventa=0;
                         $total_IVA_venta=0;
                      //---------------------------------------
                      }

      $empresa= empresa::all();
    
      $mes = date('M');
      $anio = date('Y');

    	return view('exports.venta',
    		 compact('venta','i', 'mesactual', 'meses','x','num','total_venta','total_subventa','total_IVA_venta', 'empresa', 'mes', 'anio'));
    }
}

