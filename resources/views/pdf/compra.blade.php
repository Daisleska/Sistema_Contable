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
            width: 26cm;
        
      


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
    <table border="0"  width="740">
        <img class="circular--square" src="../public/uploads/membrete.jpg">
            
     

         @endforeach

      </table>  

        
             <h2 style="text-align: center;">Libro Compras</h2>

             <table border="1" width="740">
                 <thead>
                   <tr style="color: black; font-size: 15px; text-align: center;">
                              
                                <th>FEC</th>
                                <th>N° FACT.</th>
                                <th>N° CONT</th>
                                <th>PROVEEDOR</th>
                                <th>RIF</th>
                                <th>COMPRAS IVA</th>
                                <th>MONTO B</th>
                                <th>%</th>
                                <th>IMPUEST</th>
                                <th>COMPRAS NO GRAV.</th>
                                <th>TOTAL COMPRA</th>           
                            </tr>
                        </thead>
                        <tbody style="font-size: 15px;">
                           
                      @foreach($compra as $item)
                <tr style="text-align: center;">
                 
                
                  <td>{{date("d-m-Y", strtotime($item->fecha))}}</td>
                  <td>000{{ $item->n_factura}}</td>
                  <td>000000{{ $item->n_control}}</td>
                  <td>{{ $item->nombre}}</td>
                  <td>{{$item->tipo_documento}}-{{$item->ruf}}</td>
                  <td>{{number_format($item->iva, 2,',','.')}}</td>
                  <td>{{number_format($item->sub_total, 2,',','.')}}</td>
                  <td>0,{{$item->p_iva}}</td>
                  <td>I.V.A</td>
                  <td style="text-align: center;">-</td>
                  <td>{{number_format( $item->total, 2,',','.')}}</td>
             
             
                
                </tr>

                          @endforeach

                <tr style="color: black; text-align: center;">

                      <th COLSPAN="5" style="text-align: right;">TOTAL:</th>
                      <?php
                      if ($total_total>0) {
                            //TOTALES
                         $total_compra=array_sum($total_total);
                         $sub_total=array_sum($total_subtotal);
                         $iva_total=array_sum($total_IVA);
                      //---------------------------------------
                      }else{
                             //TOTALES
                         $total_compra=0;
                         $sub_total=0;
                         $iva_total=0;
                      //---------------------------------------
                      }
                 
                        ?>


                      <th style="color: black;" >{{number_format( $iva_total, 2,',','.')}}</th>
                      <th style="color: black;" >{{number_format( $sub_total, 2,',','.')}}</th>
                  
                      <th></th>
                      <th></th>
                      <th></th>
                     
                      <th  style="color: black;">{{number_format( $total_compra, 2,',','.')}}</th>
                      
                   
                </tr>
           
                             </tbody>
             </table>

            
</body>

</html>


 <script type="text/javascript">
   function buscador(){
      $(document).ready(function(){
        $("select[name=mes]").change & $("select[name=anio]").change & $("input[name=dia]").change(function(){
          var mes =$('select[name=mes]').val();
          var anio =$('select[name=anio]').val();
          var dia =$('input[name=dia]').val();      
          console.log(mes);
          console.log(anio);
          console.log(dia);

       $.get('/compras/'+mes+'/'+anio+'/'+dia+'/buscador',function(data)
      {
        var result = data;
        console.log(result);

       });
        });
       /**/

      })
    }

    </script>
