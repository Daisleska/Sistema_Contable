   <table id="basic-datatable" class="table dt-responsive nowrap" >
                        <thead>
                            <tr style="color: black;">
                                <th COLSPAN="13" style="text-align: center;">LIBRO DE VENTAS</th>
                            </tr>
                            <tr style="color: black; font-size: 12px;">
                                <th>Nº</th>
                                <th>FEC</th>
                                <th>Nº.FACT</th>
                                <th>Nº. CONTR</th>
                                <th>CLIENTE</th>
                                <th>RUT</th>
                                <th>TOTAL VENTAS</th>
                                <th>VENTAS EXENTAS</th>
                                <th>VENTAS GRAVADAS</th>
                                <th>TASA</th>
                                <th>IMPUEST</th>
                                <th>MONTO RETENIDO</th>
                                <th>COMPROB DE RETENC</th>
                            </tr>
                        </thead>
                    
                    
                        <tbody style="font-size: 11px;">
                    @foreach($venta as $key)       
                <tr>
                  <td>{{$key->facturav_id}}</td>
                  <td>{{$key->fecha}}</td>
                  <td>{{$key->n_factura}}</td>
                  <td>{{$key->n_control}}</td>
                  <td>{{$key->nombre}}</td>
                  <td>{{$key->tipo_documento}}-{{$key->ruf}}</td>
                  <td>{{number_format($key->total,2,',','.')}} {{$key->divisa}}</td>
                  <td>{{number_format($key->sub_total,2,',','.')}} {{$key->divisa}}</td>
                  <td>{{number_format($key->iva,2,',','.')}} {{$key->divisa}}</td>
                  <td>{{$key->porcentaje}} %</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  @endforeach

                
                
                 <tr style="color: black;">

                      <th COLSPAN="6" style="text-align: right;">TOTAL:</th>
                      <?php
                      //TOTALES
                         $total_venta=array_sum($total_venta);
                         $sub_total=array_sum($total_subventa);
                         $iva_total=array_sum($total_IVA_venta);
                      //---------------------------------------
                        ?>


                      <th style="color: black;" >{{number_format( $total_venta, 2,',','.')}}</th>
                      <th style="color: black;" >{{number_format( $sub_total, 2,',','.')}}</th>
                      <th></th>
                      <th></th>
                      <th></th>
                     
                      <th COLSPAN="6" style="color: black;"></th>
                      
                   
                </tr>
           
                             </tbody>
                    </table>
