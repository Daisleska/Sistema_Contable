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
      
    <table border="0"  width="500">
         <img class="circular--square" src="../public/uploads/membrete.jpg">
            
            

      </table> 

        </div>
   

        

    </div>

    <h2 style="text-align: center;">Lista de Contratos</h2> <br>
             

<table border="1" width="500" align="center">
                        <thead>
                            <tr>
                                
                                 <th id="alto">Personal</th>
                                 <th id="alto">Fecha E</th>
                                 <th id="alto">Fecha Inicio</th>
                                 <th id="alto">Fecha E</th>
                                 <th id="alto">Status</th>

                            </tr>
                        </thead>
                    
                    
                        <tbody>
                @foreach($contratos as $key)
                <tr>
                  
                  
                  <td id="c">{{$key->nombres}} {{$key->apellidos}}</td>
                  <td id="c">{{$key->fecha}}</td>
                  <td id="c">{{$key->fecha_inicio}}</td>
                  <td id="c">{{$key->fecha_final}}</td>
                  <td id="c">{{$key->status}}</td>


                  
                @endforeach
                          
                             </tbody>
                    </table>
                 </body>

</html>
