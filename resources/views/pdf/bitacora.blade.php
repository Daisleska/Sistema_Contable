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
   

        

    </div>


             <h2 style="text-align: center;">Bitácora</h2> <br>
             
                            <table border="1" width="470" >
               

                    <thead class=>
                        <tr>
                            <th id="alto">N°</th>
                            <th id="alto">Nombre</th>
                            <th id="alto">Tipo de Usuario</th>
                            <th id="alto">Tipo de Acción</th>
                            <th id="alto">Fecha y Hora</th>
                            
                       


                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($bitacora as $item)
                        <tr>

                            <td id="c"><b>{{ $item->id }}</b></td>
                            <td id="c">{{$item->user}}</td>
                            <td id="c">{{$item->role}}</td>
                            <td id="c">{{$item->action}}</td>
                            <td id="c">{{ date('d-M-Y \a\ \l\a\s H:i:s:A' , strtotime($item->created_at)) }}</td>
                            
                        

                        </tr>
                        @endforeach
                    </tbody>
                </table>
        

</body>

</html>
