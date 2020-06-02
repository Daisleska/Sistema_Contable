<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Exports\InventarioExport;
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
        return Excel::download(new BitacoraExport, 'Bitacora
            _view.xlsx');
    }
}