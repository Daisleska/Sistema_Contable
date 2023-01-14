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
            width: 17cm;
        
      


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
        <img class="circular--square" src="../public/uploads/membrete.jpg">
            
            
     

         @endforeach

      </table> 

        </div>
   

        

    </div>
<br>
            </table>
                  <br>

                   <table id="basic-datatable" class="table dt-responsive nowrap" style="border-color: black; border: 1px; width: 630px;" border="1" >
                        <thead >
                            <tr>
                             
                                <th COLSPAN="5" style="color: black;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;LIBRO DIARIO &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; Folio N° <?php echo $n_folio?></th>
                              
                            </tr>
                            <tr style="color: black; ">
                                
                                <th >FECHA</th>
                                <th >CUENTA Y DESCRIPCIÓN</th>
                                <th >REF.</th>
                                <th >DEBE</th>
                                <th >HABER</th>
                                
                            
                            </tr>
                        </thead>
                        
                    
                    
                <tbody>
                <?php   foreach($diario as $key)  { ?>
                       
              <tr>
                  <td style="text-align: center; "><?php echo $key->fecha; ?></td>

                <?php $de_cuentas= \DB::select('SELECT DISTINCT cuentas.id, cuentas.nombre, cuentas.tipo, cuenta_has_diario.de_monto FROM cuentas, cuenta_has_diario, diario WHERE cuentas.id=cuenta_has_diario.cuenta_id AND cuenta_has_diario.diario_id='.$n_folio.' AND YEAR(cuenta_has_diario.fecha)='.$key->anio.' AND cuenta_has_diario.n_asiento='.$key->n_asiento.''); ?>
                 
                 <td>
                   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &#45; {{$key->n_asiento}} &#45;
                   <br><br><br>
                 <?php   foreach($de_cuentas as $val) { 
                
                  echo $val->nombre;  ?><br><?php } ?>&nbsp; &nbsp; &nbsp; &nbsp;

                <?php $a_cuentas= \DB::select('SELECT DISTINCT cuentas.id, cuentas.nombre, cuentas.tipo, cuenta_has_diario.a_monto FROM cuentas, cuenta_has_diario, diario WHERE cuentas.id=cuenta_has_diario.c_destino AND cuenta_has_diario.diario_id='.$n_folio.' AND YEAR(cuenta_has_diario.fecha)='.$key->anio.' AND cuenta_has_diario.n_asiento='.$key->n_asiento.''); ?>

                 <?php  foreach($a_cuentas as $item)  { ?> 
                 <?php echo $item->nombre; ?><br>&nbsp; &nbsp; &nbsp; &nbsp; <?php  } ?>
                <br><hr>&nbsp; &nbsp; &nbsp; &nbsp; <?php echo $key->descripcion; ?></td>
                
                <td style="text-align: center; "><br>
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
                
                <td style="text-align: center; ">
                <?php   foreach($de_cuentas as $val) { 
                 
                 echo number_format($val->de_monto,2,',','.'); 
                $activo[]= $val->de_monto;
                 
                  ?> <br> <?php }?> 
                   
                </td>
                <td style="text-align: center;  ">

                  
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
             </tr>
     
                            <?php  }?>
                          
                          <tr>
                                <?php
                                if (isset($activo)) {
                                $debe=array_sum($activo);
                                }else{
                                    $activo[]=0; 
                                }

                                 if (isset($pasivo)) {
                                $haber=array_sum($pasivo);
                                }else{  
                                 $pasivo[]=0;
                                }

                                 ?>
                                <td colspan="3" style="text-align: center;">VAN</td>
                                <?php if (isset($debe)) { ?>
                                <td style="text-align: center; ">
                                {{number_format($debe,2,',','.')}}</td>
                                <?php   }else{
                                    $debe=0;
                               ?>
                                <td style="text-align: center; ">
                                {{number_format($debe,2,',','.')}}</td>
                                <?php } ?>

                                <?php if (isset($haber)) { ?>
                                <td style="text-align: center;  ">{{number_format($haber,2,',','.')}}</td>
                                <?php   }else{
                                    $haber=0;
                                ?>
                                <td style="text-align: center; ">{{number_format($haber,2,',','.')}}</td>
                              <?php  } ?>
                          </tr>
                        
                         
                               
                               </tbody>
                    </table>

             
             
                      

</body>

</html>
