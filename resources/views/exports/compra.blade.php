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
  <th colspan="11" style="text-align: center;"><strong>LIBRO DE COMPRAS</strong></th>
</tr>
</table>

             <table border="1" width="700">
                 <thead>
                   <tr style="color: black; font-size: 15px; text-align: center;">
                             
                                <th style="text-align: center; width: 16px;"><strong> FECHA</strong></th>
                                <th style="text-align: center; width: 14px;"><strong> Nº FACT</strong></th>
                                <th style="text-align: center; width: 15px;"><strong> Nº CONTR</strong></th>
                                <th style="text-align: center; width: 17px;"><strong>PROVEEDOR</strong></th>
                                <th style="text-align: center; width: 18px;"><strong> RUT</strong></th>
                                <th style="text-align: center; width: 19px;"><strong>COMPRAS IVA</strong></th>
                                <th style="text-align: center; width: 19px;"><strong>MONTO B</strong></th>
                                <th style="text-align: center; width: 7px;"><strong> %</strong></th>
                                <th style="text-align: center; width: 19px;"><strong>IMPUEST</strong></th>
                                <th style="text-align: center; width: 19px;"><strong>COMPRAS NO GRAV.</strong></th>
                                <th style="text-align: center; width: 19px;"><strong>TOTAL COMPRA</strong></th>           
                            </tr>
                        </thead>
                        <tbody style="font-size: 15px;">
                           
                      @foreach($compra as $item)
                <tr>
                
                  <td style="text-align: center;"> {{date("d-m-Y", strtotime($item->fecha))}}</td>
                  <td style="text-align: center;">000{{ $item->n_factura}}</td>
                  <td style="text-align: center;">000000{{ $item->n_control}}</td>
                  <td style="text-align: center;"> {{ $item->nombre}}</td>
                  <td style="text-align: center;"> {{$item->tipo_documento}}-{{$item->ruf}}</td>
                  <td style="text-align: center;"> {{number_format($item->iva, 2,',','.')}}</td>
                  <td style="text-align: center;"> {{number_format($item->sub_total, 2,',','.')}}</td>
                  <td style="text-align: center;"> {{$item->p_iva}}</td>
                  <td style="text-align: center;"> </td>
                  <td style="text-align: center;"> </td>
                  <td style="text-align: center;"> {{number_format( $item->total, 2,',','.')}}</td>
             
             
                
                </tr>

                          @endforeach

                <tr style="color: black; text-align: center;">

                      <th COLSPAN="5" style="text-align: right;"><strong> TOTAL:</strong></th>
                      <?php
                      if ($total_total>0) {
                            //TOTALES
                         $total_compra=array_sum($total_total);
                         $sub_total=array_sum($total_subtotal);
                         $iva_total=array_sum($total_IVA);
                      //---------------------------------------
                      }else{
                             //TOTALES
                         $total_compra=0;
                         $sub_total=0;
                         $iva_total=0;
                      //---------------------------------------
                      }
                 
                        ?>


                      <th style="text-align: center;" ><strong>{{number_format( $iva_total, 2,',','.')}}</strong></th>
                      <th style="text-align: center;" ><strong>{{number_format( $sub_total, 2,',','.')}}</strong></th>
                  
                      <th></th>
                      <th></th>
                      <th></th>
                     
                      <th style="text-align: center;"><strong>{{number_format( $total_compra, 2,',','.')}}</strong></th>
                      
                   
                </tr>
           
                             </tbody>
             </table>
