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
<div>
     <div id="footer">

         <img class="footer" src="../public/uploads/piedepagina.jpg">
     </div>
     <br><br><br><br><br>
 @foreach($empresa as $key)
 @foreach($autoridad as $k)
 @foreach($contratos as $ky)
     <div class="container" style="margin-right: 0.8cm; margin-left: 1cm; justify-content: center;">
       
   <div style="text-align: justify; font: arial; font-size: 12;">Entre el <b style="text-transform: uppercase;">{{$key->nombre}}</b> creado según Decreto N° 2.423, publicado en Gaceta Oficial del Estado Aragua N° 2.067 de fecha 13 de mayo de 2.013, ente adscrito al Gobierno  Bolivariano de Aragua, y con  Registro de Información Fiscal (RIF) N° {{$key->tipo_documento}}-{{$key->rif}}, representado en este acto por @if ($k->sexo=="Masculino") el ciudadano:<b style="text-transform: uppercase;"> {{$k->nombres}} {{$k->apellidos}}</b>, venezolano, @else la ciudadana:<b style="text-transform: uppercase;"> {{$k->nombres}} {{$k->apellidos}}</b>, venezolana,@endelse @endif titular de la cedula de identidad <strong> N° {{$k->tipo_doc}}-{{number_format($k->cedula, 0, ".", ".")}}</strong>, actuando en su carácter de Superintendente, designado mediante {{$key->decreto_max_auto}}, en cumplimiento de sus funciones conforme lo establece el artículo 11 ordinal 6 del Reglamento sobre la Organización, Atribuciones y Funciones del Servicio de Administración  Tributaria del estado Aragua (SATAR), publicado según Gaceta1.841, de fecha 14 de Julio de 2.011, mediante Decreto N° 2.039, quien para los efectos de este contrato se denominará <strong>@if ($k->sexo=="Masculino") EL CONTRATANTE, @else LA CONTRATANTE, @endelse @endif</strong> por una parte; y por la otra, @if ($ky->sexo=="Masculino") el ciudadano <b style="text-transform: uppercase;">{{$ky->nombres}} {{$ky->apellidos}}</b>, venezolano, @else la ciudadana <b style="text-transform: uppercase;">{{$ky->nombres}} {{$ky->apellidos}}</b>, venezolana, @endif mayor de edad, titular de la cédula de identidad <strong> N° {{$ky->tipo_doc}}-{{number_format($ky->cedula, 0, ".", ".")}}</strong>, {{$ky->estado_civil}}, @if ($ky->sexo=="Masculino")domiciliado en {{$ky->direccion}} quien en lo sucesivo y para los efectos de este Contrato se denominará <strong>EL CONTRATADO</strong>,  conjuntamente se denominaran <strong>LAS PARTES</strong>, se ha convenido en celebrar el presente <strong>CONTRATO DE TRABAJO A TIEMPO DETERMINADO</strong>, el cual se regirá por las leyes vigentes y las cláusulas siguientes: @else domiciliada en {{$ky->direccion}} quien en lo sucesivo y para los efectos de este Contrato se denominará <strong>LA CONTRATADA</strong>,  conjuntamente se denominaran <strong>LAS PARTES</strong>, se ha convenido en celebrar el presente <strong>CONTRATO DE TRABAJO A TIEMPO DETERMINADO</strong>, el cual se regirá por las leyes vigentes y las cláusulas siguientes: @endif
   </div>
        <br><br>
    <div  style="text-align: justify;">
        <strong><center><u>OBJETO DEL CONTRATO</u></center></strong>
        <strong>PRIMERA:</strong> @if ($ky->sexo=="Masculino") <strong>EL CONTRATADO</strong>, @else <strong>LA CONTRATADA</strong> @endif se compromete a prestar sus servicios profesionales para @if ($k->sexo=="Masculino") <strong>EL CONTRATANTE</strong>, @else <strong>LA CONTRATANTE</strong> @endif @if($ky->adscripcion=="Despacho de Superintendencia") en el @else en la @endif <strong>{{$ky->adscripcion}}</strong> desde el día <strong>@php setlocale(LC_TIME, "spanish"); echo strftime("%d de %B del año %Y", strtotime($ky->fecha_inicio)); @endphp hasta el día @php setlocale(LC_TIME, "spanish"); echo strftime("%d de %B del año %Y", strtotime($ky->fecha_final));@endphp. </strong><strong>SEGUNDA:</strong> @if ($ky->sexo=="Masculino") <strong>EL CONTRATADO</strong> deberá cumplir con la jornada de trabajo de lunes a viernes, en el horario comprendido de 08:00 am hasta las 3:30 p.m., de acuerdo a lo contemplado en el artículo 173 del Decreto con Rango Valor y Fuerza de Ley Orgánica del Trabajo, los Trabajadores y las Trabajadoras. El contrato culminará en la fecha del término convenido sin necesidad de que a <strong>EL CONTRATADO</strong>,  se le notifique por escrito, dándose por terminada la relación laboral. @else <strong>LA CONTRATADA</strong> deberá cumplir con la jornada de trabajo de lunes a viernes, en el horario comprendido de 08:00 am hasta las 3:30 p.m., de acuerdo a lo contemplado en el artículo 173 del Decreto con Rango Valor y Fuerza de Ley Orgánica del Trabajo, los Trabajadores y las Trabajadoras. El contrato culminará en la fecha del término convenido sin necesidad de que a <strong>LA CONTRATADA</strong>,  se le notifique por escrito, dándose por terminada la relación laboral. @endif
    </div>
        <br>
        @if ($ky->sexo=="Masculino")
        <strong><center><u>ACTIVIDADES DEL CONTRATADO</u></center></strong>
        @else
        <strong><center><u>ACTIVIDADES DE LA CONTRATADA</u></center></strong>
        @endif
        @if ($ky->sexo=="Masculino")
    <div style="text-align: justify;">
        <strong>TERCERA: EL CONTRATADO</strong> deberá realizar las siguientes actividades @if($ky->adscripcion=="Despacho de Superintendencia") en el @else en la @endif {{$ky->adscripcion}} 
        @else
        <strong>TERCERA: LA CONTRATADA</strong> deberá realizar las siguientes actividades @if($ky->adscripcion=="Despacho de Superintendencia") en el @else en la @endif {{$ky->adscripcion}} 
        @endif específicamente en el área de {{$ky->area}}: {{$ky->tarea}}
