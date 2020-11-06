<?php

  $fecha = date('Y-m-d');
// TODAS LAS VARIABLES TIENEN SU NOMBRE CORRESPONDIENTE 
  if ($ventas>0) {
   $ventas=array_sum($ventas);
   $subtotal_venta=array_sum($subtotal_venta);
   $iva_venta=array_sum($IVA_venta);
  }else{
   $ventas=0;
   $subtotal_venta=0;
   $iva_venta=0;
  }
  $venta_neta= $ventas - $iva_venta;

  if ($compras>0) {
   $compras=array_sum($compras);
   $subtotal_compra=array_sum($subtotal_compra);
   $iva_compra=array_sum($IVA_compra);
  }else{
   $compras=0;
   $subtotal_compra=0;
   $iva_compra=0;
  }
  $compras_brutas= $subtotal_compra;

  if ($inventario_inicial>0) {
   $inventario_inicial= $inventario_inicial;
  }else{
   $inventario_inicial = 0 ;
  }

  if ($inventario_final>0) {
   $inventario_final= $inventario_final;
  }else{
   $inventario_final = 0 ;
  }

  $compras_neta = $compras_brutas - $iva_compra;
  $mercancia_disponible = $compras_brutas + $inventario_inicial;
  $costo_venta = $mercancia_disponible - $inventario_final;
  if ($venta_neta >= $costo_venta) {
   $utilidad_bruta_venta = $venta_neta - $costo_venta;   
  }elseif($venta_neta < $costo_venta){
   $utilidad_bruta_venta = $costo_venta - $venta_neta  ;  
  }

  if (isset($informacion)) {
    $fletes = $informacion[0]->valor;
    $otros_gastos_ventas= $informacion[1]->valor;
    $sueldos_salarios = $informacion[2]->valor;
    $gastos_oficina = $informacion[3]->valor;
    $gastos_arrendamiento = $informacion[4]->valor;
    $seguro_social = $informacion[5]->valor;
    $otros_ingresos = $informacion[6]->valor;
    $otros_egresos = $informacion[7]->valor;
  }else{
    $sueldos_salarios = 0;
    $gastos_oficina = 0;
    $gastos_arrendamiento = 0;
    $seguro_social = 0;
    $otros_ingresos = 0;
    $otros_egresos = 0;
    $fletes = 0;
    $otros_gastos_ventas = 0;
  }
  $impuesto_ventas = 0;
  $total_ventas = $impuesto_ventas + $fletes + $otros_gastos_ventas;
  $total_administracion = $sueldos_salarios + $gastos_oficina + $gastos_arrendamiento;
  $total_gastos_op = $total_administracion + $total_ventas;
  $utilidad_neta_operacion =  $utilidad_bruta_venta - $total_gastos_op;

  $ingresos_menos_egresos = $otros_ingresos - $otros_egresos;

  $utilidad_neta_ejercicio = $utilidad_neta_operacion - $ingresos_menos_egresos;

