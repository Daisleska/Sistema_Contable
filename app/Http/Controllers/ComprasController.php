<?php

namespace App\Http\Controllers;

use App\compra;
use App\venta;
use App\facturac;
use App\empresa;
use PDF;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $i=1;
    $x=1;
    $num=1;
    $anio = date('Y');
    $meses = ['Enero', 'Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

         $compra =  \DB::select('SELECT DISTINCT facturac.n_factura, proveedores.nombre, proveedores.tipo_documento, proveedores.ruf, compra.proveedores_id, facturac.fecha, facturac.total, facturac.n_control,facturac.sub_total, facturac.iva, facturac.p_iva FROM compra, proveedores, facturac WHERE compra.proveedores_id = proveedores.id AND YEAR(facturac.fecha)='.$anio);

         //para sumar los total de facturac

        foreach ($compra as $key) {  
           $total_total[]= $key->total;
           $total_subtotal[]= $key->sub_total;
           $total_IVA[]= $key->iva;
         }

         if (isset($total_total)== false) {
                            //TOTALES
                         $total_total=0;
                         $total_subtotal=0;
                         $total_IVA=0;
                      }
          
        //fin

    // informacion para libro ventaas/////////////////////////
           $venta =  \DB::select('SELECT DISTINCT clientes.nombre, clientes.tipo_documento, clientes.ruf, venta.clientes_id, facturav.fecha, facturav.n_factura, facturav.total, facturav.n_control,facturav.sub_total, facturav.iva, iva.porcentaje, facturav.divisa FROM venta, clientes, facturav, iva WHERE venta.clientes_id = clientes.id AND YEAR(facturav.fecha)='.$anio);

        /*dd($venta);
*/
         //para sumar los total de facturav
        foreach ($venta as $key) {  
           $total_venta[]= $key->total;
           $total_subventa[]= $key->sub_total;
           $total_IVA_venta[]= $key->iva;
         }

         if (isset($total_venta)== false) {
                             //TOTALES
                         $total_venta=0;
                         $total_subventa=0;
                         $total_IVA_venta=0;
                      //---------------------------------------
                      }
        //FIN informacion de VEENTASS========================================================

       return view('process.compra_venta.index', compact('compra', 'venta','i', 'meses','x','num', 'total_total','total_subtotal','total_IVA'  , 'venta','total_venta','total_subventa','total_IVA_venta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function pdfcompra(){


    $i=1;
    $x=1;
    $num=1;
    $anio = date('Y');
    $meses = ['Enero', 'Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

         $compra =  \DB::select('SELECT  proveedores.nombre, proveedores.tipo_documento, proveedores.ruf, compra.proveedores_id, compra.facturac_id,  facturac.fecha, facturac.n_factura, facturac.total, facturac.n_control,facturac.sub_total, facturac.iva, facturac.p_iva

        FROM compra, proveedores, facturac

        WHERE compra.proveedores_id = proveedores.id AND compra.facturac_id = facturac.id AND YEAR(facturac.fecha)='.$anio);

         //para sumar los total de facturac

        foreach ($compra as $key) {  
           $total_total[]= $key->total;
           $total_subtotal[]= $key->sub_total;
           $total_IVA[]= $key->iva;
         }

         if (isset($total_total)== false) {
                            //TOTALES
                         $total_total=0;
                         $total_subtotal=0;
                         $total_IVA=0;
                      }
          
        $empresa = empresa::all();



        $dompdf = PDF::loadView('pdf.compra', compact('compra','i', 'meses','x','num', 'total_total','total_subtotal','total_IVA'  ,'empresa'));

        $dompdf->setPaper('A4', 'landscape');

        return $dompdf->stream('compra.pdf');

    }



    public function pdfventa(){


    $i=1;
    $x=1;
    $num=1;
    $anio = date('Y');
    $meses = ['Enero', 'Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

        $venta =  \DB::select('SELECT DISTINCT clientes.nombre, clientes.tipo_documento, clientes.ruf, venta.clientes_id, facturav.fecha, facturav.n_factura, facturav.total, facturav.n_control,facturav.sub_total, facturav.iva, iva.porcentaje, facturav.divisa FROM venta, clientes, facturav, iva WHERE venta.clientes_id = clientes.id AND YEAR(facturav.fecha)='.$anio);

        /*dd($venta);
*/
         //para sumar los total de facturav
        foreach ($venta as $key) {  
           $total_venta[]= $key->total;
           $total_subventa[]= $key->sub_total;
           $total_IVA_venta[]= $key->iva;
         }

         if (isset($total_venta)== false) {
                             //TOTALES
                         $total_venta=0;
                         $total_subventa=0;
                         $total_IVA_venta=0;
                      //---------------------------------------
                      }

     
          
        $empresa = empresa::all();



        $dompdf = PDF::loadView('pdf.venta', compact('venta','i', 'meses','x','num','total_venta','total_subventa','total_IVA_venta','empresa'));
        $dompdf->setPaper('A4', 'landscape');
        return $dompdf->stream('venta.pdf');

    }
}
