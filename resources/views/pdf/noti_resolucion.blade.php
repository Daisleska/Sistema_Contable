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

 @foreach($autoridad as $k)
 @foreach($resoluciones as $ky)
  <table border="1" width="17cm">
    <tr>
        <th colspan="4" style="text-align: justify; font: arial; font-size: 12;">
     <center>REPUBLICA BOLIVARIANA DE VENEZUELA <br>
        GOBIERNO DEL ESTADO BOLIVARIANO DE ARAGUA <br>
        <b style="text-transform: uppercase;">{{$key->nombre}}</b>
        <br>
        212° años de la Independencia 163° de la Federación y 23° de la Revolución
    </center>
    <br>
    <p style="text-align: right;">RESOLUCIÓN N° </p>
 
    <br>El <b style="text-transform: uppercase;">{{$key->nombre}}</b>, creado según Decreto N° 2423, publicado en la Gaceta Oficial del estado Aragua N° 2067, de fecha 13 de mayo de 2013, ente adscrito al Gobierno del estado Bolivariano de Aragua, inscrito en el Registro de Información Fiscal, Rif N° {{$key->tipo_documento}}-{{$key->rif}}, representado para este administrativo por @if ($k->sexo=="Masculino") el ciudadano @else la ciudadana @endif <b style="text-transform: uppercase;">{{$k->nombres}} {{$k->apellidos}}</b>, titular de la cédula de identidad N° {{$k->cedula}}, en su carácter de Superintendente, designado según Decreto N° 4264, de fecha 20 de diciembre de 2021, publicado en la Gaceta Oficial del estado Aragua N° 2925 de la misma fecha. En cumplimiento, a lo establecido en el artículo 11, numeral 9 de la REFORMA DEL REGLAMENTO SOBRE LA ORGANIZACIÓN, ATRIBUCIONES Y FUNCIONES DEL SERVICIO DE ADMINISTRACIÓN TRIBUTARIA DEL ESTADO ARAGUA (SATAR), de fecha 29 de junio de 2011, publicado en la Gaceta Oficial del estado Aragua, Numero Ordinaria N° 1841, de fecha 14 de julio de 2011, cuya denominación a SERVICIO TRIBUTARIO DE ARAGUA (SETA), fue modificada a través de Providencia Administrativa N° SETA/2013/001, de fecha 18 de junio de 2013 y publicada en la Gaceta Oficial del estado Aragua de la misma fecha. Ordinaria N° 2084. En concordancia, con lo dispuesto en el artículo 21 de la Ley del Estatuto de la Función Pública y los artículos 16 y 72 segundo aparte, de la Ley Orgánica de Procedimientos Administrativos, de acuerdo a lo aprobado por la ciudadana Gobernadora del estado Bolivariano de Aragua, a través de Punto de Cuenta N° 134, de fecha 03 de marzo de 2022, para ocupar el cargo de {{$ky->cargo}} DE __________________, el cual por su naturaleza es de Libre Nombramiento y Remoción.
    <center>CONSIDERANDO</center>
    Que el {{$key->nombre}}, está a cargo del Superintendente, quien ejerce las atribuciones y funciones establecidas en las normativas que rigen la materia.
    <center>CONSIDERANDO</center>
    Que los funcionarios y funcionarias de libre nombramiento y remoción al servicio de la administración pública, pueden ocupar cargos de alto nivel o de confianza, pudiendo ser removidos libremente de sus cargos sin otras limitaciones que las establecidas en la Ley.
    <center>CONSIDERANDO</center>
    Que el cargo de {{$ky->cargo}} DE _______________ del {{$key->nombre}}, constituye un cargo de alto nivel y por ende de libre nombramiento y remoción.
    <center>CONSIDERANDO</center>
    Que dicho cargo tiene sus atribuciones y funciones establecidas en la REFORMA DEL REGLAMENTO SOBRE LA ORGANIZACIÓN, ATRIBUCIONES Y FUNCIONES DEL SERVICIO DE ADMINISTRACIÓN TRIBUTARIA DEL ESTADO ARAGUA (SATAR). 

    <center>RESUELVE</center>
    Artículo 1. Designar  @if ($ky->sexo=="Masculino") al ciudadano @else a la ciudadana @endif <b style="text-transform: uppercase;">{{$ky->nombres}} {{$ky->apellidos}}</b>, titular de la cédula de identidad N° {{$ky->cedula}}, en el cargo de {{$ky->cargo}} DE _________________________, DEL <b style="text-transform: uppercase;">{{$k->nombres}} {{$k->apellidos}}</b>.

    Artículo 2. Notifíquese al ciudadano supra identificado, el contenido de la presente Resolución.

    Dado, firmado y sellado en el Despacho del Superintendente del {{$key->nombre}}. En la ciudad de Maracay, a los tres ________ días del mes de _______ del año _______.




     <br><br>
    <center><b style="text-transform: uppercase;">{{$k->nombres}} {{$k->apellidos}}</b><br>
    <b style="text-transform: uppercase;">{{$k->cargo}} DEL {{$key->nombre}}</b><br>
    Designado según Decreto Nº 4264 de fecha 20 de  diciembre del año 2021
    Publicado en Gaceta Ordinaria Nº 2925 de la misma fecha, emanada de la Gobernación del Estado Aragua</center>



</th>
    </tr>
    <tr>
        <th colspan="2"></th>
        <th colspan="2"></th>

    </tr>
 
</table>
     @endforeach
      @endforeach

        
     
      
 
  
         
        
    

</html>
