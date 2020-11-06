<?php

namespace App\Exports;

use App\inventario;
use App\empresa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class InventarioExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return inventario::all();     
        return empresa::all();
    }
     public function view():view
    {
    	$inventario = \DB::select('SELECT inventario.existencia AS inv_asis, productos.id, productos.nombre,  productos.precio, inventario.existencia, productos.unidad,  productos.stock_min, productos.stock_max, productos.descripcion, productos.codigo

        FROM productos, inventario

        WHERE inventario.productos_id = productos.id');
        
        $empresa= empresa::all();
        $mes = date('M');
        $anio = date('Y');


    	return view('exports.inventario',
    		 compact('inventario', 'empresa', 'mes', 'anio'));
    }
}

