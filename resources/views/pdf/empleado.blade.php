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
          margin: 0mm 1cm 1cm 1cm;
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
    <table border="0"  width="500">
        <tr>
       
           <img class="circular--square" src="../public/uploads/membrete.jpg">
            
     

         @endforeach

      </table> 

        </div>
   

        

    </div>

    <h2 style="text-align: center;">Personal</h2> <br>
             

<table border="1" width="15cm">
                        <thead>
                            <tr>
                                
                                <th id="alto">Nombres y Apellidos</th>
                                <th id="alto">Cedula</th>
                                <th id="alto">Fecha de Nacimiento</th>
                                <th id="alto">Sexo</th>
                                <th id="alto">Estado Civil</th>
                                <th id="alto">Tipo de Personal</th>
                                <th id="alto">Cargo</th>
                                <th id="alto">Dirección de Adscripcion</th>
                                <th id="alto">Fecha de Ingreso</th>
                                <th id="alto">Dirección</th>
                            </tr>
                            </tr>

                            </tr>
                        </thead>
                    
                    
                        <tbody>
                @foreach($empleado as $key)
                <tr>
                  
                  <td id="c">{{$key->nombres}} {{$key->apellidos}}</td>
                  <td id="c">{{$key->tipo_doc}}{{$key->cedula}}</td>
                  <td id="c">{{$key->fecha_nac}}</td>
                  <td id="c">{{$key->sexo}}</td>
                  <td id="c">{{$key->estado_civil}}</td>
                  <td id="c">{{$key->tipo_personal}}</td>
                  <td id="c">{{$key->cargo}}</td>
                  <td id="c">{{$key->adscripcion}}</td>
                  <td id="c">{{$key->fecha_ingreso}}</td>
                  <td id="c">{{$key->direccion}}</td>

                  
                
                  
                @endforeach
                          
                             </tbody>
                    </table>
                 </body>

</html>
