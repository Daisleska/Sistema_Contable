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
<div>
     <div id="footer">

         <img class="footer" src="../public/uploads/piedepagina.jpg">
     </div>
     <br><br><br><br><br>
 
    
   @foreach($empresa as $key)     

@foreach($autoridad as $k) 
@foreach($resoluciones as $ky)
 <div class="container" style="margin-right: 0.8cm; margin-left: 1cm; justify-content: center;">    
    <div style="font: arial; font-size: 12; text-align: left;">
        SETA/SUP/NOTIFICACION/{{$ky->n_resolucion}}
        <br>
    </div>
    <div style="font: arial; font-size: 12; text-align: right;">
        Maracay, @php echo date("d-m-Y", strtotime($ky->fecha)); @endphp
    </div>
    <br>
    <div style="font: arial; font-size: 12; text-align: left;">
        @if ($ky->sexo=="Masculino")
        Ciudadano
        @else
        Ciudadana
        @endif
        <p style="text-transform: uppercase;"> 
        <strong>{{$ky->nombres}} {{$ky->apellidos}}
        <br>
        C.I. N° {{number_format($ky->cedula, 0, ".", ".")}}</p></strong>
        Presente.-

    </div>
    <br>
    <div style="text-align: justify; font: arial; font-size: 12;">
        Se hace saber, que ha sido designado <strong style="text-transform: uppercase;">{{$ky->cargo}} @if ($ky->adscripcion=="Gerencia de Administración y Finanzas") DE Administración y Finanzas, @elseif ($ky->adscripcion=="Gerencia de Recaudación") DE Recaudación, @elseif ($ky->adscripcion=="Gerencia de Juridico Tributario") DE Juridico Tributaro, @elseif ($ky->adscripcion=="Gerencia de Fiscalización") DE Fiscalización, @elseif ($ky->adscripcion=="Despacho de Superintendencia") DEL {{$ky->adscripcion}}, @else DE {{$ky->adscripcion}},  @endif DEL {{$key->nombre}}</strong>, según <strong>RESOLUCIÓN N° {{$ky->n_resolucion}}</strong>, de fecha @php setlocale(LC_TIME, "spanish"); echo strftime("%d de %B del año %Y", strtotime($ky->fecha)); @endphp. En cumplimiento, a lo establecido en el artículo 11, numeral 9 de la <strong>REFORMA DEL REGLAMENTO SOBRE LA ORGANIZACIÓN, ATRIBUCIONES Y FUNCIONES DEL SERVICIO DE ADMINISTRACIÓN TRIBUTARIA DEL ESTADO ARAGUA (SATAR)</strong>, de fecha 29 de junio de 2011, publicado en la Gaceta Oficial del estado Aragua, Numero Ordinaria N° 1841, de fecha 14 de julio de 2011. Notificación que efectúo de acuerdo a lo establecido en el artículo 73 de la Ley Orgánica de Procedimientos Administrativos. Por lo que deberá incorporarse para realizar las funciones inherentes al supra indicado cargo, de acuerdo a los principios establecidos en la Constitución de la República Bolivariana de Venezuela y las demás normativas que rigen la materia. En virtud de lo anterior, se transcribe el texto íntegro de la Resolución, correspondiente: 
    </div>
    <br>
    
