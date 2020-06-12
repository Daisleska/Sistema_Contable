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
            margin-left: 20cm;
            margin-right: 2.5cm;
            border-radius: 50%;
      


        }

        h3 {
            text-align: center;
        }

      

        small {
            margin-top: 20%;
            color:black;

        }

        #titulo {
            text-align: right;
       
        }

        #membrete {
            text-align: right;
            margin-left: 15px;
        }

        #fecha {
            margin-right: 15px;
        }

        @font-face {
            font-family: 'Times-Bold';
            src:"{{ public_path('../storage/fonts/Times-Bold') }}"
        }

        body {
            font-family: 'Times-Bold';
       
          margin: 2.5cm 2.5cm 2.5cm 2.5cm;
         }


        table {
            border-collapse: collapse;
            width: 100%;

        }


        #l {
            text-align: left;
            margin-left: 4cm;

        }

        #c{
            text-align:center;
            height: 40px;
        }

       


    </style>
</head>

<body>
    <div class="row">
        @foreach($empresa as $key)
            <img class="circular--square" src="../public/{{ $key->url_image }}">
            <h2>EICHE, C.L</h2>
            <small>RUT:{{$key->tipo_documento}}-{{$key->ruf}}</small>
            <small class="float-left">{{$key->direccion}}</small> <br>
            <small class="float-left">Telefono: +{{$key->codigo}} {{$key->telefono}}</small> /
            <small class="float-left">Correo: {{$key->email}}</small>

            
            

        </div>

         @endforeach

        </div>
   

        

    </div>



             
             
                        <table style="border-color: black; border: 1px; width: 800px;  " border="1">
                        <thead>
                            <tr style="color: black;">
                                <th COLSPAN="5" style="text-align: center;">LIBRO DIARIO</th>
                            </tr>
                            <tr style="color: black; font-size: 12px;">
                                
                                <th style="text-align: center;">FECHA</th>
                                <th style="text-align: center;">CUENTA Y DESCRIPCIÓN</th>
                                <th style="text-align: center;">REF.</th>
                                <th style="text-align: center;">DEBE</th>
                                <th style="text-align: center;">HABER</th>
                                
                            
                            </tr>
                        </thead>
                    
                    
                <tbody>
                <?php   foreach($diario as $key)  { ?>
                       
                <tr style=" border-bottom: 0.5px; border-style: solid; " >
                  <td style="text-align: center;"><?php echo $key->fecha; ?></td>

                <?php $de_cuentas= \DB::select('SELECT DISTINCT cuentas.id, cuentas.nombre, cuentas.tipo, cuenta_has_diario.de_monto FROM cuentas, cuenta_has_diario, diario WHERE cuentas.id=cuenta_has_diario.cuenta_id AND cuenta_has_diario.diario_id='.$key->id_d.''); ?>
                 
                 <td>
                   &nbsp;__________________________  <?php echo $i++;  ?>  __________________________<br><br>
                 <?php   foreach($de_cuentas as $val) { 
                
                  echo $val->nombre;  ?><br><?php } ?>&nbsp; &nbsp; &nbsp; &nbsp;

                <?php $a_cuentas= \DB::select('SELECT DISTINCT cuentas.id, cuentas.nombre, cuentas.tipo, cuenta_has_diario.a_monto FROM cuentas, cuenta_has_diario WHERE cuentas.id=cuenta_has_diario.c_destino AND cuenta_has_diario.diario_id='.$key->id_d.''); ?>

                 <?php  foreach($a_cuentas as $item)  { ?> 
                 <?php echo $item->nombre; ?><br>&nbsp; &nbsp; &nbsp; &nbsp; <?php  } ?>
                <hr> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $key->descripcion; ?></td>
                
                <td style="text-align: center; color: black; border: solid;"><br>
                <?php   foreach($de_cuentas as $val) { 

                

                $cuenta=DB::table ('cuentas')->select('codigo')->where('id',$val->id )->get();
                 ?>
                 @foreach($cuenta as $key)
                 {{$key->codigo}} @endforeach<br> <?php } 
                 foreach($a_cuentas as $item)  { 

                 

                 $cuent=DB::table ('cuentas')->select('codigo')->where('id', $item->id )->get();

                ?>
                @foreach($cuent as $val)
                 {{$val->codigo}} @endforeach<br> <?php } ?>



                </td>
                
                <td style="text-align: center; color: black; border: solid;"><br>
                <?php   foreach($de_cuentas as $val) { 
                 
                 echo number_format($val->de_monto,2,',','.'); 
                $activo[]= $val->de_monto;
                 
                  ?> <br> <?php }?> 
                   
                </td>
                <td style="text-align: center;"><br><br>

                  
                  <?php 

                 
                 $l=count($de_cuentas);
                 

                 for ($i=0; $i < $l; $i++) { 

                   ?><br> <?php
                 }
                 foreach ($a_cuentas as $item) {
                  
                echo number_format($item->a_monto,2,',','.'); 
                 $pasivo[]= $item->a_monto;
                 
                  ?> <br> <?php }?> 
                 
                  
                 
                 
                
                  
                </td>

                

                
                

                
                  
               
                             </tbody>
                            <?php  }?>
                          <tr >
                                <?php $debe=array_sum($activo);
                                $haber=array_sum($pasivo);  ?>
                                <td colspan="3" style="text-align: center;">VAN</td>
                                <td>{{number_format($debe,2,',','.')}}</td>
                                <td>{{number_format($haber,2,',','.')}}</td>
                          </tr>
                          
                        
                         
                               
                              
                    </table>

        

</body>

</html>
