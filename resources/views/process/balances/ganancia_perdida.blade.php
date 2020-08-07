<?php
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
  if ($venta_neta > $costo_venta) {
   $utilidad_bruta_venta = $venta_neta - $costo_venta;   
  }elseif($venta_neta < $costo_venta){
   $utilidad_bruta_venta = $costo_venta - $venta_neta  ;  
  }
  $utilidad_neta_ejercicio = 12;
?>
   <table style="border-color:  black; border: 1px;  " border="1" class="table dt-responsive nowrap">
       <thead >  
         <tr>                     
            <h5 style="text-align: center; color: black; font-size: 12px;">Estado De Ganancias Y Perdidas <br> Ejercicio Del {{$inicio}} Al {{$final}}</h5>
            <br>
            @if($utilidad_neta_ejercicio > 0)
               <button type="button" class="btn btn-info" data-toggle="modal" data-target="#bs-example-modal-lg">Completar</button>
            @endif
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
            <td>{{number_format( $costo_venta, 2,',','.')}}</td>         
        </tr>
        <tr>
            <td>Utilidad Bruta Venta</td>
            <td></td>       
            <td></td>
            <td><{{number_format( $utilidad_bruta_venta, 2,',','.')}}></td>         
        </tr>
        <tr>
              <td>Gastos de Operación</td>
              <td><hr></td>       
              <td><hr></td>
              <td><hr></td>         
        </tr>
        <tr>
              <td>En Venta:</td>
              <td><hr></td>       
              <td><hr></td>
              <td><hr></td>         
        </tr>

          <tr  style="text-align: center; font-size: 12px; color: black;" >
          	<td>UTILIDAD LIQUIDA DEL EJERCICIO</td>
          	<td></td>
          	<td></td>
          	<td>{{number_format( $utilidad_neta_ejercicio, 2,',','.')}}</td>
          </tr>
    </tbody>
</table>


  <!--  Modal content for the above example -->
<div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
  <div class="modal-header">
      <h5 class="modal-title" id="myLargeModalLabel">Completar información</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
      <p>Nota: es importante ingresar los siguientes datos para completar el balance de ganancias y perdidas. Si alguno de los datos no los posee puede ingresar "0".</p>
      <br>
      <div class="row">
          <div class="form-group col-md-6">
              <label>Sueldos y Salarios</label>
              <div>
                 <input data-parsley-type="number" type="number"
                 class="form-control" required placeholder="Ingrese el valor"/>
              </div>
          </div>
           <div class="form-group col-md-6">
              <label>Gastos de Oficina</label>
              <div>
                 <input data-parsley-type="number" type="number"
                 class="form-control" required placeholder="Ingrese el valor"/>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="form-group col-md-6">
              <label>Gastos de Arrendamiento</label>
              <div>
                 <input data-parsley-type="number" type="number"
                 class="form-control" required placeholder="Ingrese el valor"/>
              </div>
          </div>
          <div class="form-group col-md-6">
              <label>Seguro Social Gastos</label>
              <div>
                 <input data-parsley-type="number" type="number"
                 class="form-control" required placeholder="Ingrese el valor"/>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="form-group col-md-6">
              <label>Otros Ingresos Total</label>
              <div>
                 <input data-parsley-type="number" type="text"
                 class="form-control" required placeholder="Ingrese el valor"/>
              </div>
          </div>
          <div class="form-group col-md-6">
              <label>Otros egresos Total</label>
              <div>
                 <input data-parsley-type="number" type="text"
                 class="form-control" required placeholder="Ingrese el valor"/>
              </div>
          </div>
      </div>
  </div>
  <div class="modal-footer">
    <div class="col-md-2">
      <button class="btn btn-primary">Guardar</button>
    </div>
  </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->