<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ public_path('../resources/views/pdf/boostrap/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />

  <style>

        #header{
            position: fixed;
            top: 0cm;
            left: 1cm;
        }

        .imgHeader {
            float: left;
            width: 25cm;

        }

        .img {
            
            width: 3cm;
            height: 3cm;

        }
     

     #footer{
    position: fixed;
    bottom: 0cm;
    left: 1cm;
     }


    .footer{
        width: 25cm;
    }

   



    </style>
    
</head>

<body>
<div id="header">
    <img class="imgHeader" src="../public/uploads/membrete.jpg">
</div>

     <div id="footer">

         <img class="footer" src="../public/uploads/piedepagina.jpg">
     </div>
    
     <div class="container" style="margin-right: 0.8cm; margin-left: 0.8cm; justify-content: center;">
       
 <br><br><br><br><br><br>
 
  @foreach($empresa as $key)
 @foreach($autoridad as $k)
 @foreach($info as $j) 
        <table border="1" style="width: 26cm; margin-top: 1cm; margin-right: 0.8cm;"> 
            <tr>
                <th colspan="3" rowspan="2">
                <img class="img" src="../public/uploads/logobernacion.png">
                </th>
                <th colspan="1" rowspan="4" style="width: 1cm; font: arial; font-size: 7;">INVENTARIO DE BIENES MUEBLES</th>
                <th colspan="1"  rowspan="4" style="width: 1cm; font: arial; font-size: 7;">FORMULARIO B-M-1</th>
                <th colspan="3"  style="width: 3cm; font: arial; font-size: 7;"></th>
              
            </tr>
            <tr>
             
                
                
             
                <th colspan="3" style="width: 3cm; font: arial; font-size: 7;">FECHA</th>
            </tr>
            <tr>
                <th colspan="3" rowspan="2" style="width: 2cm; font: arial; font-size: 7;">SECRETARIA SECTORIAL DEL PODER POPULAR PARA LA HACIENDA ADMINISTRACION Y FINANZAS              COORDINACION DE SERVICIO GENERALES                                                     UNIDAD DE BIENES MUEBLES E INMUEBLES</th>
           
                <th style="font: arial; font-size: 7;">D</th>
                <th style="font: arial; font-size: 7;">M</th>
                <th style="font: arial; font-size: 7;">A</th>
            </tr>

            <tr>
             <th style="font: arial; font-size: 7;">@php echo strftime("%d", strtotime($j->fecha)); @endphp</th>
                <th style="font: arial; font-size: 7;">@php echo strftime("%m", strtotime($j->fecha)); @endphp</th>
                <th style="font: arial; font-size: 7;">@php echo strftime("%Y", strtotime($j->fecha)); @endphp</th>
            </tr>
            <tr>
                <th colspan="3" style="font: arial; font-size: 7; text-align: left; text-transform: uppercase;">ENTIDAD PROPIETARIA: {{$key->nombre}}</th>
                 <th colspan="2" style="font: arial; font-size: 7; text-align: left; text-transform: uppercase;">SERVICIOS: {{$key->nombre}}</th>
                  <th colspan="3" style="font: arial; font-size: 7; text-align: left;text-transform: uppercase;">UNIDAD DE TRABAJO O DEPENDENCIA: {{$key->nombre}}</th>
                    
                </th>
            </tr>

             <tr>
                <th colspan="3" style="font: arial; font-size: 7; text-align: left;">ESTADO: ARAGUA</th>
                 <th colspan="2" style="font: arial; font-size: 7; text-align: left;">MUNICIPIO: GIRARDOT</th>
                  <th colspan="3" style="font: arial; font-size: 7; text-align: left;">DIRECCIÓN: AV. 10 DE DICIEMBRE, ENTRE CALLE SUCRE Y JUNÍN, EDIF. SETA. MARACAY EDO. ARAGUA</th>
                    
                </th>
            </tr>@foreach($nom as $n)
            <tr>
                <th colspan="8" style="font: arial; font-size: 7; text-align: center; text-transform: uppercase;">{{$n->tipo}} de {{$n->nombre}}</th>
            </tr>
                @endforeach
            <tr>
                <th colspan="3" style="font: arial; font-size: 7;">Clasificación 
                (Código)</th>
                <th rowspan="2" style="font: arial; font-size: 7;">Cantidad</th>
                <th rowspan="2" style="font: arial; font-size: 7;">N° de 
                Ident.</th>
                <th rowspan="2" style="font: arial; font-size: 7;">Nombre y Descripción de los Bienes</th>
                <th rowspan="2" style="font: arial; font-size: 7;">Valor Unitario Bs.</th>
                <th rowspan="2" style="font: arial; font-size: 7;">Valor total Bs.</th>
            </tr>

            <tr>
                <th style="font: arial; font-size: 7;">Grupo</th>
                <th style="font: arial; font-size: 7;">Sub Grupo</th>
                <th style="font: arial; font-size: 7;">Sec.</th>
                
            </tr>
            @foreach($inven as $ky)
            <tr>
                <th style="font: arial; font-size: 7;">{{$ky->grupo}}</th>
                <th style="font: arial; font-size: 7;">{{$ky->sub_grupo}}</th>
                <th style="font: arial; font-size: 7;"> {{$ky->sec}}</th>
                <th style="font: arial; font-size: 7;">{{$ky->cantidad}}</th>
                <th style="font: arial; font-size: 7;">{{$ky->codigo}}</th>
                <th style="font: arial; font-size: 7;">{{$ky->bien}}</th>
                <th style="font: arial; font-size: 7;">{{number_format($ky->valor_u,2,',','.')}}</th>
                <th style="font: arial; font-size: 7;"></th>
            </tr>
            @endforeach
            <tr>
                 <th colspan="2" style="font: arial; font-size: 7;">DELEGADO (A) BIENES PUBLICOS</th>
                 @foreach($nom as $n)
                 <th colspan="2" style="font: arial; font-size: 7; text-transform: uppercase;">{{$n->tipo}} de {{$n->nombre}}</th>
                  @endforeach
                 <th colspan="2" style="font: arial; font-size: 7;">DESPACHO DE SUPERINTENDENCIA </th>
                 <th colspan="2" style="font: arial; font-size: 7;">RESUMEN</th>
            </tr>

            <tr>
                <th colspan="2" rowspan="4" style="font: arial; font-size: 7; text-align: left;">NOMBRE Y APELLIDO:<br>MAYERLING MILEIKA TODETH MELENDEZ<br>

                FIRMA Y SELLO:
                <br>

             @foreach($respon as $y) 
            </th>
                 <th colspan="2" rowspan="4" style="font: arial; font-size: 7; text-align: left; text-transform: uppercase;">NOMBRE Y APELLIDO:<br>{{$y->respo_nombre}} {{$y->respo_apellido}}<br>
                 
                 FIRMA Y SELLO:
                 <br>
                 </th>
                   @endforeach
                 <th colspan="2" rowspan="4" style="font: arial; font-size: 7; text-align: left; text-transform: uppercase;">NOMBRE Y APELLIDO:<br>{{$k->nombres}} {{$k->apellidos}}<br><br>

                FIRMA Y SELLO:<br>
            </th>
                 <th colspan="2" rowspan="4" style="font: arial; font-size: 7; text-align: center;">N° TOTAL DE MUEBLES<br>@php echo count($inven); @endphp<br>

                 MONTO TOTAL EN Bs.
                 <br>

             </th>
            </tr>
            

          
          
          

           
          
          
          

           
                
              

            
           
        </table>
        
         
     </div>
 </body>       
     @endforeach
 
            
 @endforeach    
@endforeach
 

</html>
