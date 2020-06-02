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


             <h2 style="text-align: center;">Libro Diario</h2> <br>
             
                            <table border="1" >
               

                    <thead class=>
                        <tr>
                            <th id="alto">Fecha</th>
                            <th id="alto">Cuenta y Descripción</th>
                            <th id="alto">Ref</th>
                            <th id="alto">Debe</th>
                            <th id="alto">Haber</th>
                            
                       


                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($diario as $key)  
                       
                <tr style=" border-bottom: 0.5px; border-style: solid; " >
                  <td>{{$key->fecha}}</td>
                  <td>{{$key->nombre}}<hr> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{$key->descripcion}}</td>
                  <td>{{$key->cuenta_id}}</td>
                  <?php
                  if ($key->debe_haber =='debe') {  
                   ?>
                  <td>{{number_format($key->monto,2,',','.')}}</td>
                 
                  <td> <hr>{{number_format($key->monto,2,',','.')}}</td>
                  <?php }elseif($key->debe_haber =='haber') {
                    ?>
                  <td> <hr>{{number_format($key->monto,2,',','.')}}</td>
                   <td>{{number_format($key->monto,2,',','.')}}</td>
                    <?php }?>
                
                </tr>
              
           
                          
                    </tbody>
                    @endforeach
                </table>
        

</body>

</html>
