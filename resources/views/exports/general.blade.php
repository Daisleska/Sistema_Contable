<br><br><br>
<table width="500">
<tr>                   
<th rowspan="2" colspan="4" style="text-align: center; color: black;"><strong> Balance General <br> {{$inicio}} Al {{$final}}</strong></th>
</tr>
</table>
<br> 

<table>



@foreach($res_saldo_general as $general)
    @if($general[1] =='activo' && $general[2] =='Circulante' )  
        <?php 
            if ($general[3] > $general[4]) {
             $saldo= $general[3] - $general[4]; 
             $saldo_activo_circ[]= $saldo;
           }elseif ($general[3] < $general[4]) {
             $saldo=$general[4] - $general[3];
             $saldo_activo_circ[]= $saldo; 
           } 
         $total_activo_circ = array_sum($saldo_activo_circ);
        ?>
     <tr>
      <td style="text-align: center; width: 25px;">{{$general[0]}}</td>
          <td style="width: 20px;"></td>
          <td style="text-align: center; width: 20px;">{{number_format($saldo,2,',','.')}}</td>       
          <td style="width: 20px;"></td>
          </tr>
    @endif
    @endforeach  
    <tr>
      <td style="text-align: center;">Total Activo Circulante</td>
      <td></td>
      <td></td>
      <td  style="text-align: center;">{{number_format($total_activo_circ,2,',','.')}}</td>
    </tr>

@foreach($res_saldo_general as $general)
   @if($general[1] =='activo' && $general[2] =='Realizable' )  

            <?php 
               if ($general[3] > $general[4]) {
             $saldo= $general[3] - $general[4]; 

             $saldo_activo_real[]= $saldo;
           }elseif ($general[3] < $general[4]) {
             $saldo=$general[4] - $general[3]; 

             $saldo_activo_real[]= $saldo;
           } 
            $total_activo_real = array_sum($saldo_activo_real);
            ?>

           <tr>
                <td style="text-align: center;">{{$general[0]}}</td>
                <td style="text-align: center;">{{number_format($saldo,2,',','.')}}</td>       
                <td></td>
                <td></td>
          </tr>
    
    @endif
 @endforeach 
     <tr>
      <td style="text-align: center;">Total Activo Realizable</td>
      <td></td>
      <td></td>
      <td  style="text-align: center;">{{number_format($total_activo_real,2,',','.')}}</td>
    </tr>


         @foreach($res_saldo_general as $general)
          @if($general[1] =='activo' && $general[2] =='Fijo tangible' )  

           <?php 
            if ($general[3] > $general[4]) {
             $saldo= $general[3] - $general[4]; 
            $saldo_activo_tang[]= $saldo;
           }elseif ($general[3] < $general[4]) {
             $saldo=$general[4] - $general[3]; 
            $saldo_activo_tang[]= $saldo;
           } 
             


           $total_activo_tang = array_sum($saldo_activo_tang);

           
           ?>
           <tr>
                <td style="text-align: center;">{{$general[0]}}</td>
                <td style="text-align: center;">{{number_format($saldo,2,',','.')}}</td>       
                <td></td>
                <td></td>
          </tr>
    
    @endif
    @endforeach 
    <tr>
      <td style="text-align: center;">Total Activo Tangible</td>
      <td></td>
      <td></td>
      <td  style="text-align: center;">{{number_format($total_activo_tang,2,',','.')}}</td>
    </tr> 
 
         @foreach($res_saldo_general as $general)
          
          @if($general[1] =='activo' && $general[2] =='Fijo intangible' )  

           <?php 
            if ($general[3] > $general[4]) {
             $saldo= $general[3] - $general[4]; 
            $saldo_activo_intan[]= $saldo;
           }elseif ($general[3] < $general[4]) {
             $saldo=$general[4] - $general[3]; 
            $saldo_activo_intan[]= $saldo;
           } 
           $total_activo_intan = array_sum($saldo_activo_intan);
            ?>
            <tr>
                <td style="text-align: center;">{{$general[0]}}</td>
          
                <td style="text-align: center;">{{number_format($saldo,2,',','.')}}</td>       
                <td></td>
                <td></td>
          
    
          </tr>
 @endif
    @endforeach  
 <tr>
      <td style="text-align: center;">Total Activo Intangible</td>
      <td></td>
      <td></td>
      <td  style="text-align: center;">{{number_format($total_activo_intan,2,',','.')}}</td>
    </tr>


        @foreach($res_saldo_general as $general)
           
          @if($general[1] =='activo' && $general[2] =='Cargo diferido' )  

         
            <?php $saldo= $general[3] - $general[4]; 
            ?>
            <tr>
                <td style="text-align: center;">{{$general[0]}}</td>
          
                <td style="text-align: center;">{{number_format($saldo,2,',','.')}}</td>       
                <td></td>
                <td></td>
          
    
          </tr>
 @endif
    @endforeach  

        @foreach($res_saldo_general as $general)
           
          @if($general[1] =='activo' && $general[2] =='Otros activos' )  

         
            <?php $saldo= $general[3] - $general[4]; 
            ?>
            <tr>
                <td style="text-align: center;">{{$general[0]}}</td>
          
                <td style="text-align: center;">{{number_format($saldo,2,',','.')}}</td>       
                <td></td>
                <td></td>
          
    
          </tr>
   @endif
@endforeach  

