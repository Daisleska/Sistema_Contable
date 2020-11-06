<br><br><br>
@foreach($empresa as $key)
<table>
    <thead>
    <tr>
        <th colspan="2"><strong>NOMBRE DE LA EMPRESA:</strong> </th>
        <td colspan="2"><strong>{{$key->nombre}}</strong></td>
    </tr>
    <tr>
  
        <th colspan="2"><strong> MES:</strong></th>
        <td colspan="2"><strong>{{$mes}} {{$anio}}</strong></td>
    </tr>
    <tr>
 
        <th colspan="2"><strong> RUT:</strong></th>
        <td colspan="2"><strong>{{$key->tipo_documento}}-{{$key->ruf}}</strong></td>
    </tr>
</thead>


@endforeach
</table>

<table>
  <tr>
  <th colspan="11" style="text-align: center;"><strong>LIBRO DE VENTAS</strong></th>
</tr>
</table>
             <table>
                 <thead>
                  <tr>
                             
                                <th style="text-align: center; width: 16px;"><strong> FECHA</strong></th>
                                <th style="text-align: center; width: 14px;"><strong> Nº FACT</strong></th>
                                <th style="text-align: center; width: 15px;"><strong> Nº CONTR</strong></th>
                                <th style="text-align: center; width: 18px;"><strong> RUT</strong></th>
                                <th style="text-align: center; width: 19px;"><strong> TOTAL VENTA</strong></th>
                                <th style="text-align: center; width: 19px;"><strong> VENTA EXENTA</strong></th>
                                <th style="text-align: center; width: 19px;"><strong> VENTA GRAVADA</strong></th>
                                <th style="text-align: center; width: 10px;"><strong> TASA</strong></th>
                                <th style="text-align: center; width: 16px;"><strong> IMPUESTO</strong></th>
                                <th style="text-align: center; width: 19px;"><strong> MONTO RETENIDO</strong></th>
                                <th style="text-align: center; width: 20px;"><strong> COMPROB DE RETENC</strong></th>
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                    @foreach($venta as $key)       
                <tr>
                  <td style="text-align: center;">{{date("d-m-Y", strtotime($key->fecha))}}</td>
                  <td style="text-align: center;">000{{$key->n_factura}}</td>
                  <td style="text-align: center;">000000{{$key->n_control}}</td>
                  <td style="text-align: center;">{{$key->tipo_documento}}-{{$key->ruf}}</td>
                  <td style="text-align: center;">{{number_format($key->total,2,',','.')}} {{$key->divisa}}</td>
                  <td style="text-align: center;">{{number_format($key->sub_total,2,',','.')}} {{$key->divisa}}</td>
                  <td style="text-align: center;">{{number_format($key->iva,2,',','.')}} {{$key->divisa}}</td>
                  <td style="text-align: center;">{{$key->porcentaje}} %</td>
                  <td style="text-align: center;"></td>
                  <td style="text-align: center;"></td>
                  <td style="text-align: center;"></td>
                  @endforeach

                
                
                 <tr style="color: black; text-align: center;">

                      <th COLSPAN="4" style="text-align: right;"><strong> TOTAL:</strong></th>
                      <?php
                      if ($total_venta >0) {
                            //TOTALES
                         $total_venta=array_sum($total_venta);
                         $sub_total=array_sum($total_subventa);
                         $iva_total=array_sum($total_IVA_venta);
                      //---------------------------------------
                      }else{
                             //TOTALES
                         $total_venta=0;
                         $sub_total=0;
                         $iva_total=0;
                      //---------------------------------------
                      }
                 
                        ?>
                      
                      <th style="text-align: center;"><strong>{{number_format( $total_venta, 2,',','.')}}</strong></th>
                      <th style="text-align: center;"><strong>{{number_format( $sub_total, 2,',','.')}}</strong></th>
                      <th style="text-align: center;"><strong>{{number_format( $iva_total, 2,',','.')}}</strong></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      
                   
                </tr>
           
                             </tbody>
             </table>
            