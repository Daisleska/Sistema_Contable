<br><br><br>

<table>
<tr>
  <th colspan="6" style="text-align: center;"><strong>Balance de Comprobación</strong></th>
</tr>
<tr>
  <th colspan="6" style="text-align: center;"><strong></strong></th>
</tr>
</table> 
             
                            
          <table border="1" width="470">
             <thead>
             <tr> 
                <th style="text-align: center;" rowspan="2"><strong>N°</strong></th>    
                <th style="text-align: center; width: 20px;" rowspan="2"><strong>Cuenta</strong></th>                 
                <th style="text-align: center; width: 26px;" colspan="2"><strong>Movimientos</strong></th>
                <th style="text-align: center; width: 26px;" colspan="2"><strong>Balance de Saldo</strong></th>
             </tr>
             <tr>
                <th style="text-align: center; width: 13px;"><strong>Debe</strong></th>
                <th style="text-align: center; width: 13px;"><strong>Haber</strong></th>
                <th style="text-align: center; width: 13px;"><strong>Deudor</strong></th>  
                <th style="text-align: center; width: 13px;"><strong>Acreedor</strong></th>  
            </tr>  
             </thead>
             <tbody>
                
            
             <?php 
             $i=1;        
             foreach($comprobacion as $key) {

                if ($key->tipo=="activo") {
              ?>
                        <tr>
                              
                                  <td style="text-align: center;">{{$key->codigo}}</td>
                                  <?php 
                                  
                                  if ($res_cuenta[$i][1]>$res_cuenta[$i][0]) {
                                    ?>
                                    <td>&nbsp; &nbsp; &nbsp;&nbsp;{{$key->nombre}}</td>
                                    <?php  
                                  }else{
                                    ?>
                                    <td> {{$key->nombre}}</td> 
                                    <?php
                                  }
                                  ?>
                  <?php                
                  if (isset($res_cuenta[$i][0])) {
                               ?><td style="text-align: center;"><?php echo number_format($res_cuenta[$i][0],2,',','.'); ?></td> <?php 
                                }else{  
                                ?><td></td><?php 
                    }  ?>
                     
                     <?php                
                  if (isset($res_cuenta[$i][1])) {
                               ?><td style="text-align: center;"><?php echo number_format($res_cuenta[$i][1],2,',','.'); ?></td> <?php 
                                }else{  
                                ?><td></td><?php 
                    }  


        
           
            if ($res_cuenta[$i][0]<$res_cuenta[$i][1]) {
                
                $saldo=$res_cuenta[$i][1]-$res_cuenta[$i][0];
                ?>
                  <td></td>
                  <td style="text-align: center;"><?php echo number_format($saldo,2,',','.'); ?></td>
                
                <?php

                $saldoh[]=$saldo;
            }else{
                 
                 $saldo=$res_cuenta[$i][0]-$res_cuenta[$i][1];
                 ?>
                  <td style="text-align: center;"><?php echo number_format($saldo,2,',','.'); ?></td>
                <td></td>
                <?php
                 $saldod[]=$saldo;
            }
            
            

           } 

              if ($key->tipo=="pasivo") {
              ?>
                        <tr>
                              
                                  <td style="text-align: center;">{{$key->codigo}}</td>
                                  <?php 
                                  
                                  if ($res_cuenta[$i][1]>$res_cuenta[$i][0]) {
                                    ?>
                                    <td>&nbsp; &nbsp; &nbsp;&nbsp;{{$key->nombre}}</td>
                                    <?php  
                                  }else{
                                    ?>
                                    <td> {{$key->nombre}}</td> 
                                    <?php
                                  }
                                  ?>
                  <?php                
                  if (isset($res_cuenta[$i][0])) {
                               ?><td style="text-align: center;"><?php echo number_format($res_cuenta[$i][0],2,',','.'); ?></td> <?php 
                                }else{  
                                ?><td></td><?php 
                    }  ?>
                     
                     <?php                
                  if (isset($res_cuenta[$i][1])) {
                               ?><td style="text-align: center;"><?php echo number_format($res_cuenta[$i][1],2,',','.'); ?></td> <?php 
                                }else{  
                                ?><td></td><?php 
                    }  


        
           
            if ($res_cuenta[$i][0]<$res_cuenta[$i][1]) {
                
                $saldo=$res_cuenta[$i][1]-$res_cuenta[$i][0];
                ?>
                  <td></td>
                  <td style="text-align: center;"><?php echo number_format($saldo,2,',','.'); ?></td>
                
                <?php

                $saldoh[]=$saldo;
            }else{
                 
                 $saldo=$res_cuenta[$i][0]-$res_cuenta[$i][1];
                 ?>
                  <td style="text-align: center;"><?php echo number_format($saldo,2,',','.'); ?></td>
                <td></td>
                <?php
                 $saldod[]=$saldo;
            }
            
            

           } 


              if ($key->tipo=="capital") {
              ?>
                        <tr>
                              
                                  <td style="text-align: center;">{{$key->codigo}}</td>
                                  <?php 
                                  
                                  if ($res_cuenta[$i][1]>$res_cuenta[$i][0]) {
                                    ?>
                                    <td>&nbsp; &nbsp; &nbsp;&nbsp;{{$key->nombre}}</td>
                                    <?php  
                                  }else{
                                    ?>
                                    <td> {{$key->nombre}}</td> 
                                    <?php
                                  }
                                  ?>
                  <?php                
                  if (isset($res_cuenta[$i][0])) {
                               ?><td style="text-align: center;"><?php echo number_format($res_cuenta[$i][0],2,',','.'); ?></td> <?php 
                                }else{  
                                ?><td></td><?php 
                    }  ?>
                     
                     <?php                
                  if (isset($res_cuenta[$i][1])) {
                               ?><td style="text-align: center;"><?php echo number_format($res_cuenta[$i][1],2,',','.'); ?></td> <?php 
                                }else{  
                                ?><td></td><?php 
                    }  


        
            
            if ($res_cuenta[$i][0]<$res_cuenta[$i][1]) {
                
                $saldo=$res_cuenta[$i][1]-$res_cuenta[$i][0];
                ?>
                  <td></td>
                  <td style="text-align: center;"><?php echo number_format($saldo,2,',','.'); ?></td>
                
                <?php

                $saldoh[]=$saldo;
            }else{
                 
                 $saldo=$res_cuenta[$i][0]-$res_cuenta[$i][1];
                 ?>
                  <td style="text-align: center;"><?php echo number_format($saldo,2,',','.'); ?></td>
                <td></td>
                <?php
                 $saldod[]=$saldo;
            }
            
           

           } 

           
            if ($key->tipo=="egreso") {
              ?>
                        <tr>
                              
                                  <td style="text-align: center;">{{$key->codigo}}</td>
                                  <?php 
                                  
                                  if ($res_cuenta[$i][1]>$res_cuenta[$i][0]) {
                                    ?>
                                    <td>&nbsp; &nbsp; &nbsp;&nbsp;{{$key->nombre}}</td>
                                    <?php  
                                  }else{
                                    ?>
                                    <td> {{$key->nombre}}</td> 
                                    <?php
                                  }
                                  ?>
                  <?php                
                  if (isset($res_cuenta[$i][0])) {
                               ?><td style="text-align: center;"><?php echo number_format($res_cuenta[$i][0],2,',','.'); ?></td> <?php 
                                }else{  
                                ?><td></td><?php 
                    }  ?>
                     
                     <?php                
                  if (isset($res_cuenta[$i][1])) {
                               ?><td style="text-align: center;"><?php echo number_format($res_cuenta[$i][1],2,',','.'); ?></td> <?php 
                                }else{  
                                ?><td></td><?php 
                    }  


        
            
            if ($res_cuenta[$i][0]<$res_cuenta[$i][1]) {
                
                $saldo=$res_cuenta[$i][1]-$res_cuenta[$i][0];
                ?>
                  <td></td>
                  <td style="text-align: center;"><?php echo number_format($saldo,2,',','.'); ?></td>
                
                <?php

                $saldoh[]=$saldo;
            }else{
                 
                 $saldo=$res_cuenta[$i][0]-$res_cuenta[$i][1];
                 ?>
                  <td style="text-align: center;"><?php echo number_format($saldo,2,',','.'); ?></td>
                <td></td>
                <?php
                 $saldod[]=$saldo;
            }
            
           

           } 


            if ($key->tipo=="ingreso") {
              ?>
                        <tr>
                              
                                  <td style="text-align: center;">{{$key->codigo}}</td>
                                  <?php 
                                  
                                  if ($res_cuenta[$i][1]>$res_cuenta[$i][0]) {
                                    ?>
                                    <td>&nbsp; &nbsp; &nbsp;&nbsp;{{$key->nombre}}</td>
                                    <?php  
                                  }else{
                                    ?>
                                    <td> {{$key->nombre}}</td> 
                                    <?php
                                  }
                                  ?>
                  <?php                
                  if (isset($res_cuenta[$i][0])) {
                               ?><td style="text-align: center;"><?php echo number_format($res_cuenta[$i][0],2,',','.'); ?></td> <?php 
                                }else{  
                                ?><td></td><?php 
                    }  ?>
                     
                     <?php                
                  if (isset($res_cuenta[$i][1])) {
                               ?><td style="text-align: center;"><?php echo number_format($res_cuenta[$i][1],2,',','.'); ?></td> <?php 
                                }else{  
                                ?><td></td><?php 
                    }  


        
            
            if ($res_cuenta[$i][0]<$res_cuenta[$i][1]) {
                
                $saldo=$res_cuenta[$i][1]-$res_cuenta[$i][0];
                ?>
                  <td></td>
                  <td style="text-align: center;"><?php echo number_format($saldo,2,',','.'); ?></td>
                
                <?php

                $saldoh[]=$saldo;
            }else{
                 
                 $saldo=$res_cuenta[$i][0]-$res_cuenta[$i][1];
                 ?>
                  <td style="text-align: center;"><?php echo number_format($saldo,2,',','.'); ?></td>
                <td></td>
                <?php
                 $saldod[]=$saldo;
            }
            
           

           } 


           $i++; }  ?>

                    </tr>
                    
                        
                            <?php

                             $sdebe=array_sum($saldod);
                             $shaber=array_sum($saldoh);
                             ?>       

                    <tr style="color: black;">
                        @foreach($totales_C as $total)
                            
                            <th style="text-align: center;" colspan="2"><strong>TOTAL</strong></th>
                            <th style="text-align: center;"><strong>{{number_format($total->debe, 2,',','.')}}</strong> </th>
                            <th style="text-align: center;"><strong> {{number_format($total->haber, 2,',','.')}}</strong></th>
                            <th style="text-align: center;"><strong> {{number_format($sdebe, 2,',','.')}}</strong></th>
                            <th style="text-align: center;"><strong>{{number_format($shaber, 2,',','.')}}</strong> </th>
                         @endforeach
                     </tr>
         </tbody>
</table>