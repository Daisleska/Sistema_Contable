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

        
        
        <h3 class="float-center" id="titulo">___________________________    FACTURA      ____________________________</h3>
     
      
  
     @foreach($empresa as $key)
     @foreach($facturac as $val)
   

      
      <table>
      
      <tr> 
            <th>
            Fecha: {{$val->fecha}} 
           <br>N° Factura {{$val->n_factura}}
           <br>N° de Control {{$val->n_control}}</th> 
           <th><img class="circular--square" src="../public/{{ $key->url_image }}"></th>  
            
      </tr>
      <tr>
            
           
            
            
      </tr>      
      </table>
    
     
        <hr>
        <br>
        <table>

        <tr>

         <br>
         <th id="l" >{{$key->nombre}}</th>
         <th id="l">PROVEEDOR</th>
        
        </tr>
         <tr>
        
           <th id="l">{{$key->tipo_documento}}-{{$key->ruf}}</th>
           <th id="l">{{$val->nombre}}</th>
          
                
        </tr>
        <tr>
        
           <th id="l">{{$key->direccion}}</th>
           <th id="l">{{$val->direccion}}</th>
                
        </tr>
        
        <tr>
        
           <th id="l">{{$key->email}}</th>
           <th id="l">{{$val->correo}}</th>
                
        </tr>
        @endforeach
        @endforeach  

        </table>
        <br><br>
        
        <table border="1"  width="470">
         
                <thead>
                <tr style="background-color:#008080;">
                   <th id="alto">Producto</th>
                   <th id="alto">Descripción</th>
                   <th id="alto">Cantidad</th>
                   <th id="alto">Precio</th> 
                   <th id="alto">Importe</th>
                </tr>

                </thead>
                <tbody>
                @foreach($facturac as $key)
                <tr>
                  <td id="c">{{$key->producto}}</td>
                  <td id="c">{{$key->descripcion}}</td>
                  <td id="c">{{$key->cantidad}}</td>
                  <td id="c">{{number_format($key->precio,2,',','.')}} {{$key->divisas}}</td>
                  <td id="c">{{number_format($key->importe,2,',','.')}} {{$key->divisas}}</td>
                </tr>

                <tr>
                    <th id="alto" scope="row" colspan="2" style="text-align: right;">CANTIDAD DE ARTÍCULOS</td>
                    <td id="c">{{$key->cantidad}}</td>
                    <td id="c"><strong>SUB TOTAL</strong></td>
                    <td id="c">{{number_format($key->sub_total,2,',','.')}} {{$key->divisas}}</td>
                    
                </tr>

                <tr>
                  <th scope="row" colspan="3" id="alto" ></td>
                  <td id="c"><strong>I.V.A {{$key->p_iva}}%</strong></td>
                  <td scope="row" id="c">{{number_format($key->iva,2,',','.')}} {{$key->divisas}}</td>
                </tr>
                 

                <tr>
                  <th scope="row" colspan="3" id="alto" ></td>
                  <td id="c"><strong>TOTAL</strong></td>
                  <td scope="row" id="c">{{number_format($key->total,2,',','.')}} {{$key->divisas}}</td>
                </tr>
                 
                  @endforeach                                 
                </tbody>
                </table>
       
        

    </div>


</body>

</html>