<?php 
$total_activo = $total_activo_circ + $total_activo_real + $total_activo_tang + $total_activo_intan;
?>
          <tr>
            <th style="text-align: center;"><strong>TOTAL ACTIVO</strong></th>
            <th></th>
            <th></th>
            <th style="text-align: center;"><strong>{{number_format($total_activo,2,',','.')}}</strong></th>
          </tr>  



 @foreach($res_saldo_general as $general2)
             @if($general2[1] =='pasivo' && $general2[2]=='Circulante') 

             <?php 
            if ($general2[3] > $general2[4]) {
             $saldo= $general2[3] - $general2[4]; 
            $saldo_pasivo_circ[]= $saldo;
           }elseif ($general2[3] < $general2[4]) {
             $saldo=$general2[4] - $general2[3]; 
            $saldo_pasivo_circ[]= $saldo;
           } 
           $total_pasivo_circ = array_sum($saldo_pasivo_circ);
            ?>

           <tr >
                <td style="text-align: center;">{{$general2[0]}}</td>
                <td style="text-align: center;">{{number_format($saldo,2,',','.')}}</td>      
                <td></td>
                <td></td>
          </tr>
             
            @endif
  @endforeach
   <tr>
      <td style="text-align: center;">Total Pasivo Circulante</td>
      <td></td>
      <td></td>
      <td  style="text-align: center;">{{number_format($total_pasivo_circ,2,',','.')}}</td>
    </tr>
 
  @foreach($res_saldo_general as $general2)
           
             @if($general2[1] =='pasivo' && $general2[2]=='A largo plazo')  
             
             <?php 
            if ($general2[3] > $general2[4]) {
             $saldo= $general2[3] - $general2[4]; 
            $saldo_pasivo_largoplazo[]= $saldo;
           }elseif ($general2[3] < $general2[4]) {
             $saldo=$general2[4] - $general2[3]; 
            $saldo_pasivo_largoplazo[]= $saldo;
           } 
           $total_pasivo_largoplazo = array_sum($saldo_pasivo_largoplazo);
            ?>
            <tr>
                <td style="text-align: center;">{{$general2[0]}}</td>
                <td style="text-align: center;">{{number_format($saldo,2,',','.')}}</td>      
                <td></td>
                <td></td>
          </tr>
             
            @endif
  @endforeach
    <tr>
      <td style="text-align: center;">Total Pasivo a largo plazo</td>
      <td></td>
      <td></td>
      <td  style="text-align: center;">{{number_format($total_pasivo_largoplazo,2,',','.')}}</td>
    </tr>


  @foreach($res_saldo_general as $general2)
           
             @if($general2[1] =='pasivo' && $general2[2]=='Crédito diferido')  
             
            <?php $saldo2=  $general2[3] - $general2[4]; ?>
            <tr >
                <td style="text-align: center;">{{$general2[0]}}</td>
                <td style="text-align: center;">{{number_format($saldo2,2,',','.')}}</td>      
                <td></td>
                <td></td>
           </tr>  
            @endif
          
  @endforeach
  @foreach($res_saldo_general as $general2)
        
             @if($general2[1] =='pasivo' && $general2[2]=='Otros pasivos')  
             
            <?php $saldo2=  $general2[3] - $general2[4]; ?>
            <tr >
                <td style="text-align: center;">{{$general2[0]}}</td>
                <td style="text-align: center;">{{number_format($saldo2,2,',','.')}}</td>      
                <td></td>
                <td></td>
          </tr>
            @endif
  @endforeach
  <?php
  $total_pasivo = $total_pasivo_circ + $total_pasivo_largoplazo;
   ?>
          <tr>
            <th style="text-align: center;"><strong>TOTAL PASIVO</strong></th>
            <th></th>
            <th></th>
            <th style="text-align: center;"><strong>{{number_format($total_pasivo,2,',','.')}}</strong></th>
          </tr>            


@foreach($res_saldo_general as $general3)
               @if($general3[1] == 'capital')

             <?php 
            if ($general3[3] > $general3[4]) {
             $saldo= $general3[3] - $general3[4]; 
            $saldo_capital[]= $saldo;
           }elseif ($general3[3] < $general3[4]) {
             $saldo=$general3[4] - $general3[3]; 
            $saldo_capital[]= $saldo;
           } 
           $total_capital = array_sum($saldo_capital);
            ?>
          
           <tr>
                <td style="text-align: center;">{{$general3[0]}}</td>
                <td></td>
                <td style="text-align: center;">{{number_format($saldo,2,',','.')}}</td>       
                <td></td>
          </tr>
             
            @endif
@endforeach

<?php
$fecha_mes= date('m');
$fecha_anio= date('Y');
$valor_utilidad = \DB::select('SELECT cantidad FROM utilidad WHERE MONTH(fecha)='.$fecha_mes.' AND YEAR(fecha)='.$fecha_anio);
foreach ($valor_utilidad as $key ) {
  $utilidad= $key->cantidad;
}
 
if (isset($utilidad)==false) {
  $utilidad=0;
}


$nuevo_capital = $total_capital + $utilidad;
$patrimonio = $total_pasivo + $nuevo_capital;
?>
     <tr style=" text-align: center;">
          <td>Utilidad neta del ejercicio</td>
          <td></td>
           <td style="text-align: center;">{{number_format($utilidad, 2,',','.')}}</td>
          <td></td>
        </tr>

 <tr>
      <th style="text-align: center;"><strong>Nuevo Capital</strong></th>
      <th></th>
      <th></th>
      <th style="text-align: center;"><strong>{{number_format($nuevo_capital,2,',','.')}}</strong></th>
    </tr>
          <tr>
            <th style="text-align: center;"><strong>TOTAL PATRIMONIO</strong></th>
            <th></th>
            <th></th>
           <th style="text-align: center;"><strong>{{number_format($patrimonio, 2,',','.')}}</strong></th>
          </tr>  



   </table>