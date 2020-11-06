<?php

namespace App\Exports;

use App\diario;
use App\empresa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class DiarioExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return diario::all();
        return empresa::all();
    }


     public function view():view
    {

    $diario = \DB::select('SELECT DISTINCT fecha, descripcion, diario.id AS id_d, n_asiento FROM diario, cuenta_has_diario WHERE diario.id=cuenta_has_diario.diario_id AND diario.anio=YEAR(CURRENT_DATE)');

        $n= \DB::select('SELECT n_folio FROM diario WHERE anio=YEAR(CURRENT_DATE)');

        foreach($n as $val) {
            $n_folio=$val->n_folio;
        }

        $empresa= empresa::all();
         
        $mes = date('M');
        $anio = date('Y');

    	return view('exports.diario',
    		 compact('diario','n_folio', 'empresa', 'mes', 'anio'));
    }
}

