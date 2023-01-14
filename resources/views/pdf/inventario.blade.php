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


             <h2 style="text-align: center;">Libro de Inventario</h2> <br>
             
                            <table border="1" width="470">
               

                    <thead class=>
                        <tr>
                            <th id="alto">N°</th>
                            <th id="alto">Descripción</th>
                            <th id="alto">Código</th>
                            <th id="alto">Existencia</th>
                            <th id="alto">Unidad</th>
                            <th id="alto">precio</th>
                       


                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($inventario as $item)
                        <tr>

                            <td id="c"><b>{{ $i++ }}</b></td>
                            <td id="c">{{$item->descripcion}}</td>
                            <td id="c">{{$item->codigo}}</td>
                            <td id="c">{{$item->existencia}}</td>
                            <td id="c">{{$item->unidad}}</td>
                            <td id="c">{{number_format($item->precio, 2,',','.')}}</td>
                            
                            <?php 
                            $importe=$item->precio*$item->existencia;
                             $totales[]=$importe; ?>
                        

                        </tr>
                        @endforeach
                    </tbody>
                    <tr>
                        <?php $total=array_sum($totales); ?>
                        <th colspan="5" style="text-align: center; color: black;"> Total en Inventario</th>
                        <th><?php echo number_format($total, 2,',','.'); ?></th>
                    </tr>
                </table>
        

</body>

</html>
