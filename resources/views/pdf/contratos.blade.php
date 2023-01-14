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
       border-radius: 1000cm;
         }

    </style>
    
</head>



   
  <table>
      <tr>
            <th><img class="circular--square" src="../public/uploads/membrete.jpg"></th>
        </tr> 
  </table>
@foreach($empresa as $key)
 @foreach($autoridad as $k)
 @foreach($contratos as $ky)
  <table border="1" width="17cm">
    <tr>

        <th colspan="4" style="text-align: justify; font: arial; font-size: 12;">Entre el <b style="text-transform: uppercase;">{{$key->nombre}}</b> creado según Decreto N° 2.423, publicado en Gaceta Oficial del Estado Aragua N° 2.067 de fecha 13 de mayo de 2.013, ente adscrito al Gobierno  Bolivariano de Aragua, y con  Registro de Información Fiscal (RIF) N° {{$key->tipo_documento}}-{{$key->rif}}, representado en este acto por @if ($k->sexo=="Masculino") el ciudadano:<b style="text-transform: uppercase;"> {{$k->nombres}} {{$k->apellidos}}</b>, venezolano, @else la ciudadana:<b style="text-transform: uppercase;"> {{$k->nombres}} {{$k->apellidos}}</b>, venezolana,@endelse @endif titular de la cedula de identidad N° {{$k->tipo_doc}}-{{$k->cedula}}, actuando en su carácter de {{$k->cargo}}, designado mediante {{$key->decreto_max_auto}}, en cumplimiento de sus funciones conforme lo establece el artículo 11 ordinal 6 del Reglamento sobre la Organización, Atribuciones y Funciones del Servicio de Administración  Tributaria del estado Aragua (SATAR), publicado según Gaceta1.841, de fecha 14 de Julio de 2.011, mediante Decreto N° 2.039, quien para los efectos de este contrato se denominará @if ($k->sexo=="Masculino") EL CONTRATANTE, @else LA CONTRATANTE, @endelse @endif por una parte; y por la otra, @if ($ky->sexo=="Masculino") el ciudadano <b style="text-transform: uppercase;">{{$ky->nombres}} {{$ky->apellidos}}</b>, venezolano, @else la ciudadana <b style="text-transform: uppercase;">{{$ky->nombres}} {{$ky->apellidos}}</b>, venezolana, @endif mayor de edad, titular de la cédula de identidad N° {{$ky->tipo_doc}}-{{$ky->cedula}}, {{$ky->estado_civil}}, @if ($ky->sexo=="Masculino")domiciliado en {{$ky->direccion}} quien en lo sucesivo y para los efectos de este Contrato se denominará EL CONTRATADO,  conjuntamente se denominaran LAS PARTES, se ha convenido en celebrar el presente CONTRATO DE TRABAJO A TIEMPO DETERMINADO, el cual se regirá por las leyes vigentes y las cláusulas siguientes: @else domiciliada en {{$ky->direccion}} quien en lo sucesivo y para los efectos de este Contrato se denominará LA CONTRATADA,  conjuntamente se denominaran LAS PARTES, se ha convenido en celebrar el presente CONTRATO DE TRABAJO A TIEMPO DETERMINADO, el cual se regirá por las leyes vigentes y las cláusulas siguientes: @endif
        <br><br>
        <center><u>OBJETO DEL CONTRATO</u></center>
        PRIMERA: @if ($ky->sexo=="Masculino") EL CONTRATADO, @else LA CONTRATADA @endif se compromete a prestar sus servicios profesionales para @if ($k->sexo=="Masculino") EL CONTRATANTE, @else LA CONTRATANTE @endif @if($ky->adscripcion=="Despacho de Superintendencia") en el @else en la @endif {{$ky->adscripcion}}

      
       <br>
        desde el día ___ de _____ del año _____ hasta el día ____ de __________ del año ______.  SEGUNDA: @if ($ky->sexo=="Masculino") EL CONTRATADO deberá cumplir con la jornada de trabajo de lunes a viernes, en el horario comprendido de 08:00 am hasta las 3:30 p.m., de acuerdo a lo contemplado en el artículo 173 del Decreto con Rango Valor y Fuerza de Ley Orgánica del Trabajo, los Trabajadores y las Trabajadoras. El contrato culminará en la fecha del término convenido sin necesidad de que a EL CONTRATADO,  se le notifique por escrito, dándose por terminada la relación laboral. @else LA CONTRATADA deberá cumplir con la jornada de trabajo de lunes a viernes, en el horario comprendido de 08:00 am hasta las 3:30 p.m., de acuerdo a lo contemplado en el artículo 173 del Decreto con Rango Valor y Fuerza de Ley Orgánica del Trabajo, los Trabajadores y las Trabajadoras. El contrato culminará en la fecha del término convenido sin necesidad de que a LA CONTRATADA,  se le notifique por escrito, dándose por terminada la relación laboral. @endif
        <br>
        @if ($ky->sexo=="Masculino")
        <center><u>ACTIVIDADES DEL CONTRATADO</u></center>
        @else
        <center><u>ACTIVIDADES DE LA CONTRATADA</u></center>
        @endif
        @if ($ky->sexo=="Masculino")
        TERCERA: EL CONTRATADO deberá realizar las siguientes actividades @if($ky->adscripcion=="Despacho de Superintendencia") en el @else en la @endif {{$ky->adscripcion}} 
        @else
        TERCERA: LA CONTRATADA deberá realizar las siguientes actividades @if($ky->adscripcion=="Despacho de Superintendencia") en el @else en la @endif {{$ky->adscripcion}} 
        @endif específicamente en el área de _______: {{$ky->tarea}}

        <center><u>REMUNERACION Y BENEFICIOS PRESTACIONALES </u></center>

        CUARTA:@if ($k->sexo=="Masculino") EL CONTRATANTE @else LA CONTRATANTE @endif se obliga a pagarle @if ($ky->sexo=="Masculino") al CONTRATADO @else a la CONTRATADA @endif por la prestación de servicios objeto del presente contrato, la cantidad mensual de CIENTO TREINTA BOLIVARES SIN CENTIMOS (Bs. 130,00), en moneda de curso legal, además de todos los beneficios consagrados en el Decreto con Rango, Valor y Fuerza de Ley Orgánica del Trabajo, los Trabajadores y las Trabajadoras, en el Decreto con Rango Valor y Fuerza de Ley del cestaticket Socialista para
        los Trabajadores y Trabajadoras, por jornada efectivamente laborada, así como cualquier otro beneficio establecido en la normativa venezolana vigente. QUINTA: @if ($ky->sexo=="Masculino") EL CONTRATADO @else LA CONTRATADA @endif gozará de los beneficios de vacaciones y utilidades, de acuerdo con el Decreto con Rango, Valor y Fuerza de Ley Orgánica del Trabajo, los Trabajadores y las Trabajadoras; asimismo, tendrá derecho a la prestación de antigüedad consagrada en el artículo 141 de la citada Ley, en atención a la duración de prestación de servicios. 

        <center><u>CAUSALES DE EXTINCIÓN DEL CONTRATO</u></center>
        SEXTA: El presente Contrato podrá ser rescindido por @if ($k->sexo=="Masculino") EL CONTRATANTE @else LA CONTRATANTE @endif, cuando @if ($ky->sexo=="Masculino") EL CONTRATADO @else LA CONTRATADA @endif, incurra en cualquiera de las causales establecidas en el artículo 79 del  Decreto con Rango, Valor y Fuerza de Ley Orgánica del Trabajo, los Trabajadores y las Trabajadoras, o cuando incumpla cualquiera de las clausulas señaladas en este  contrato, y de igual manera por vía de la renuncia, o por cualquiera de las vías establecidas en la ley vigente. 

        <center><u>ACUERDO DE CONFIDENCIALIDAD</u></center>
        SÉPTIMA: @if ($ky->sexo=="Masculino") EL CONTRATADO @else LA CONTRATADA @endif acuerda que no podrá revelar a terceros, familiares o cualquier persona información de este Servicio de tipo financiera, laboral, de bienes muebles e inmuebles, claves, datos de ubicación del personal que preste servicio, en este ente, de sus familiares, grabaciones, programas de ordenadores, fotografías, proyectos del Servicio, aplicaciones de programas, marcas, actas, datos, modelos, bases de datos, muestras, archivos, como consecuencia de la relación de trabajo. De igual manera, no podrá revelar la información mencionadas por mecanismos informáticos, orales, gráficos, fotográficos, cartas, incluyendo redes sociales o servicios de mensajería instantánea (WhatsApp, Twitter, mensajería de textos, correos electrónicos, Instagram, Telegram, TikTok, Facebook, o cualquier otra red social existente o por existir), mediante el cual se pueda conocer información. Todo ello tendrá carácter de información confidencial y será tratado de acuerdo con lo establecido en el presente documento. OCTAVA: El incumplimiento de este acuerdo de confidencialidad por parte de @if ($ky->sexo=="Masculino") EL CONTRATADO @else LA CONTRATADA @endif, acarreará las sanciones contenidas en la Legislación Venezolana Vigente. Queda entendido que el presente Contrato, podrá ser rescindido en cualquier momento por @if ($k->sexo=="Masculino") EL CONTRATANTE @else LA CONTRATANTE @endif, cuando @if ($ky->sexo=="Masculino") EL CONTRATADO @else LA CONTRATADA @endif incurra en algunas causales de despido establecidas en el Art. 79 del Decreto con Rango Valor y Fuerza de Ley Orgánica del Trabajo los Trabajadores y las Trabajadoras, o en cualquiera de las estipulaciones de este Contrato.


        <center><u>DISPOSICIONES FINALES</u></center>
        NOVENA: Todo lo no previsto en el presente contrato se regirá por las disposiciones contenidas en el Decreto con Rango Valor y Fuerza de Ley Orgánica del Trabajo los Trabajadores y las Trabajadoras y su Reglamento. DÉCIMA: Toda modificación que surgiere con ocasión de este contrato, deberá ser pactada de común acuerdo entre las partes, mediante la suscripción de un addendum que se anexará al contrato y formará parte del mismo. DÉCIMA PRIMERA: @if ($ky->sexo=="Masculino") EL CONTRATADO @else LA CONTRATADA @endif, declara que acepta libre de coacción y apremio, todas y cada una de las cláusulas previstas en el presente Contrato, en los términos y condiciones que aquí se establecen. DÉCIMA SEGUNDA: Las dudas o controversias de cualquier naturaleza que puedan suscitarse sobre este contrato y que no puedan ser resueltas por las partes de común acuerdo, serán gestionadas ante los Tribunales competentes con sede en la Ciudad de Maracay, estado Aragua, a cuya jurisdicción se someterán las partes en caso de conflicto, por ser esta la ciudad que se elige como domicilio especial, único y excluyente. Se hacen dos (02) ejemplares de un mismo tenor y a un mismo efecto en la ciudad de Maracay, a los Veintiún ____ días del mes de _____ del año _____.  



         </th>
    </tr>
    <tr>
        <br><br><br>
        @foreach($autoridad as $k)
        <th colspan="2" style="text-transform: uppercase;">EL CONTRATANTE <br> {{$k->nombres}} {{$k->apellidos}}</th>
         @endforeach
        @if ($ky->sexo=="Masculino")
        <th colspan="2" style="text-transform: uppercase;">EL CONTRATADO <br>{{$ky->nombres}} {{$ky->apellidos}}</th>
        @else
        <th colspan="2" style="text-transform: uppercase;">LA CONTRATADA <br> {{$ky->nombres}} {{$ky->apellidos}}</th>
        @endelse
        @endif

    </tr>
    
</table>
     
   
    @endforeach
 
            
 @endforeach    
@endforeach

  
        
        
     
      
 
  
         
        
    

</html>
