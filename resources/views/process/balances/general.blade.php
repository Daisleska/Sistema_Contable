<?php 
$utilidad = '12000';
 ?>
{{-- TABLA PARA LOS ACTIVOS --}}
<table style="border-color: black; border: 1px;" border="1" class="table dt-responsive nowrap">
<thead style="text-align: center; color: black; font-size: 12px;">
<tr>                     
<h5 style="text-align: center; color: black; font-size: 12px;">Balance General <br> {{$inicio}} Al {{$final}}</h5>
<br>
</tr> 
</thead>
<tbody style="font-size: 12px;">

{{--   <tr style="text-align: center; color: blue;"><td>Activo Circulante</td></tr> --}}  
@foreach($res_saldo_general as $general)
          @if($general[1] =='activo' && $general[2] =='Circulante' )  

         
        <?php 
            if ($general[3] > $general[4]) {
             $saldo= $general[3] - $general[4]; 
           }elseif ($general[3] < $general[4]) {
             $saldo=$general[4] - $general[3]; 
           } 
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
      <td>Total Activo Circulante</td>
      <td></td>
      <td></td>
      <td></td>
    </tr>

{{-- <tr style="text-align: center; color: blue;"><td>Activo Realizable</td></tr> --}}
        @foreach($res_saldo_general as $general)
           <tr>
          @if($general[1] =='activo' && $general[2] =='Realizable' )  

         
            <?php 
               if ($general[3] > $general[4]) {
             $saldo= $general[3] - $general[4]; 
           }elseif ($general[3] < $general[4]) {
             $saldo=$general[4] - $general[3]; 
           } 
            ?>

                <td style="text-align: center;">{{$general[0]}}</td>
          
                <td style="text-align: center;">{{number_format($saldo,2,',','.')}}</td>       
                <td></td>
                <td></td>
          
    
          </tr>
 @endif

    @endforeach  
{{-- <tr style="text-align: center; color: blue;"><td>Activo Fijo Tangible</td></tr> --}}
         @foreach($res_saldo_general as $general)
           <tr>
          @if($general[1] =='activo' && $general[2] =='Fijo tangible' )  

         
            <?php 
               if ($general[3] > $general[4]) {
             $saldo= $general[3] - $general[4]; 
           }elseif ($general[3] < $general[4]) {
             $saldo=$general[4] - $general[3]; 
           } 
            ?>

                <td style="text-align: center;">{{$general[0]}}</td>
          
                <td style="text-align: center;">{{number_format($saldo,2,',','.')}}</td>       
                <td></td>
                <td></td>
          
    
          </tr>
 @endif
    @endforeach 
{{-- <tr style="text-align: center; color: blue;"><td>Activo Intangible</td></tr> --}}


         @foreach($res_saldo_general as $general)
           <tr>
          @if($general[1] =='activo' && $general[2] =='Fijo intangible' )  

         
            <?php 
               if ($general[3] > $general[4]) {
             $saldo= $general[3] - $general[4]; 
           }elseif ($general[3] < $general[4]) {
             $saldo=$general[4] - $general[3]; 
           }  
            ?>

                <td style="text-align: center;">{{$general[0]}}</td>
          
                <td style="text-align: center;">{{number_format($saldo,2,',','.')}}</td>       
                <td></td>
                <td></td>
          
    
          </tr>
 @endif
    @endforeach  
{{-- <tr style="text-align: center; color: blue;"><td>Cargo Diferido</td></tr> --}}


        @foreach($res_saldo_general as $general)
           <tr>
          @if($general[1] =='activo' && $general[2] =='Cargo diferido' )  

         
            <?php $saldo= $general[3] - $general[4]; 
            ?>

                <td style="text-align: center;">{{$general[0]}}</td>
          
                <td style="text-align: center;">{{number_format($saldo,2,',','.')}}</td>       
                <td></td>
                <td></td>
          
    
          </tr>
 @endif
    @endforeach  
{{-- <tr style="text-align: center; color: blue;"><td>Otros Activo</td></tr> --}}

        @foreach($res_saldo_general as $general)
           <tr>
          @if($general[1] =='activo' && $general[2] =='Otros activos' )  

         
            <?php $saldo= $general[3] - $general[4]; 
            ?>

                <td style="text-align: center;">{{$general[0]}}</td>
          
                <td style="text-align: center;">{{number_format($saldo,2,',','.')}}</td>       
                <td></td>
                <td></td>
          
    
          </tr>
 @endif

    @endforeach  


          <tr  style="text-align: center; font-size: 12px; color: black;" >
          	<th>TOTAL ACTIVO</th>
          	<th></th>
          	<th></th>
            <th></th>
     
          </tr>  


