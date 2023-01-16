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

     
     <br><br><br><br><br><br>
 
     <div class="container" style="margin-right: 0.8cm; margin-left: 1cm; justify-content: center;">

 @foreach($empresa as $key)     
@foreach($autoridad as $k)    
@foreach($inven as $ky) 
@foreach($respon as $y)

        <div style="text-align: justify; font: arial; font-size: 12;"><strong><center>ACTA DE ASIGNACIÓN RESPONSABLES POR USO<br> 
        DE BIENES PÚBLICOS ESTADALES
    </center></strong></div>
    <br>

    <div style="text-align: justify; font: arial; font-size: 12;"><strong><p style="text-align: right;">N° {{$y->n_resolucion}}</p></strong></div>



        <br>
    <div style="text-align: justify; font: arial; font-size: 12;">Yo, <b style="text-transform: uppercase;"><strong>{{$k->nombres}} {{$k->apellidos}}</strong></b>, titular de la cedula de identidad <strong>{{$k->tipo_doc}}-{{number_format($k->cedula, 0, ".", ".")}}</strong> actuando en mi condición de Superintendente del <strong><b style="text-transform: uppercase;">{{$key->nombre}}</b></strong>, designado según Decreto N° 4264, de fecha veinte (20) de diciembre del año 2021, publicado en la Gaceta Oficial del estado Aragua, Ordinaria N° 2925 de la misma fecha, actuando en este acto, como máxima autoridad del ente u órgano adscrito al Gobierno Bolivariano de Aragua, autorizo @if ($y->sexo=="Masculino")al ciudadano @else a la ciudadana @endif <b style="text-transform: uppercase;"><strong>{{$y->nombres}} {{$y->apellidos}}</strong></b>, titular de la cedula de identidad N° <strong>{{$y->tipo_doc}}-{{number_format($y->cedula, 0, ".", ".")}}.</strong>Hago constar, que por medio del presente documento administrativo, se le asigna @if ($y->adscripcion=="Despacho de Superintendencia") al @else a la @endif <b style="text-transform: uppercase;"><strong>{{$y->adscripcion}}</strong></b> DEL <strong><b style="text-transform: uppercase;">{{$key->nombre}}</b></strong>,los bienes públicos estadales descritos en el inventario anexo y que forman parte integrante de la presente Acta. Y yo, <b style="text-transform: uppercase;"><strong>{{$y->nombres}} {{$y->apellidos}}</strong></b>,  antes identificado, declaro que recibo los bienes públicos muebles especificados en el inventario anexo y manifiesto que se encuentran en buenas condiciones de uso y conservación para ser utilizados por mi persona  y el equipo @if($ky->tipo=="Gerencia")de la Gerencia a mi cargo, @else de la Jefatura a mi cargo, @endif como Responsable por Uso dentro de las instalaciones del {{$key->nombre}} o fuera de ella, cuando sea requerida y autorizada, únicamente para el desempeño de mis funciones como {{$y->tipocargo}}.En virtud de la presente asignación y en mi condición de Responsable por Uso y custodio de los bienes descritos en el inventario anexo, me comprometo a cumplir las siguientes clausulas: <strong>PRIMERA:</strong> Utilizar los bienes públicos estadales, bajo mi custodia de manera responsable y tomar las medidas de resguardo aplicables según la naturaleza del bien para evitar el deterioro acelerado, hurto, robo, extravió o perdida de los mismos. <strong>SEGUNDO:</strong> Mostrar los bienes en custodia a los responsables jerárquicos pertenecientes al órgano de adscripción del bien y al personal de la administración pasiva, para sus inspecciones, chequeo de inventarios o auditorias, cuando lo requieran. <strong>TERCERA:</strong> No instalar a los equipos de computación y/o comunicación dispositivos, programas o aplicaciones no autorizadas por el área de informática, a objeto de protegerlos de daños o robos a la información, así como, daños a hardware y software. <strong>CUARTA:</strong> En caso de fallas o defectos en el funcionamiento del bien, me comprometo a notificarlo de manera expedita al jefe inmediato, al área de tecnología, según sea el caso, para la evaluación, reparación o desincorporación del bien. <strong>QUINTA:</strong> Me comprometo a cumplir con la disponibilidad del bien cuando se requiera para los mantenimientos respectivos, en caso de no cumplir asumo la responsabilidad de daños que pudiese originarse por el incumplimiento del mantenimiento que requiera el bien asignado. <strong>SEXTA:</strong> En caso de ocurrencia de robo, hurto, apropiación indebida, deterioro por uso inapropiado, extravió y/o perdida de algún bien asignado en la presente Acta, deberá notificarlo de manera expedita a mi jefe inmediato, para que se accionen los procedimientos respectivos, a objetos de determinar las responsabilidades que correspondan, en caso de no notificar, me veré en la obligación de responder tanto civil, penal y administrativamente si fuera el caso. <strong>SEPTIMA:</strong> A los efectos de aplicación de la <strong>CLAUSULA SEXTA:</strong> Inmediatamente de ocurrido el hecho de robo, hurto, apropiación indebida, extravió y/o perdida deberá formular la denuncia ante el cuerpo de Investigaciones Científicas, Penales y Criminalísticas (CICPC) y notificarlo al jefe inmediato, mediante informe detallado con la respectiva denuncia como soporte del mismo, con indicación a las circunstancias, tiempo y lugar del hecho ocurrido para que estos lo notifiquen a la Gerencia de Administración y Finanzas, según aplique, con el objeto de que se haga la participación a la empresa aseguradora y se dé inicio a los procedimientos pertinentes. <strong>OCTAVA:</strong> Quedo en cuenta que la negligencia o impericia en el manejo de los bienes públicos estadales, así como la omisión de las notificaciones antes mencionadas, podrán generar responsabilidades disciplinarias, administrativas, penales o civiles, de acuerdo a lo establecido a la Ley Orgánica de Bienes Públicos, Ley Orgánica de la Contraloría General de la Republica y del Sistema Nacional de Control Fiscal, Ley contra la Corrupción y demás leyes que regulan la materia. Se hacen dos (02) ejemplares de un mismo tenor. En fecha @php setlocale(LC_TIME, "spanish"); echo strftime("%d de %B del año %Y", strtotime($ky->fecha)); @endphp.</div>

