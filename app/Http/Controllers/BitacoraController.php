<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bitacora;

class BitacoraController extends Controller
{
   public function index(){

      $bitacora = Bitacora::orderBy('id', 'DESC')->paginate();
      $i=1;

      return view('admin/bitacoras/index', compact('bitacora', 'i'));
    

   }
}
