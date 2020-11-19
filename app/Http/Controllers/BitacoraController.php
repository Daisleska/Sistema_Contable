<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bitacora;
use App\empresa;
use PDF;

class BitacoraController extends Controller
{
   public function index(){

    $bitacora = \DB::select('SELECT *
        FROM bitacora ORDER BY id DESC');
      $i=1;

      return view('admin/bitacoras/index', compact('bitacora', 'i'));
    

   }


       public function pdf()

    {
        $bitacora = \DB::select('SELECT *
        FROM bitacora');

         $i = 1;

         $empresa= empresa::all();
         $date = date('d-m-Y');
        $dompdf = PDF::loadView('pdf.bitacora', compact('bitacora', 'i','date', 'empresa'));
        

        return $dompdf->stream('bitacora.pdf');
    }
}
