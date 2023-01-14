   <table class="table dt-responsive nowrap">
                        <thead>
                            <tr style="color: black;">
          @if(buscar_p('Reportes','PDF')=="Si" || buscar_p('Reportes','Excel')=="Si")
                              <th COLSPAN="5">     
                                  <div class="btn-group">

                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class='uil uil-file-alt mr-1'></i>Descargar
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                   <a href="{{ route('venta_view') }}" class="dropdown-item notify-item">
                        <i data-feather="book-open" class="icon-dual icon-xs mr-2"></i>
                        <span>Excel</span>
                    </a>
                    <a href="{{ route('venta.pdfventa') }}" class="dropdown-item notify-item">
                        <i data-feather="download" class="icon-dual icon-xs mr-2"></i>
                        <span>PDF</span>
                    </a>
                    <a href="javascript:window.print()" class="dropdown-item notify-item">
                        <i data-feather="printer" class="icon-dual icon-xs mr-2"></i>
                        <span>Imprimir</span>
                    </a>
                </div>
            </div></th>
            @endif
                                <th COLSPAN="6" style="text-align: left;">LIBRO DE VENTAS</th>
                              
                            </tr>
                            <tr style="color: black; font-size: 10px;">
                               {{--  <th>Nº</th> --}}
                                <th>FEC</th>
                                <th>Nº FACT</th>
                                <th>Nº CONTR</th>
                                <th>RIF</th>
                                <th>TOTAL VENTA</th>
                                <th>VENTA EXENTA</th>
                                <th>VENTA GRAVADA</th>
                                <th>TASA</th>
                                <th>IMPUEST</th>
                                <th>MONTO RETENIDO</th>
                                <th>COMPROB DE RETENC</th>
                            </tr>
                        </thead>
                    
                    
                        <tbody style="font-size: 10px;">
                    @foreach($venta as $key)       
                <tr>
               {{--    <td>{{$key->facturav_id}}</td> --}}
                  <td>{{date("d-m-Y", strtotime($key->fecha))}}</td>
                  <td>000{{$key->n_factura}}</td>
                  <td>000000{{$key->n_control}}</td>
                  <td>{{$key->tipo_documento}}-{{$key->ruf}}</td>
                  <td>{{number_format($key->total,2,',','.')}} {{$key->divisa}}</td>
                  <td>{{number_format($key->sub_total,2,',','.')}} {{$key->divisa}}</td>
                  <td>{{number_format($key->iva,2,',','.')}} {{$key->divisa}}</td>
                  <td>{{$key->porcentaje}} %</td>
                  <td>I.V.A</td>
                  <td style="text-align: center;">-</td>
                  <td style="text-align: center;">-</td>
                  @endforeach

                
                
                 <tr style="color: black;">

                      <th COLSPAN="4" style="text-align: right;">TOTAL:</th>
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

                      <th style="color: black;" >{{number_format( $total_venta, 2,',','.')}}</th>
                      <th style="color: black;" >{{number_format( $sub_total, 2,',','.')}}</th>
                      <th style="color: black;" >{{number_format( $iva_total, 2,',','.')}}</th>
                      <th></th>
                      <th></th>
                      <th></th>
                     
                      <th COLSPAN="6" style="color: black;"></th>
                      
                   
                </tr>
           
                             </tbody>
                    </table>
