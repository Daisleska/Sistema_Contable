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
<br>

             <h2 style="text-align: center;">Movimientos de Caja Chica</h2> <br>
             <h4>Rango de impresión: {{date("d-m-Y", strtotime($fecha))}} al {{date("d-m-Y", strtotime($fecha2))}}</h4>
             
              <table border="1" width="470" >
               

                    <thead class=>
                        <tr>
                            <th id="alto">N°</th>
                            <th id="alto">Fecha</th>
                            <th id="alto">Concepto</th>
                            <th id="alto">Ingresos</th>
                            <th id="alto">Egresos</th>
                            <th id="alto">Saldo</th>
                       


                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($pdf as $item)
                        <tr>

                            <td id="c"><b>{{$item->id}}</b></td>
                            <td id="c">{{date("d-m-Y", strtotime($item->fecha))}}</td>
                            <td id="c">{{$item->concepto}}</td>
                            <td id="c">{{number_format($item->ingresos, 2,',','.')}}</td>
                            <td id="c">{{number_format($item->egresos, 2,',','.')}}</td>
                            <td id="c">{{number_format($item->saldo, 2,',','.')}}</td>
                        

                        </tr>
                        @endforeach
                        <tr>

                        <?php 
                       

                        $total_ingreso=array_sum($total_ingresos);       
                        $total_egreso=array_sum($total_egresos);
                        ?>


                        
                         
                        
                     
                            <th colspan="3"></th>
                            <th>{{number_format($total_ingreso, 2,',','.')}}</th>
                            <th>{{number_format($total_egreso, 2,',','.')}}</th>
                            <th>{{number_format($item->saldo, 2,',','.')}}</th>

                            
                        </tr>
                    </tbody>

                </table>
        

</body>

</html>
