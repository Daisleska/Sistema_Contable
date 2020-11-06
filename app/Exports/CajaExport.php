<?php

namespace App\Exports;

use App\caja;
use App\empresa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class CajaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return caja::all();     
        return empresa::all();
    }
     public function view():view
    {
    	
        
        $empresa= empresa::all();
        


    	return view('exports.caja',
    		 compact('empresa'));
    }
}

