<?php

 ?>

   <table style="border-color: black; border: 1px;  " border="1" class="table dt-responsive nowrap">
             <thead style="text-align: center; color: black; font-size: 14px;">
                                    
                <th>N°</th>
                <th>Cuenta</th>
                <th>Movimientos <hr>DEBE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HABER</th>
                <th>Balance de Saldo <hr>Deudor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Acreedor</th>
                 
             </thead>
             <tbody>
                       
                    @foreach($comprobacion as $key)
                             <tr style="font-size: 12px;">
                              
                                  <td>{{$key->cuenta_id}}</td>
                                  <td>{{$key->nombre}}</td> 
                                  
                                  <td></td>
                                  <td></td>
                        
                            </tr>
                    @endforeach
                            
                                   

                    <tr style="color: black;">
                        @foreach($totales_C as $total)
                            <td></td>
                            <td>TOTAL</td>
                            <td>{{number_format($total->debe, 2,',','.')}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{number_format($total->haber, 2,',','.')}}</td>
                            <td>Tercero &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cuarto</td>
                         @endforeach
                     </tr>
         </tbody>
</table>