<?php

namespace App\Exports;

use App\Inventario;
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
        return Inventario::all();
    }
     public function view():view
    {
    	$inventario = \DB::select('SELECT inventario.existencia AS inv_asis, productos.id, productos.nombre,  productos.precio, inventario.existencia, productos.unidad,  productos.stock_min, productos.stock_max, productos.descripcion, productos.codigo

        FROM productos, inventario

        WHERE inventario.productos_id = productos.id');


    	return view('exports.inventario',
    		 compact('inventario'));
    }
}

