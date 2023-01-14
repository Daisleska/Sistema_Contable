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
         <img class="circular--square" src="../public/uploads/membrete.jpg">
            
     

         @endforeach

      </table> 

        </div>
   

        

    </div>

    <h2 style="text-align: center;">Bienes Públicos</h2> <br>
             

<table border="1" width="500">
                        <thead>
                            <tr>
                                
                                <th id="alto">Nombre</th>
                                <th id="alto">Código</th>
                                <th id="alto">Cantidad</th>
                                <th id="alto">Grupo</th>
                                <th id="alto">SubGrupo</th>
                                <th id="alto">Sección</th>
                                <th id="alto">Valor Unitario</th>
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                @foreach($bienes as $key)
                <tr>
                  
                  <td id="c">{{$key->nombre}}</td>
                  <td id="c">{{$key->codigo}}</td>
                  <td id="c">{{$key->cantidad}}</td>
                  <td id="c">{{$key->grupo}}</td>
                  <td id="c">{{$key->sub_grupo}}</td>
                  <td id="c">{{$key->sec}}</td>
                  <td id="c">{{number_format($key->valor_u,2,',','.')}} Bs</td>
                  
                @endforeach
                          
                             </tbody>
                    </table>
                 </body>

</html>
