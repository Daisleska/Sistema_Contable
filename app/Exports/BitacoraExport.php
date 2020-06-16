<?php

namespace App\Exports;

use App\Bitacora;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class BitacoraExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Bitacora::all();
    }
     public function view():view
    {
    $bitacora = Bitacora::orderBy('id', 'DESC')->paginate();
     $i=1;

    	return view('exports.bitacora',
    		 compact('bitacora', 'i'));
    }
}