$monto= $utilidad_neta_ejercicio;
if ($monto>0) {
  utilidad_neta($monto);
}
?>
   <table style="border-color:  black; border: 1px;  " border="1" class="table dt-responsive nowrap">
       <thead >  
         <tr>                     
            <h5 style="text-align: center; color: black; font-size: 12px;">Estado De Ganancias Y Perdidas <br> Ejercicio Del {{$inicio}} Al {{$final}}</h5>
            <br>
          </tr> 
       </thead>
      <tbody style="text-align: center; font-size: 12px;">


          <tr>
              <td style=" color: black;">Ventas</td>
              <td>{{number_format( $ventas, 2,',','.')}}</td>       
              <td></td>
              <td></td>         
          </tr>
          <tr>
              <td>IVA</td>
              <td>{{number_format( $iva_venta, 2,',','.')}}</td>       
              <td></td>
              <td></td>         
          </tr>
          <tr>
              <td>Venta Neta</td>
              <td></td>       
              <td></td>
              <td>{{number_format( $venta_neta, 2,',','.')}}</td>         
          </tr>
          <tr>
              <td style=" color: black;">Costo de Ventas:</td>
              <td><hr></td>       
              <td><hr></td>
              <td><hr></td>         
          </tr>
           <tr>
              <td>Compras</td>
              <td>{{number_format( $subtotal_compra, 2,',','.')}}</td>       
              <td></td>
              <td></td>         
          </tr>
          <tr>
              <td>Compras Brutas</td>
              <td></td>       
              <td>{{number_format( $compras_brutas, 2,',','.')}}</td>
              <td></td>         
          </tr>
          <tr>
              <td>Compras IVA</td>
              <td></td>       
              <td>{{number_format( $iva_compra, 2,',','.')}}</td>
              <td></td>         
          </tr>
          <tr>
              <td>Compras Neta</td>
              <td></td>       
              <td>{{number_format( $compras_neta, 2,',','.')}}</td>
              <td></td>         
          </tr>
          <tr>
            <td>Inventario Inicial</td>
            <td></td>       
            <td>{{number_format( $inventario_inicial, 2,',','.')}}</td>
            <td></td>         
        </tr>
        <tr>
            <td>Mercancia Disponible</td>
            <td></td>       
            <td>{{number_format( $mercancia_disponible, 2,',','.')}}</td>
            <td></td>         
        </tr>
        <tr>
            <td>Inventario Final</td>
            <td></td>       
            <td>{{number_format( $inventario_final, 2,',','.')}}</td>
            <td></td>         
        </tr>
        <tr>
            <td>Costo de Venta</td>
            <td></td>       
            <td></td>
            <td style="color: black;">{{number_format( $costo_venta, 2,',','.')}}</td>         
        </tr>
        <tr>
            <td>Utilidad Bruta Venta</td>
            <td></td>       
            <td></td>
            <td style="color: black;">{{number_format( $utilidad_bruta_venta, 2,',','.')}}</td>         
        </tr>
        <tr>
              <td style="color: black;">Gastos de Operación</td>
              <td><hr></td>       
              <td><hr></td>
              <td><hr></td>         
        </tr>
        <tr>
              <td style="color: black;">En Venta:</td>
              <td></td>       
              <td></td>
              <td></td>         
        </tr>
        <tr>
              <td>Impuesto sobre venta</td>
              <td>{{number_format( $impuesto_ventas, 2,',','.')}}</td>       
              <td></td>
              <td></td>         
        </tr>
        <tr>
              <td>Fletes Venta</td>
              <td>{{number_format( $fletes, 2,',','.')}}</td>       
              <td></td>
              <td></td>         
        </tr>
         <tr>
              <td>Otros Gastos Ventas</td>
              <td>{{number_format( $otros_gastos_ventas, 2,',','.')}}</td>       
              <td></td>
              <td></td>         
        </tr>
        <tr>
              <td>Total Gastos ventas</td>
              <td></td>
              <td>{{number_format( $total_ventas, 2,',','.')}}</td>       
              <td></td>         
        </tr>
        @if(isset($informacion)) 
        <tr>
              <td style="color: black;">En Administración:</td>
              <td></td>       
              <td></td>
              <td></td>         
        </tr>
        <tr>
              <td>Sueldos y Salarios</td>
              <td>{{number_format( $sueldos_salarios, 2,',','.')}}</td>       
              <td></td>
              <td></td>         
        </tr>
        <tr>
              <td>Gastos Arrendamiento</td>
              <td>{{number_format( $gastos_arrendamiento, 2,',','.')}}</td>       
              <td></td>
              <td></td>         
        </tr>
        <tr>
              <td>Gastos de oficina</td>
              <td>{{number_format( $gastos_oficina, 2,',','.')}}</td>       
              <td></td>
              <td></td>         
        </tr>
        <tr>
              <td>Total Gastos Administración</td>
              <td></td>
              <td>{{number_format( $total_administracion, 2,',','.')}}</td>       
              <td></td>         
        </tr>
        <tr>
              <td>Total Gastos Operación</td>
              <td></td>
              <td></td>       
              <td style="color: black;">{{number_format( $total_gastos_op, 2,',','.')}}</td>         
        </tr>
        <tr>
              <td style="color: black;">Utilidad Neta de Operación</td>
              <td></td>
              <td></td>       
              <td style="color: black;">{{number_format( $utilidad_neta_operacion, 2,',','.')}}</td>         
        </tr>
        <tr>
              <td style="color: black;">Otros Ingresos:</td>
              <td></td>
              <td></td>       
              <td></td>         
        </tr>
        <tr>
              <td>Total Otros Ingresos</td>
              <td></td>
              <td>{{number_format( $otros_ingresos, 2,',','.')}}</td>         
              <td></td>       
        </tr>
        <tr>
              <td style="color: black;">Otros Egresos:</td>
              <td></td>
              <td></td>       
              <td></td>         
        </tr>
        <tr>
              <td>Total Otros Egresos</td>
              <td></td>
              <td>{{number_format( $otros_egresos, 2,',','.')}}</td>         
              <td></td>       
        </tr>
        <tr>
              <td style="color: black;">Total Ingresos - Egresos</td>
              <td></td>
              <td></td>       
              <td style="color: black;">{{number_format( $ingresos_menos_egresos, 2,',','.')}}</td>         
        </tr>

          <tr  style="text-align: center; font-size: 12px; color: black;" >
          	<td>UTILIDAD LIQUIDA DEL EJERCICIO</td>
          	<td></td>
          	<td></td>
          	<td>{{number_format( $utilidad_neta_ejercicio, 2,',','.')}}</td>
          </tr>
          @endif
    </tbody>
</table>