{{--     <tr style="text-align: center; color: blue;"><td>pasivo Circulante</td></tr> --}}
 @foreach($res_saldo_general as $general2)
           <tr >
             @if($general2[1] =='pasivo' && $general2[2]=='Circulante')  
             
            <?php $saldo2=  $general2[3] - $general2[4]; ?>

                <td style="text-align: center;">{{$general2[0]}}</td>
                <td style="text-align: center;">{{number_format($saldo2,2,',','.')}}</td>      
                <td></td>
                <td></td>
             
            @endif
          </tr>
  @endforeach

{{-- <tr style="text-align: center; color: blue;"><td>Largo Plazo</td></tr> --}}
  @foreach($res_saldo_general as $general2)
           <tr >
             @if($general2[1] =='pasivo' && $general2[2]=='A largo plazo')  
             
            <?php $saldo2=  $general2[3] - $general2[4]; ?>

                <td style="text-align: center;">{{$general2[0]}}</td>
                <td style="text-align: center;">{{number_format($saldo2,2,',','.')}}</td>      
                <td></td>
                <td></td>
             
            @endif
          </tr>
  @endforeach

{{-- <tr style="text-align: center; color: blue;"><td>Crédito Diferido</td></tr> --}}
  @foreach($res_saldo_general as $general2)
           <tr >
             @if($general2[1] =='pasivo' && $general2[2]=='Crédito diferido')  
             
            <?php $saldo2=  $general2[3] - $general2[4]; ?>

                <td style="text-align: center;">{{$general2[0]}}</td>
                <td style="text-align: center;">{{number_format($saldo2,2,',','.')}}</td>      
                <td></td>
                <td></td>
             
            @endif
          </tr>
  @endforeach
{{-- <tr style="text-align: center; color: blue;"><td>Otros Pasivos</td></tr> --}}
  @foreach($res_saldo_general as $general2)
           <tr >
             @if($general2[1] =='pasivo' && $general2[2]=='Otros pasivos')  
             
            <?php $saldo2=  $general2[3] - $general2[4]; ?>

                <td style="text-align: center;">{{$general2[0]}}</td>
                <td style="text-align: center;">{{number_format($saldo2,2,',','.')}}</td>      
                <td></td>
                <td></td>
             
            @endif
          </tr>
  @endforeach
          <tr  style="text-align: center; font-size: 12px; color: black;" >
          	<th>TOTAL PASIVO</th>
          	<th></th>
          	<th></th>
            <th></th>
     
          </tr>            


@foreach($res_saldo_general as $general3)
           <tr>
               @if($general3[1] == 'capital')
          
            <?php $saldo3=  $general3[3] - $general3[4]; ?>  
                <td style="text-align: center;">{{$general3[0]}}</td>
                <td style="text-align: center;">{{$saldo3}}</td>       
                <td></td>
                <td></td>
             
            @endif
          </tr>
@endforeach
        <tr style="font-size: 12px; text-align: center;">
          <td>Utilidad liquida del ejercicio</td>
          <td></td>
           <td style="text-align: center;">{{number_format($utilidad, 2,',','.')}}</td>
          <td></td>
        </tr>

          <tr  style="text-align: center; font-size: 12px; color: black;" >
          	<td>TOTAL PATRIMONIO</td>
          	<td></td>
          	<td></td>
            <td></td>
     
          </tr>  
      </body>
</table>