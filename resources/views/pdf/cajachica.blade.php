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
       
          margin: 1cm 2cm 2cm 1cm;
         }


        table {
            border-collapse: collapse;
            width: 105%;


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
            <h2>EICHE, C.L</h2>
            <small class="float-left">{{$key->direccion}}</small><br>
            <small>RUT: {{$key->tipo_documento}}-{{$key->ruf}}</small>
            <small class="float-left">Telefono: +{{$key->codigo}} {{$key->telefono}}</small><br>
            <small class="float-left">Correo: {{$key->email}}</small>
            <small class="float-left">Web: </small>

            
            <img class="circular--square" src="../public/{{ $key->url_image }}">
     

         @endforeach

        </div>
   

        

    </div>


             <h2 style="text-align: center;">Movimientos de Caja Chica</h2> <br>
             <h4>Rango de impresión: {{$fecha}} al {{$fecha2}}</h4>
             
              <table border="1" >
               

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

                            <td id="c"><b></b></td>
                            <td id="c">{{$item->fecha}}</td>
                            <td id="c"></td>
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
                            <th></th>
                            
                        </tr>
                    </tbody>

                </table>
        

</body>

</html>
