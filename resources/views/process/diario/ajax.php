<?php



$id=$_POST['id'];


$cuenta = \DB::select('SELECT cuentas.nombre FROM cuentas, mayor');



$html='<br>
         <thead >
          <tr>
          @foreach($cuentas as $key)
                                        <th colspan="2">{{$key->nombre}}</th>
                                        @endforeach
                                    </tr>
                                    <tr>
                                         <th style="text-align: center;">Debe</th>
                                         <th style="text-align: center;">Haber</th>
                                     </tr>
                                 </thead>
                                 <tbody >
                                    
                                 </tbody>';



echo($html);

?>