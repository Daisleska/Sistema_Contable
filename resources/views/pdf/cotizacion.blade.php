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
    <div class="row">

        
        
        
     
      
  
     @foreach($empresa as $key)
     @foreach($cotizacion as $val)
   

      
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
            
            
     
<hr>


      </table>  
      <br>
<h3 class="float-center" id="titulo">COTIZACIÓN</h3>

    <br><br>
     <table border="0"  width="470">

      <tr> 
           
 
         <th style="text-align: right;">N° {{$val->n_cotizacion}}</th>

           
      </tr>
      <tr>  
             
            <th style="text-align: right;">
            Fecha de Emisión: {{$fechae}} </th>
      </tr>
     
      <tr>
           <th style="text-align: right;">
            Fecha de Vencimiento: {{$fechaven}} </th>
    </tr>

      </table>

 
        <!--tabla empresa y cliente -->


    
     <table  border="0" width="470">
  

       
        <tr>
          <br>
          <td  align="left"><b>Cliente:</b> {{ $val->nombre }} <b> RUT: </b> {{ $val->tipo_documento }}-{{ $val->ruf }}</td>
        </tr>
       
        <tr>
          <td  align="left"><b>Oferta Válida por:</b> {{ $val->validez }} días</td>
        </tr>
        
        <tr>
          <td  align="left"><b>Dirigido a:</b></td>
        </tr>

</table>
     @endforeach 
               @endforeach
  
         
        
        <table border="1"  width="470">
         
                <thead>
                  <tr>
                <th colspan="5" style="text-align: center;">PRODUCTOS</th>
              </tr>
                <tr>
                   <th id="alto">Producto</th>
                   <th id="alto">Descripción</th>
                   <th id="alto">Precio</th> 
                   <th id="alto">Cantidad</th>
                   <th id="alto">Importe</th>
                </tr>

                </thead>
                <tbody>
                @foreach($producto as $key)
                 @foreach($cotizacion as $val)
                <tr>
                  <td id="c">{{$key->nombre}}</td>
                  <td id="c">{{$key->descripcion}}</td>
                  <td id="c">{{number_format($key->precio,2,',','.')}} {{$val->divisa}} </td>
                  <td id="c">{{$key->cantidad}}</td>
                  <td id="c">{{number_format($key->importe,2,',','.')}} {{$val->divisa}}</td>
                </tr>
               @endforeach 
               @endforeach
               @foreach($cotizacion as $val)
                <tr>
                    <th id="alto" scope="row" colspan="3"></td>
                    <td id="c"><strong>SUB TOTAL</strong></td>
                    <td id="c">{{number_format($val->sub_total,2,',','.')}} {{$val->divisa}}</td>
                    
                </tr>

                <tr>
                  <th scope="row" colspan="3" id="alto" ></td>
                  <td id="c"><strong>Desc {{$val->p_des}}%</strong></td>
                  <td scope="row" id="c">{{number_format($val->descuento,2,',','.')}} {{$val->divisa}}</td>
                </tr>
               
                <tr>
                  <th scope="row" colspan="3" id="alto" ></td>
                  <td id="c"><strong>TOTAL</strong></td>
                  <td scope="row" id="c">{{number_format($val->total,2,',','.')}} {{$val->divisa}}</td>
                </tr>
                 @endforeach 
                                                  
                </tbody>
                </table>
                <br>
    </div>
     @foreach($cotizacion as $val)
     <table border="0" width="470">
     <tr>
          <td  align="left"><b>Comentarios de Correo:</b> {{ $val->email_comments }}</td>
      </tr>
      <tr>
          <td  align="left"><b>Forma de Pago:</b> {{ $val->c_pago }} | <b>Moneda:</b>{{ $val->divisa }} </td>
      </tr>
    </table>
      @endforeach 
</body>

</html>
