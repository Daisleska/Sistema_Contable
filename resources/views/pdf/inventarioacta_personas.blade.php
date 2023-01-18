<!DOCTYPE html>
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
            width: 17cm;

        }
     

     #footer{
    position: fixed;
    bottom: 0cm;
    left: 1cm;
     }


    .footer{
        width: 17cm;
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
     <br><br><br><br><br>
     <div class="container" style="margin-right: 0.8cm; margin-left: 1cm; justify-content: center;">       
     

    <div style="text-align: left; font: arial; font-size: 12;">GERENCIA DE ADMINISTRACIÓN Y FINANZAS<br>
    SERVICIOS GENERALES Y BIENES MUEBLES<br>
    Caución Manifestación de Bienes</div>
    <br>
@foreach($asignacion as $ky)
<table border="1" style="width: 17cm; font: arial; font-size: 10;">    
    <tr>

        <th colspan="2"></th>
        <th style="width: 4cm;">Fecha: {{date("d-m-Y", strtotime($ky->fecha))}}</th>
        <th>Página</th>
    </tr>
    <tr>
        <th colspan="4"><center>Unidad Administradora</center></th>
    </tr>
    <tr >
        <th colspan="4" style="text-align: left;">Denominación del Cargo: {{$ky->tipo_personal}} </th>
    </tr>
    <tr>
        <th colspan="4"><center>Dependencia del Usuario de los Bienes Muebles</center></th>
    </tr>
    <tr >
        <th colspan="4" style="text-align: left;">Denominación de la Unidad: {{$ky->adscripcion}} </th>
    </tr>
    <tr >
        <th colspan="4" style="text-align: left;">Responsable de los Bienes: {{$ky->nombres}} {{$ky->apellidos}} </th>
    </tr>
    <tr >
        <th colspan="4" style="text-align: left;">Cédula de Identidad: {{$ky->tipo_doc}}.-{{number_format($ky->cedula, 0, ".", ".")}} </th>
    </tr>
  
    <tr style="text-align: center;">
        <th>Nro. del Bien/Estadal</th>
        <th style="width: 4cm;">Descripción </th>
        <th>Valor </th>
        <th>Ubicación</th>
    </tr>
    @foreach($bienes as $y)
    <tr style="text-align: center;">
        <th>{{$y->codigo}}</th>
        <th style="width: 4cm;">{{$y->nombre}}</th>
        <th>{{number_format($y->valor_u,2,',','.')}} Bs</th>
        <th>{{$ky->adscripcion}}</th>
    </tr>
    @endforeach
    <tr style="text-align: center;">
        <th colspan="2">Responsable de la Unidad Administradora</th>
        <th colspan="2">Responsable de los Bienes</th>
    </tr>
    @foreach($admin as $key)
    
    <tr>
        <th colspan="2" style="text-align: left;">Apellidos y Nombres: Oscar Rafael Brito Ortega</th>
        <th colspan="2" style="text-align: left;">Apellidos y Nombres: Mayerling Mileika Todeth Melendez</th>
        
  
    </tr>
    <tr>
        <th>C.I.V-13.646.470</th>
        <th style="text-align: left;">Cargo: Gerente de Administración y Finanzas</th>
        <th>C.I. 20.450.282</th>
        <th style="text-align: left;">Cargo: Delegado (a) de Bienes Públicos</th>
    </tr>
    @endforeach
     
     <tr>
        <th colspan="2"><br><br></th>
        <th colspan="2"><br><br></th>
    </tr>
     <tr style="text-align: center;">
        <th colspan="2">Firma</th>
        <th colspan="2">Firma </th>
    </tr>

  




      </table> 

<br><br><br>
 <div style="text-align: justify; font: arial; font-size: 12;"><strong style="text-transform: uppercase;"> YO, {{$ky->nombres}} {{$ky->apellidos}}</strong> responsable y usuario de los bienes asignados, remito la información solicitada para su debido registro de inventario de bienes interno. En consecuencia, me comprometo a observar y acatar las disposiciones legales siguientes:
 </div>
 <br>
 <div style="text-align: justify; font: arial; font-size: 12;">
 <strong><u>. Ley Contra la Corrupción</u></strong>, en su artículo 52, prevé: "...Cualquiera de las personas señaladas en el artículo 3 de la presente Ley que se apropie o distraiga, en provecho propio o de otro, los bienes del patrimonio público o en poder de algún organismo público, cuya recaudación, administración o custodia tenga por razón de su cargo, será penado con prisión de tres (03) a diez (10) años y multa de veinte por ciento (20%) al sesenta por ciento (60%) del valor de los bienes, objeto del delito. Se aplicará la misma pena si el agente, aun cuando no tenga en su poder los bienes, se los apropie o distraiga o contribuya para que sean apropiados o distraídos, en beneficio propio o ajeno, valiéndose de la facilidad que le proporciona su condición de funcionario público. 
</div>
 <br>
<div style="text-align: justify; font: arial; font-size: 12;">
 De igual manera, la Ley Contra la Corrupción, señala en el artículo 21 lo siguiente <b style="font: cursive;">"Los funcionarios y empleados públicos responden civil, penal, administrativa y disciplinariamente por la administración de los bienes y recursos públicos, de conformidad con lo establecido en la Ley"</b>
</div>
 <br>
 <div style="text-align: justify; font: arial; font-size: 12;">
 <strong><u>. Ley de Conservación y Mantenimiento de los Bienes Públicos</u></strong>, en el artículo 5, numerales 1 y 2, referidos al resguardo de los bienes públicos del deterioro, así comotambién evitar la negligencia y desidiaen el manejo. Y finalmente, lo previsto en la  <strong><u>Publicación No. 20</u></strong>, emanada de la Contraloría General de la República, referida a los lineamientos para efectos de registro, ubicación, valoración, resguardo  y control de cada uno de los bienes muebles asignados.
</div>

<br><br><br><br><br>
<div style="text-align: justify; font: arial; font-size: 12;">
 <strong><center style="text-transform: uppercase;">
     {{$ky->nombres}} {{$ky->apellidos}}<br>C.I.{{$ky->tipo_doc}}.-{{number_format($ky->cedula, 0, ".", ".")}}
 </center></strong>
</div>


</div></body></html>
    
@endforeach
