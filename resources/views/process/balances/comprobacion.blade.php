<?php

 ?>
 <th COLSPAN="3">     
                                  <div class="btn-group">

                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class='uil uil-file-alt mr-1'></i>Descargar
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                   <a href="{{ route('comprobacion_view') }}" class="dropdown-item notify-item">
                        <i data-feather="book-open" class="icon-dual icon-xs mr-2"></i>
                        <span>Excel</span>
                    </a>
                    <a href="{{ route('balance.pdfcomprobacion') }}" class="dropdown-item notify-item">
                        <i data-feather="download" class="icon-dual icon-xs mr-2"></i>
                        <span>PDF</span>
                    </a>
                    <a href="javascript:window.print()" class="dropdown-item notify-item">
                        <i data-feather="printer" class="icon-dual icon-xs mr-2"></i>
                        <span>Imprimir</span>
                    </a>
                </div>
            </div></th>
            <br>

   <table style="border-color: black; border: 1px;  " border="1" class="table dt-responsive nowrap">
    <br>
             <thead style="text-align: center; color: black; font-size: 14px;">
             <tr> 
                <th style="text-align: center;" rowspan="2">N°</th>    
                <th style="text-align: center;" rowspan="2">Cuenta</th>                 
                <th style="text-align: center;" colspan="2">Movimientos</th>
                <th style="text-align: center;" colspan="2">Balance de Saldo</th>
             </tr>
            
                <th style="text-align: center;">Debe</th>
                <th style="text-align: center;">Haber</th>
                <th style="text-align: center;">Deudor</th>  
                <th style="text-align: center;">Acreedor</th>    
             </thead>
             <tbody>
                
            
             <?php 
             $i=1;        
             foreach($comprobacion as $key) {

                if ($key->tipo=="activo") {
              ?>
                        <tr style="font-size: 12px;">
                              
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
                        <tr style="font-size: 12px;">
                              
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
                        <tr style="font-size: 12px;">
                              
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
                        <tr style="font-size: 12px;">
                              
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
                        <tr style="font-size: 12px;">
                              
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
                            
                            <th style="text-align: center;" colspan="2">TOTAL</th>
                            <th style="text-align: center;">{{number_format($total->debe, 2,',','.')}}</th>
                            <th style="text-align: center;">{{number_format($total->haber, 2,',','.')}}</th>
                            <th style="text-align: center;">{{number_format($sdebe, 2,',','.')}}</th>
                            <th style="text-align: center;">{{number_format($shaber, 2,',','.')}}</th>
                         @endforeach
                     </tr>
         </tbody>
</table>