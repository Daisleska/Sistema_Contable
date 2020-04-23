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
            width: 20%;
        }

        h3 {
            text-align: center;
        }

        small {
            margin-top: 20%;
        }

        #titulo {
            text-align: right;
            padding-right: 50px;
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
        }

        table {
            border-collapse: separate;

        }

        #tabla {

            margin-top: -150px;

        }

    </style>
</head>

<body>
    <div class="row">
        
        <div id="fecha" class="float-right">
            Fecha: {{ $date }} </div>

            <div id="fecha">

            <p class="float-left"><small>RIF:</small> J-29954809-0</p>
            <small class="float-left">Maracay Edo. Aragua, Av. Las Delicias</small> <br>
            <small class="float-left">Telefono: 0426-3186547</small> /
            <small class="float-left">Correo: stylom@gmail.com</small>

            {{-- Logo de la empresa --}}
            
            <h3 id="titulo">EICHE.cl</h3>

        </div>



        </div>
   

        

    </div>

    <br><br><br><br><br><br><br><br><br>

    <div id="tabla">
        <div class="row">
             <h2 class="text-center">Listado de facturas de compras</h2> <br>
             <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mt-4 table-centered">
            
               

                    <thead class=>
                        <tr>
                            <th>#</th>
                            <th>Descripción</th>
                            <th>Código</th>
                            <th>Existencia</th>
                            <th>Unidad</th>
                            <th>precio</th>
                       


                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($inventario as $item)
                        <tr>

                            <td><b>{{ $i++ }}</b></td>
                            <td>{{$item->descripcion}}</td>
                            <td>{{$item->codigo}}</td>
                            <td>{{$item->existencia}}</td>
                            <td>{{$item->unidad}}</td>
                            <td>{{number_format($item->precio, 2,',','.')}}</td>
                        

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

</body>

</html>