</div>
<br>
        <strong><center><u>REMUNERACION Y BENEFICIOS PRESTACIONALES </u></center></strong>
<div style="text-align: justify;">
        <strong>CUARTA:</strong>@if ($k->sexo=="Masculino")  <strong>EL CONTRATANTE</strong> @else  <strong>LA CONTRATANTE</strong> @endif se obliga a pagarle @if ($ky->sexo=="Masculino") al  <strong>CONTRATADO</strong> @else a la  <strong>CONTRATADA</strong> @endif por la prestación de servicios objeto del presente contrato, la cantidad mensual de  <strong>CIENTO TREINTA BOLIVARES SIN CENTIMOS (Bs. 130,00)</strong>, en moneda de curso legal, además de todos los beneficios consagrados en el Decreto con Rango, Valor y Fuerza de Ley Orgánica del Trabajo, los Trabajadores y las Trabajadoras, en el Decreto con Rango Valor y Fuerza de Ley del cestaticket Socialista para
        los Trabajadores y Trabajadoras, por jornada efectivamente laborada, así como cualquier otro beneficio establecido en la normativa venezolana vigente.  <strong>QUINTA:</strong> @if ($ky->sexo=="Masculino")  <strong>EL CONTRATADO</strong> @else  <strong>LA CONTRATADA</strong> @endif gozará de los beneficios de vacaciones y utilidades, de acuerdo con el Decreto con Rango, Valor y Fuerza de Ley Orgánica del Trabajo, los Trabajadores y las Trabajadoras; asimismo, tendrá derecho a la prestación de antigüedad consagrada en el artículo 141 de la citada Ley, en atención a la duración de prestación de servicios. 
</div>
<br>
       <strong><center><u>CAUSALES DE EXTINCIÓN DEL CONTRATO</u></center></strong>
       <div style="text-align: justify;"><strong>SEXTA:</strong> El presente Contrato podrá ser rescindido por @if ($k->sexo=="Masculino") <strong>EL CONTRATANTE</strong> @else <strong>LA CONTRATANTE</strong> @endif, cuando @if ($ky->sexo=="Masculino") <strong>EL CONTRATADO</strong> @else <strong>LA CONTRATADA</strong> @endif, incurra en cualquiera de las causales establecidas en el artículo 79 del  Decreto con Rango, Valor y Fuerza de Ley Orgánica del Trabajo, los Trabajadores y las Trabajadoras, o cuando incumpla cualquiera de las clausulas señaladas en este  contrato, y de igual manera por vía de la renuncia, o por cualquiera de las vías establecidas en la ley vigente. 
