<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ public_path('../resources/views/pdf/boostrap/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />
    <style>
        img {
            width: 10%;
        
      


        }
     

        #alto {
          
          /* Alto de las celdas */
          height: 40px;
        }

        body {
          font-family: "Times New Roman", serif;
          margin: 0mm 1.2cm 1cm 1cm;
         }


        h3 {
            text-align: center;
        }

        small {
            margin-top: 20%;
        }

        #titulo {
            text-align: center;

        }

        #membrete {
            text-align: center;
            margin-top: 35px;
        }

        #l {
            text-align: left;
            margin-left: 4cm;

        }

        #c{
            text-align:center;
            height: 40px;
        }

        


        @font-face {
            font-family: 'Times-Bold';
            src:"{{ public_path('../storage/fonts/Times-Bold') }}"
        }

        body {
            font-family: 'Times-Bold';
        }

        table {
           
            border-collapse: collapse;

        }

        #tabla {

            margin-top: -150px;

        }

        #a{
            text-align: right;
           margin-right: 2cm; 
        }

        .circular--square {
       border-radius: 60%;
         }

    </style>
</head>

<body>
    @foreach($empresa as $key)
    <table border="0"  width="470">
        <tr>
       
            <th style="text-align: left;">EICHE, C.L</th>

            <th rowspan="4"><img class="circular--square" src="../public/{{$key->url_image }}"></th>
        </tr> 
        <tr>   
        <th style="text-align: left;">{{$key->direccion}}</th>
        </tr>
        <tr>
            <th style="text-align: left;">RUT: {{$key->tipo_documento}}-{{$key->ruf}} Telefono: +{{$key->codigo}} {{$key->telefono}}</th>
        </tr>   


         <tr>
            <th style="text-align: left;">Correo: {{$key->email}} Web: </th>
         </tr>
            
            
     

         @endforeach

      </table>  

        </div>

             <h2 style="text-align: center;">Balance de Comprobación</h2> <br>
             
                            
          <table border="1" width="470">
    <br>
             <thead style="text-align: center; color: black;">
             <tr> 
                <th style="text-align: center;" rowspan="2">N°</th>    
                <th style="text-align: center;" rowspan="2">Cuenta</th>                 
                <th style="text-align: center;" colspan="2">Movimientos</th>
                <th style="text-align: center;" colspan="2">Balance de Saldo</th>
             </tr>
             <tr>
                <th style="text-align: center;">Debe</th>
                <th style="text-align: center;">Haber</th>
                <th style="text-align: center;">Deudor</th>  
                <th style="text-align: center;">Acreedor</th>  
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
                            
                            <th style="text-align: center;" colspan="2">TOTAL</th>
                            <th style="text-align: center;">{{number_format($total->debe, 2,',','.')}}</th>
                            <th style="text-align: center;">{{number_format($total->haber, 2,',','.')}}</th>
                            <th style="text-align: center;">{{number_format($sdebe, 2,',','.')}}</th>
                            <th style="text-align: center;">{{number_format($shaber, 2,',','.')}}</th>
                         @endforeach
                     </tr>
         </tbody>
</table>
</body>

</html>
