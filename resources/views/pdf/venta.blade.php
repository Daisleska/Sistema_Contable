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
    <table border="0"  width="740">
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

        
             <h2 style="text-align: center;">Libro Ventas</h2>

             <table border="1" width="740">
                 <thead>
                  <tr style="color: black; font-size: 14px; text-align: center;">
                             
                                <th>FECHA</th>
                                <th>Nº FACT</th>
                                <th>Nº CONTR</th>
                                <th>RUT </th>
                                <th>TOTAL VENTA</th>
                                <th>VENTA EXENTA</th>
                                <th>VENTA GRAVADA</th>
                                <th>TASA</th>
                                <th>IMPUEST</th>
                                <th>MONTO RETENIDO</th>
                                <th>COMPROB DE RETENC</th>
                            </tr>
                        </thead>
                    
                    
                        <tbody style="font-size: 15px;">
                    @foreach($venta as $key)       
                <tr style="text-align: center;">
                  <td>{{date("d-m-Y", strtotime($key->fecha))}}</td>
                  <td>000{{$key->n_factura}}</td>
                  <td>000000{{$key->n_control}}</td>
                  <td>{{$key->tipo_documento}}-{{$key->ruf}}</td>
                  <td>{{number_format($key->total,2,',','.')}} {{$key->divisa}}</td>
                  <td>{{number_format($key->sub_total,2,',','.')}} {{$key->divisa}}</td>
                  <td>{{number_format($key->iva,2,',','.')}} {{$key->divisa}}</td>
                  <td>{{$key->porcentaje}} %</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  @endforeach

                </tr>
                
                 <tr style="color: black; text-align: center;">

                      <th COLSPAN="4" style="text-align: right;">TOTAL:</th>
                      <?php
                      if ($total_venta >0) {
                            //TOTALES
                         $total_venta=array_sum($total_venta);
                         $sub_total=array_sum($total_subventa);
                         $iva_total=array_sum($total_IVA_venta);
                      //---------------------------------------
                      }else{
                             //TOTALES
                         $total_venta=0;
                         $sub_total=0;
                         $iva_total=0;
                      //---------------------------------------
                      }
                 
                        ?>
                      
                      <th style="color: black;" >{{number_format( $total_venta, 2,',','.')}}</th>
                      <th style="color: black;" >{{number_format( $sub_total, 2,',','.')}}</th>
                      <th style="color: black;" >{{number_format( $iva_total, 2,',','.')}}</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      
                   
                </tr>
           
                             </tbody>
             </table>
            
</body>

</html>