<br><br><br>
    <div style="text-align: left; font: arial; font-size: 12;">Quien entrega;</div>


 <br><br><br><br><br><br>  

    <div style="text-align: center; font: arial; font-size: 10;"><center style="text-transform: uppercase;"><strong>{{$k->nombres}} {{$k->apellidos}}   <br>                   
C.I {{$k->tipo_doc}}-{{number_format($k->cedula, 0, ".", ".")}} 
<br> SUPERINTENDENTE DEL  {{$key->nombre}}</strong></center>
<center style="margin-left: 1cm; margin-right: 1cm;">Según Decreto N° 4264 de fecha 20 de diciembre del año 2021 Publicado en Gaceta Ordinaria N° 2925 de la misma fecha, emanada por la Gobernación del Estado Aragua</center>
</div>
<br><br><br>  

@if ($y->adscripcion=="Gerencia de Administración y Finanzas")  



@foreach($admin as $a)
<div style="text-align: left; font: arial; font-size: 12;">Quien recibe;</div>

<br><br><br><br><br><br>  
<div style="text-align: center; font: arial; font-size: 10;"><center style="text-transform: uppercase;"><strong>{{$a->nombres}} {{$a->apellidos}}<br>                   
C.I {{$a->tipo_doc}}-{{number_format($a->cedula, 0, ".", ".")}} <br>
Gerente de Administración y Finanzas
@if($a->condicion=="Encargado-Ad Honorem" || $a->condicion=="Encargado")
(E)
@endif
<br> </strong></center>
<center style="margin-left: 2cm; margin-right: 2cm;">Según Resolución N° {{$a->n_resolucion}} de fecha  @php setlocale(LC_TIME, "spanish"); echo strftime("%d de %B del año %Y", strtotime($a->fecha_reso)); @endphp <br>Notificado en la misma fecha</center>

</div>
<br><br><br>

@endforeach 
@else

<div style="text-align: left; font: arial; font-size: 12;">Quien recibe;</div>
<br><br><br><br><br><br>  

 <div style="text-align: center; font: arial; font-size: 10;"><center style="text-transform: uppercase;"><strong>{{$y->nombres}} {{$y->apellidos}}   <br>                   
C.I {{$y->tipo_doc}}-{{number_format($y->cedula, 0, ".", ".")}} 
<br>
{{$y->tipocargo}} de {{$ky->nombre}}

@if($y->condicion=="Encargado-Ad Honorem" || $y->condicion=="Encargado")
(E)
@endif
</strong></center><center style="margin-left: 2cm; margin-right: 2cm;">
Según Resolución N° {{$y->n_resolucion}} de fecha  @php setlocale(LC_TIME, "spanish"); echo strftime("%d de %B del año %Y", strtotime($y->fecha_reso)); @endphp <br>
Notificado en la misma fecha </center>                                                                                                                                  

</div>
<br><br><br>

@foreach($admin as $a)
<div style="text-align: left; font: arial; font-size: 12;">Responsable Administrativo;</div>

<br><br><br><br><br><br>  
<div style="text-align: center; font: arial; font-size: 10;"><center style="text-transform: uppercase;"><strong>{{$a->nombres}} {{$a->apellidos}}<br>                   
C.I {{$a->tipo_doc}}-{{number_format($a->cedula, 0, ".", ".")}} <br>
Gerente de Administración y Finanzas
@if($a->condicion=="Encargado-Ad Honorem" || $a->condicion=="Encargado")
(E)
@endif
<br> </strong></center>
<center style="margin-left: 2cm; margin-right: 2cm;">Según Resolución N° {{$a->n_resolucion}} de fecha  @php setlocale(LC_TIME, "spanish"); echo strftime("%d de %B del año %Y", strtotime($a->fecha_reso)); @endphp <br>Notificado en la misma fecha</center>

</div>
<br><br><br>

@endforeach 

@endif
        
            
     </div>
@endforeach 
 @endforeach 
 @endforeach 
  @endforeach

</body>
    


</html>

