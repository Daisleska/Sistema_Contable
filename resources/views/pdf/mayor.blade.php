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


             <h2 style="text-align: center;">Libro Mayor</h2> <br>
            @foreach($cuen as $val)
                            <table border="1" width="470">
               

                    <thead>
                        
                        <tr>
                            <th style="text-align: left;" colspan="6">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;{{$val->nombre}} &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;N°{{$val->codigo}}</th>
                        </tr>
                        <tr>
                            <th id="alto">Fecha</th>
                            <th id="alto">Explicación</th>
                            <th id="alto">Ref.</th>
                            <th id="alto">Debe</th>
                            <th id="alto">Haber</th>
                            <th id="alto">Saldo</th>
                       
                        </tr>
                    </thead>
                    <tbody class="text-center">
                         
                         @foreach($bus as $key)
                         
                        
                           @if($key->cuenta_id==$val->cuenta_id) 
                          

                           @if($key->debe)
                           <tr style="text-align: center;">

                               <td>{{$key->fecha}}</td>
                               <td style="text-align: left;">{{$key->descripcion}}</td>
                               <td>{{$key->n_folio}}/ {{$key->n_asiento}}</td>
                               <td style="text-align: center;">{{number_format($key->debe,2,',','.')}}</td>
                               <td></td>
                            
                                <td>{{number_format(abs( $saldos[$i][1]),2,',','.')}}</td> 
                            </tr>
                            
                            @else if($key->haber)
                            <tr style="text-align: center;">

                               <td>{{$key->fecha}}</td>
                               <td style="text-align: left;">{{$key->descripcion}}</td>
                               <td>{{$key->n_folio}}/ {{$key->n_asiento}}</td>
                               <td></td>
                               <td style="text-align: center;">{{number_format($key->haber,2,',','.')}}</td>

                            
                               <td>{{number_format(abs( $saldos[$i][1]),2,',','.')}}</td>
                            
                          
                            </tr>

                            @endif {{$i++}}
                            @endif
                          
                        
                            @endforeach
                            
                         


                            @foreach($total as $item)
                            @if($val->cuenta_id==$item[0])
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                @if($item[1])
                                <th>{{number_format($item[1],2,',','.')}}</th>
                                @else 
                                <th></th>
                                @endif
                                @if($item[2])
                                <th>{{number_format($item[2],2,',','.')}}</th>
                                @else 
                                <th></th>
                                @endif

                                <th></th>
                            </tr>
                            @endif
                            @endforeach  
                            
                          
                     </tbody>
                    
        
                </table>  
                <br>
                @endforeach  
            
</body>

</html>
