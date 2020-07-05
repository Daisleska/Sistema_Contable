<?php 
$utilidad = '12000';
 ?>
{{-- TABLA PARA LOS ACTIVOS --}}
   <table style="border-color: black; border: 1px;  " border="1" class="table dt-responsive nowrap">
   		<h5 align="center" style="text-align: center; color: black;">ACTIVO</h5>
             <thead style="text-align: center; color: black; font-size: 14px;">
                                    
                <th>CUENTAS</th>
               	<th>VALOR 1</th>
               	<th>VALOR 2</th>
                <th>TOTAL</th>
             </thead>
            		 <tbody>

                  @foreach($res_saldo_general as $general)
                             <tr>
                            @if($general[1] =='activo')  

                           
                              <?php $saldo= $general[2] - $general[3]; 
                              ?>

                                  <td style="text-align: center;">{{$general[0]}}</td>
                            
                                  <td style="text-align: center;">{{$saldo}}</td>       
                                  <td></td>
                                  <td></td>
                            
                      
                            </tr>
                   @endif
                      @endforeach   

                            <tr  style="text-align: center; font-size: 12px; color: black;" >
                            	<td>TOTAL ACTIVO</td>
                            	<td></td>
                            	<td></td>
                              <td></td>
                       
                            </tr>  
                                    
         </tbody>
</table>

{{-- TABLA PARA LOS PASIVOS --}}
<table style="border-color: black; border: 1px;  " border="1" class="table dt-responsive nowrap">
   		<h5 align="center" style="text-align: center; color: black;">PASIVO</h5>
             <thead style="text-align: center; color: black; font-size: 14px;">
                                    
                <th>CUENTAS</th>
               	<th>VALOR 1</th>
               	<th>VALOR 2</th>
                <th>TOTAL</th>
             </thead>
            		 <tbody>
                   @foreach($res_saldo_general as $general2)
                             <tr >
                               @if($general2[1] =='pasivo')  
                               
                              <?php $saldo2=  $general2[2] - $general2[3]; ?>
                                  <td style="text-align: center;">{{$general2[0]}}</td>
                                  <td style="text-align: center;">{{$saldo2}}</td>      
                                  <td></td>
                                  <td></td>
                               
                              @endif
                            </tr>
                    @endforeach
                            <tr  style="text-align: center; font-size: 12px; color: black;" >
                            	<td>TOTAL PASIVO</td>
                            	<td></td>
                            	<td></td>
                              <td></td>
                       
                            </tr>            
         </tbody>
</table>

{{-- TABLA PARA EL PATRIMONIO --}}
<table style="border-color: black; border: 1px;  " border="1" class="table dt-responsive nowrap">
   	<h5 align="center" style="text-align: center; color: black;">PATRIMONIO</h5>
             <thead style="text-align: center; color: black; font-size: 14px;">
                                    
                <th>CUENTAS</th>
               	<th>VALOR 1</th>
               	<th>VALOR 2</th>
                <th>TOTAL</th>
             </thead>
            		 <tbody>
                  @foreach($res_saldo_general as $general3)
                             <tr>
                                 @if($general3[1] == 'capital')
                            
                              <?php $saldo3=  $general3[2] - $general3[3]; ?>  
                                  <td style="text-align: center;">{{$general3[0]}}</td>
                                  <td style="text-align: center;">{{$saldo3}}</td>       
                                  <td></td>
                                  <td></td>
                               
                              @endif
                            </tr>
                  @endforeach
                          <tr style="font-size: 12px;">
                            <td>Utilidad liquida del ejercicio</td>
                            <td></td>
                             <td style="text-align: center;">{{number_format($utilidad, 2,',','.')}}</td>
                            <td></td>
                          </tr>

                            <tr  style="text-align: center; font-size: 12px; color: black;" >
                            	<td>TOTAL PATRIMONIO</td>
                            	<td></td>
                            	<td></td>
                              <td></td>
                       
                            </tr>            
         </tbody>
</table>