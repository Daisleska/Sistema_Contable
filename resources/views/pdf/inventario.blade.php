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
            
            <small>RUT:{{$key->tipo_documento}}-{{$key->ruf}}</small>
            <small id="fecha" style="margin-left: 16cm;">
            Fecha: {{ $date }}</small><br>
            <small class="float-left">{{$key->direccion}}</small> <br>
            <small class="float-left">Telefono: +{{$key->codigo}} {{$key->telefono}}</small> /
            <small class="float-left">Correo: {{$key->email}}</small>

            
            <img class="circular--square" src="../public/{{ $key->url_image }}">
            <h3 id="titulo">EICHE.cl</h3>

        </div>

         @endforeach

        </div>
   

        

    </div>


             <h2 style="text-align: center;">Inventario</h2> <br>
             
                            <table border="1" >
               

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
                        

                        </tr>
                        @endforeach
                    </tbody>
                </table>
        

</body>

</html>
