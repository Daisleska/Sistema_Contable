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

<br><br><br>
<table>
 
     <tr>
     <th rowspan="2" colspan="4" style="text-align: center;"><strong> Estado De Ganancias Y Pérdidas <br> Ejercicio Del {{$inicio}} Al {{$final}}</strong></th>
         </tr>
     
</table>
 
<br>
<table >
  <br>
  
      <tbody>
          <tr>
              <td style="width: 30px; color: black; text-align: center;"><strong>Ventas</strong></td>
              <td style="width: 25px; text-align: center;">{{number_format( $ventas, 2,',','.')}}</td>       
              <td style="width: 25px;"></td>
              <td style="width: 25px;"></td>         
          </tr>
          <tr>
              <td style="text-align: center;">IVA</td>
              <td style="text-align: center;">{{number_format( $iva_venta, 2,',','.')}}</td>       
              <td></td>
              <td></td>         
          </tr>
          <tr>
              <td style="text-align: center;">Venta Neta</td>
              <td></td>       
              <td></td>
              <td style="text-align: center;">{{number_format( $venta_neta, 2,',','.')}}</td>         
          </tr>
          <tr>
              <td style=" color: black; text-align: center;"><strong>Costo de Ventas:</strong></td>
              <td style="text-align: center;">---------</td>       
              <td style="text-align: center;">---------</td>
              <td style="text-align: center;">---------</td>         
          </tr>
           <tr>
              <td style="text-align: center;">Compras</td>
              <td style="text-align: center;">{{number_format( $subtotal_compra, 2,',','.')}}</td>       
              <td></td>
              <td></td>         
          </tr>
          <tr>
              <td style="text-align: center;">Compras Brutas</td>
              <td></td>       
              <td style="text-align: center;">{{number_format( $compras_brutas, 2,',','.')}}</td>
              <td></td>         
          </tr>
          <tr>
              <td style="text-align: center;">Compras IVA</td>
              <td></td>       
              <td style="text-align: center;">{{number_format( $iva_compra, 2,',','.')}}</td>
              <td></td>         
          </tr>
          <tr>
              <td style="text-align: center;">Compras Neta</td>
              <td></td>       
              <td style="text-align: center;">{{number_format( $compras_neta, 2,',','.')}}</td>
              <td></td>         
          </tr>
          <tr>
            <td style="text-align: center;">Inventario Inicial</td>
            <td></td>       
            <td style="text-align: center;">{{number_format( $inventario_inicial, 2,',','.')}}</td>
            <td></td>         
        </tr>
        <tr>
            <td style="text-align: center;">Mercancia Disponible</td>
            <td></td>       
            <td style="text-align: center;">{{number_format( $mercancia_disponible, 2,',','.')}}</td>
            <td></td>         
        </tr>
        <tr>
            <td style="text-align: center;">Inventario Final</td>
            <td></td>       
            <td style="text-align: center;">{{number_format( $inventario_final, 2,',','.')}}</td>
            <td></td>         
        </tr>
        <tr>
            <td style="text-align: center;">Costo de Venta</td>
            <td></td>       
            <td></td>
            <td style="color: black; text-align: center;"><strong>{{number_format( $costo_venta, 2,',','.')}}</strong></td>         
        </tr>
        <tr>
            <td style="text-align: center;">Utilidad Bruta Venta</td>
            <td></td>       
            <td></td>
            <td style="color: black; text-align: center;"><strong>{{number_format( $utilidad_bruta_venta, 2,',','.')}}</strong></td>         
        </tr>
        <tr>
              <td style="color: black; text-align: center;"><strong>Gastos de Operación</strong></td>
              <td style="text-align: center;">---------</td>       
              <td style="text-align: center;">---------</td>
              <td style="text-align: center;">---------</td>         
        </tr>
        <tr>
              <td style="color: black; text-align: center;"><strong>En Venta:</strong></td>
              <td></td>       
              <td></td>
              <td></td>         
        </tr>
        <tr>
              <td style="text-align: center;">Impuesto sobre venta</td>
              <td style="text-align: center;">{{number_format( $impuesto_ventas, 2,',','.')}}</td>       
              <td></td>
              <td></td>         
        </tr>
        <tr>
              <td style="text-align: center;">Fletes Venta</td>
              <td style="text-align: center;">{{number_format( $fletes, 2,',','.')}}</td>       
              <td></td>
              <td></td>         
        </tr>
         <tr>
              <td style="text-align: center;">Otros Gastos Ventas</td>
              <td style="text-align: center;">{{number_format( $otros_gastos_ventas, 2,',','.')}}</td>       
              <td></td>
              <td></td>         
        </tr>
        <tr>
              <td style="text-align: center;">Total Gastos ventas</td>
              <td></td>
              <td style="text-align: center;">{{number_format( $total_ventas, 2,',','.')}}</td>       
              <td></td>         
        </tr>
        @if(isset($informacion)) 
        <tr>
              <td style="color: black; text-align: center;"><strong>En Administración:</strong></td>
              <td></td>       
              <td></td>
              <td></td>         
        </tr>
        <tr>
              <td style="text-align: center;">Sueldos y Salarios</td>
              <td style="text-align: center;">{{number_format( $sueldos_salarios, 2,',','.')}}</td>       
              <td></td>
              <td></td>         
        </tr>
        <tr>
              <td style="text-align: center;">Gastos Arrendamiento</td>
              <td style="text-align: center;">{{number_format( $gastos_arrendamiento, 2,',','.')}}</td>       
              <td></td>
              <td></td>         
        </tr>
        <tr>
              <td style="text-align: center;">Gastos de oficina</td>
              <td style="text-align: center;">{{number_format( $gastos_oficina, 2,',','.')}}</td>       
              <td></td>
              <td></td>         
        </tr>
        <tr>
              <td style="text-align: center;">Total Gastos Administración</td>
              <td></td>
              <td style="text-align: center;">{{number_format( $total_administracion, 2,',','.')}}</td>       
              <td></td>         
        </tr>
        <tr>
              <td style="text-align: center;">Total Gastos Operación</td>
              <td></td>
              <td></td>       
              <td style="color: black; text-align: center;"><strong>{{number_format( $total_gastos_op, 2,',','.')}}</strong></td>         
        </tr>
        <tr>
              <td style="color: black; text-align: center;"><strong>Utilidad Neta de Operación</strong></td>
              <td></td>
              <td></td>       
              <td style="color: black; text-align: center;"><strong>{{number_format( $utilidad_neta_operacion, 2,',','.')}}</strong></td>         
        </tr>
        <tr>
              <td style="color: black; text-align: center;"><strong>Otros Ingresos:</strong></td>
              <td></td>
              <td></td>       
              <td></td>         
        </tr>
        <tr>
              <td style="text-align: center;">Total Otros Ingresos</td>
              <td></td>
              <td style="text-align: center;">{{number_format( $otros_ingresos, 2,',','.')}}</td>         
              <td></td>       
        </tr>
        <tr>
              <td style="color: black; text-align: center;"><strong>Otros Egresos:</strong></td>
              <td></td>
              <td></td>       
              <td></td>         
        </tr>
        <tr>
              <td style="text-align: center;">Total Otros Egresos</td>
              <td></td>
              <td style="text-align: center;">{{number_format( $otros_egresos, 2,',','.')}}</td>         
              <td></td>       
        </tr>
        <tr>
              <td style="color: black; text-align: center;"><strong>Total Ingresos - Egresos</strong></td>
              <td></td>
              <td></td>       
              <td style="color: black; text-align: center;"><strong>{{number_format( $ingresos_menos_egresos, 2,',','.')}}</strong></td>         
        </tr>

          <tr  style="text-align: center; color: black; font-size: 16px;" >
            <td>UTILIDAD LIQUIDA DEL EJERCICIO</td>
            <td></td>
            <td></td>
            <td style="text-align: center;"><strong>{{number_format( $utilidad_neta_ejercicio, 2,',','.')}}</strong></td>
          </tr>
          @endif
    </tbody>
</table>