</div>

    <div class="container" style="margin-right: 2cm; margin-left: 2cm; justify-content: center;">
     <div style="text-align: justify; font: arial; font-size: 9;"><strong><center>REPUBLICA BOLIVARIANA DE VENEZUELA <br>
        GOBIERNO DEL ESTADO BOLIVARIANO DE ARAGUA <br>
        <b style="text-transform: uppercase;">{{$key->nombre}}</b>
        <br>
        212° años de la Independencia 163° de la Federación y 23° de la Revolución
    </center></strong></div>
    <br>

    <div style="text-align: justify; font: arial; font-size: 9;"><strong> <p style="text-align: right;">RESOLUCIÓN N° {{$ky->n_resolucion}}</p></strong><br>El <b style="text-transform: uppercase;">{{$key->nombre}}</b>, creado según Decreto N° 2423, publicado en la Gaceta Oficial del estado Aragua N° 2067, de fecha 13 de mayo de 2013, ente adscrito al Gobierno del estado Bolivariano de Aragua, inscrito en el Registro de Información Fiscal, Rif N° {{$key->tipo_documento}}-{{$key->rif}}, representado para este administrativo por @if ($k->sexo="Masculino") el ciudadano @else la ciudadana @endif <b style="text-transform: uppercase;">{{$k->nombres}} {{$k->apellidos}}</b>, titular de la cédula de identidad N° {{$k->tipo_doc}}-{{number_format($k->cedula, 0, ".", ".")}}, en su carácter de Superintendente, designado según Decreto N° 4264, de fecha 20 de diciembre de 2021, publicado en la Gaceta Oficial del estado Aragua N° 2925 de la misma fecha. En cumplimiento, a lo establecido en el artículo 11, numeral 9 de la <strong>REFORMA DEL REGLAMENTO SOBRE LA ORGANIZACIÓN, ATRIBUCIONES Y FUNCIONES DEL SERVICIO DE ADMINISTRACIÓN TRIBUTARIA DEL ESTADO ARAGUA (SATAR)</strong>, de fecha 29 de junio de 2011, publicado en la Gaceta Oficial del estado Aragua, Numero Ordinaria N° 1841, de fecha 14 de julio de 2011, cuya denominación a <strong>SERVICIO TRIBUTARIO DE ARAGUA (SETA)</strong>, fue modificada a través de Providencia Administrativa N° SETA/2013/001, de fecha 18 de junio de 2013 y publicada en la Gaceta Oficial del estado Aragua de la misma fecha. Ordinaria N° 2084. En concordancia, con lo dispuesto en el artículo 21 de la Ley del Estatuto de la Función Pública y los artículos 16 y 72 segundo aparte, de la Ley Orgánica de Procedimientos Administrativos, de acuerdo a lo aprobado por la ciudadana Gobernadora del estado Bolivariano de Aragua, a través de Punto de Cuenta N° 134, de fecha 03 de marzo de 2022, para ocupar el cargo de <strong style="text-transform: uppercase;">{{$ky->cargo}} @if ($ky->adscripcion=="Gerencia de Administración y Finanzas") DE Administración y Finanzas, @elseif ($ky->adscripcion=="Gerencia de Recaudación") DE Recaudación, @elseif ($ky->adscripcion=="Gerencia de Juridico Tributario") DE Juridico Tributaro, @elseif ($ky->adscripcion=="Gerencia de Fiscalización") DE Fiscalización, @elseif ($ky->adscripcion=="Despacho de Superintendencia") DEL {{$ky->adscripcion}}, @else DE {{$ky->adscripcion}},  @endif</strong>el cual por su naturaleza es de Libre Nombramiento y Remoción.
    </div>
    <br>
    <div  style="text-align: justify; font: arial; font-size: 9;">
    <strong style="text-align: justify; font: arial; font-size: 9;"><center>CONSIDERANDO</center></strong>
    Que el {{$key->nombre}}, está a cargo del Superintendente, quien ejerce las atribuciones y funciones establecidas en las normativas que rigen la materia.
</div>
<br>
<div  style="text-align: justify; font: arial; font-size: 9;">
    <strong style="text-align: justify; font: arial; font-size: 9;"><center>CONSIDERANDO</center></strong>
    Que los funcionarios y funcionarias de libre nombramiento y remoción al servicio de la administración pública, pueden ocupar cargos de alto nivel o de confianza, pudiendo ser removidos libremente de sus cargos sin otras limitaciones que las establecidas en la Ley.
</div>
<br>
<div  style="text-align: justify; font: arial; font-size: 9;">
    <strong style="text-align: justify; font: arial; font-size: 9;"><center>CONSIDERANDO</center></strong>
    Que el cargo de <strong style="text-transform: uppercase;">{{$ky->cargo}} @if ($ky->adscripcion=="Gerencia de Administración y Finanzas") DE Administración y Finanzas, @elseif ($ky->adscripcion=="Gerencia de Recaudación") DE Recaudación, @elseif ($ky->adscripcion=="Gerencia de Juridico Tributario") DE Juridico Tributaro, @elseif ($ky->adscripcion=="Gerencia de Fiscalización") DE Fiscalización, @elseif ($ky->adscripcion=="Despacho de Superintendencia") DEL {{$ky->adscripcion}}, @else DE {{$ky->adscripcion}},  @endif</strong>constituye un cargo de alto nivel y por ende de libre nombramiento y remoción.
</div>
<br>
<div  style="text-align: justify; font: arial; font-size: 9;">
    <strong style="text-align: justify; font: arial; font-size: 9;"><center>CONSIDERANDO</center></strong>
    Que dicho cargo tiene sus atribuciones y funciones establecidas en la <strong>REFORMA DEL REGLAMENTO SOBRE LA ORGANIZACIÓN, ATRIBUCIONES Y FUNCIONES DEL SERVICIO DE ADMINISTRACIÓN TRIBUTARIA DEL ESTADO ARAGUA (SATAR). </strong>
