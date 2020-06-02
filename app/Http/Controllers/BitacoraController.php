<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bitacora;
use App\empresa;
use PDF;

class BitacoraController extends Controller
{
   public function index(){

      $bitacora = Bitacora::orderBy('id', 'DESC')->paginate();
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
        $dompdf->setPaper('a4', 'landscape');

        return $dompdf->stream('bitacora.pdf');
    }
}
