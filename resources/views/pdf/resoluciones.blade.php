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

@foreach($empresa as $key)

   
  <table>
      <tr>
       
          

            <th><img class="circular--square" src="../public/uploads/membrete.jpg"></th>
        </tr> 
  </table>

 
@endforeach
  <table border="1" width="17cm">
    <tr>
        <th colspan="4" style="text-align: left;"></th>
    </tr>
    <tr>
        <th colspan="2"></th>
        <th colspan="2"></th>

    </tr>
    
</table>
     
   

  
        
        
     
      
 
  
         
        
    

</html>