</div>
<br>
<div  style="text-align: justify; font: arial; font-size: 9;">
    <strong style="text-align: justify; font: arial; font-size: 9;"><center>RESUELVE</center></strong>
    <strong>Artículo 1.</strong> Designar @if ($ky->sexo=="Masculino") al ciudadano @else a la ciudadana @endif <strong style="text-transform: uppercase;">{{$ky->nombres}} {{$ky->apellidos}}</strong>, titular de la cédula de identidad <strong>N° {{number_format($ky->cedula, 0, ".", ".")}}</strong>, en el cargo de <strong style="text-transform: uppercase;">{{$ky->cargo}} @if ($ky->adscripcion=="Gerencia de Administración y Finanzas") DE Administración y Finanzas @elseif ($ky->adscripcion=="Gerencia de Recaudación") DE Recaudación @elseif ($ky->adscripcion=="Gerencia de Juridico Tributario") DE Juridico Tributaro @elseif ($ky->adscripcion=="Gerencia de Fiscalización") DE Fiscalización @elseif ($ky->adscripcion=="Despacho de Superintendencia") DEL {{$ky->adscripcion}} @else DE {{$ky->adscripcion}} @endif @if ($ky->condicion==" "), @else {{$ky->condicion}},@endif DEL {{$key->nombre}}</strong>
    <br><br>

    <strong>Artículo 2.</strong> Notifíquese al ciudadano supra identificado, el contenido de la presente Resolución.
    <br><br>

    Dado, firmado y sellado en el Despacho del Superintendente del {{$key->nombre}}. En la ciudad de Maracay, a los @php setlocale(LC_TIME, "spanish"); echo strftime("%d días del mes de %B del año %Y", strtotime($ky->fecha)); @endphp.
</div>


     <br><br>
    <div  style="text-align: justify; font: arial; font-size: 8;"><center><b style="text-transform: uppercase;">{{$k->nombres}} {{$k->apellidos}}</b><br>
    <b style="text-transform: uppercase; text-align: justify; font: arial; font-size: 8; margin-right: 2cm; margin-left: 2cm;">Superintendente DEL {{$key->nombre}}</b><br>
    Designado según Decreto Nº 4264 de fecha 20 de  diciembre del año 2021
    Publicado en Gaceta Ordinaria Nº 2925 de la misma fecha, emanada de la Gobernación del Estado Aragua</center></div>

 
     </div>
     <br>

     <div class="container" style="margin-right: 0.8cm; margin-left: 1cm; justify-content: center;">
         <div style="text-align: justify; font: arial; font-size: 12;">
        En este sentido, debe tomar en cuenta que todo funcionario y funcionaria pública debe actuar con rectitud y honradez, procurando satisfacer el interés general y conducirse en todo momento con integridad, responsabilidad, eficiencia, probidad y veracidad, fomentando un cultura tributaria transparente, actuando con diligencia, honor y justicia, de acuerdo a la misión y visión de la institución. Es menester indicarle, la obligación de realizar la Declaración Jurada de Patrimonio por ante la Contraloría General de la República Bolivariana de Venezuela, cuyo certificado deberá remitirlo ante el área de Recursos Humanos de este {{$key->nombre}}, a los fines de que conste en su expediente personal.
    </div>
    <br>
    <div style="text-align: justify; font: arial; font-size: 12;">
        Finalmente, firmará al pie de la presente, en señal de haber sido debidamente notificado del presente acto administrativo.</div>
        <br>

<div style="text-align: left; font: arial; font-size: 12;">Cordialmente se suscribe,</div>

<div style=" font: arial; font-size: 12;"><center>Atentamente</center></div>
<br><br>




<div><strong><center style="text-transform: uppercase;">{{$k->nombres}} {{$k->apellidos}}</center>
<center style="text-transform: uppercase;">Superintendente del {{$key->nombre}} </center></strong>
<center style="font: arial; font-size: 9;">Según Decreto Nº 4264 de fecha 20 de  diciembre del año 2021
Publicado en Gaceta Ordinaria Nº 2925 de la misma fecha, emanada de la Gobernación del Estado Aragua</center></div>

<center style="font: arial; font-size: 7;">¡Chávez Vive!
<br>
¡Eficiencia o Nada!
<br>
¡Humanidad, Esperanza y Futuro!</center>
<br>

<div style="text-align: justify; font: arial; font-size: 12;">Nombre y Apellido: __________________________________ C.I.__________________
    <br>
Fecha: ____________ Hora: ________________ Firma: __________________________
</div>
    </div>
     </div>
 </body>       
    @endforeach 

 @endforeach 
 @endforeach
 
</html>

