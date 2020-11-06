<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Exports\InventarioExport;
use App\Exports\DiarioExport;
use App\Exports\MayorExport;
use App\Exports\CompraExport;
use App\Exports\VentaExport;
use App\Exports\CajaExport;
use App\Exports\ComprobacionExport;
use App\Exports\BitacoraExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class ExcelController extends Controller
{

    public function users_view() 
    {
        //dd("DSA");
        return Excel::download(new UserExport, 'users_view.xlsx');
    }

    public function inventario_view() 
    {
        //dd("DSA");
        return Excel::download(new InventarioExport, 'Inventario_view.xlsx');
    }
    

    public function bitacora_view() 
    {
        //dd("DSA");
        return Excel::download(new BitacoraExport, 'Bitacora_view.xlsx');
    }


     public function diario_view() 
    {
        //dd("DSA");
        return Excel::download(new DiarioExport, 'Diario_view.xlsx');
    }


     public function mayor_view() 
    {
        //dd("DSA");
        return Excel::download(new MayorExport, 'Mayor_view.xlsx');
    }

     public function compra_view() 
    {
        //dd("DSA");
        return Excel::download(new CompraExport, 'Compra_view.xlsx');
    }


     public function venta_view() 
    {
        //dd("DSA");
        return Excel::download(new VentaExport, 'Venta_view.xlsx');
    }

     public function caja_view() 
    {
        //dd("DSA");
        return Excel::download(new CajaExport, 'Caja_view.xlsx');
    }

     public function comprobacion_view() 
    {
        //dd("DSA");
        return Excel::download(new ComprobacionExport, 'Comprobacion_view.xlsx');
    }
}