</div>
<br>
        <strong><center><u>ACUERDO DE CONFIDENCIALIDAD</u></center></strong>
        <div style="text-align: justify;"><strong>SÉPTIMA:</strong> @if ($ky->sexo=="Masculino") <strong>EL CONTRATADO</strong> @else <strong>LA CONTRATADA</strong> @endif acuerda que no podrá revelar a terceros, familiares o cualquier persona información de este Servicio de tipo financiera, laboral, de bienes muebles e inmuebles, claves, datos de ubicación del personal que preste servicio, en este ente, de sus familiares, grabaciones, programas de ordenadores, fotografías, proyectos del Servicio, aplicaciones de programas, marcas, actas, datos, modelos, bases de datos, muestras, archivos, como consecuencia de la relación de trabajo. De igual manera, no podrá revelar la información mencionadas por mecanismos informáticos, orales, gráficos, fotográficos, cartas, incluyendo redes sociales o servicios de mensajería instantánea (WhatsApp, Twitter, mensajería de textos, correos electrónicos, Instagram, Telegram, TikTok, Facebook, o cualquier otra red social existente o por existir), mediante el cual se pueda conocer información. Todo ello tendrá carácter de información confidencial y será tratado de acuerdo con lo establecido en el presente documento. <strong>OCTAVA:</strong> El incumplimiento de este acuerdo de confidencialidad por parte de @if ($ky->sexo=="Masculino") <strong>EL CONTRATADO</strong> @else <strong>LA CONTRATADA</strong> @endif, acarreará las sanciones contenidas en la Legislación Venezolana Vigente. Queda entendido que el presente Contrato, podrá ser rescindido en cualquier momento por @if ($k->sexo=="Masculino") <strong>EL CONTRATANTE</strong> @else <strong>LA CONTRATANTE</strong> @endif, cuando @if ($ky->sexo=="Masculino") <strong>EL CONTRATADO</strong> @else <strong>LA CONTRATADA</strong> @endif incurra en algunas causales de despido establecidas en el Art. 79 del Decreto con Rango Valor y Fuerza de Ley Orgánica del Trabajo los Trabajadores y las Trabajadoras, o en cualquiera de las estipulaciones de este Contrato.
</div>
<br>

        <strong><center><u>DISPOSICIONES FINALES</u></center></strong>
        <div style="text-align: justify;">
        <strong>NOVENA:</strong> Todo lo no previsto en el presente contrato se regirá por las disposiciones contenidas en el Decreto con Rango Valor y Fuerza de Ley Orgánica del Trabajo los Trabajadores y las Trabajadoras y su Reglamento. <strong>DÉCIMA:</strong> Toda modificación que surgiere con ocasión de este contrato, deberá ser pactada de común acuerdo entre las partes, mediante la suscripción de un addendum que se anexará al contrato y formará parte del mismo. <strong>DÉCIMA PRIMERA:</strong> @if ($ky->sexo=="Masculino") <strong>EL CONTRATADO</strong> @else <strong>LA CONTRATADA</strong> @endif, declara que acepta libre de coacción y apremio, todas y cada una de las cláusulas previstas en el presente Contrato, en los términos y condiciones que aquí se establecen. <strong>DÉCIMA SEGUNDA:</strong> Las dudas o controversias de cualquier naturaleza que puedan suscitarse sobre este contrato y que no puedan ser resueltas por las partes de común acuerdo, serán gestionadas ante los Tribunales competentes con sede en la Ciudad de Maracay, estado Aragua, a cuya jurisdicción se someterán las partes en caso de conflicto, por ser esta la ciudad que se elige como domicilio especial, único y excluyente. Se hacen dos (02) ejemplares de un mismo tenor y a un mismo efecto en la ciudad de Maracay, a los @php setlocale(LC_TIME, "spanish"); echo strftime("%d días del mes de %B del año %Y", strtotime($ky->fecha)); @endphp



</div>
<br>


      <table style="width: 19cm; margin-left: 0.8cm; margin-right: 1cm;">
        <tr>
        <br><br><br>
         @if ($k->sexo=="Masculino")
     
        <th style="text-transform: uppercase;">
        <p style="margin-top: 1.7cm;">EL CONTRATANTE <br> {{$k->nombres}} {{$k->apellidos}}</p></th>
        @else
        
        <th style="text-transform: uppercase;">
        <p style="margin-top: 1.7cm;">LA CONTRATANTE <br> {{$k->nombres}} {{$k->apellidos}}</p></th>
        @endif

   
        @if ($ky->sexo=="Masculino")
   
        <th style="text-transform: uppercase;">
        <p style="margin-top: 1.7cm;">EL CONTRATADO <br>{{$ky->nombres}} {{$ky->apellidos}}</p></th>
        @else
    
        <th style="text-transform: uppercase;">
        <p style="margin-top: 1.7cm;">LA CONTRATADA <br> {{$ky->nombres}} {{$ky->apellidos}}</p></th>
        @endif
    </tr>
</table>
   </div>
     

   
    @endforeach
 
            
 @endforeach    
@endforeach

  
        
        
         
     </div>
 </body>       
    

</html>
