<br><br><br>
@foreach($empresa as $key)
<table>
    <thead>
    <tr>
        <th><strong>NOMBRE DE LA EMPRESA:</strong> </th>
        <td><strong>{{$key->nombre}}</strong></td>
    </tr>
    <tr>
  
        <th><strong> MES:</strong></th>
        <td><strong>{{$mes}} {{$anio}}</strong></td>
    </tr>
    <tr>
 
        <th><strong> RUT:</strong></th>
        <td><strong>{{$key->tipo_documento}}-{{$key->ruf}}</strong></td>
    </tr>
</thead>


@endforeach
</table> 

        

            <table>
                <tr>
             <th colspan="6" style="text-align: center;"><strong>LIBRO MAYOR</strong></th>
                </tr>
           </table>
            @foreach($cuen as $val)
                            <table>
               

                    <thead>
                        
                        <tr>
                            <th style="text-align: center;" colspan="6"><strong>{{$val->nombre}} N°{{$val->codigo}}</strong></th>
                        </tr>
                        <tr>
                            <th style="text-align: center; width: 25px;"><strong> Fecha</strong></th>
                            <th style="text-align: center; width: 30px;"><strong>Explicación</strong> </th>
                            <th style="text-align: center; width: 10px;"><strong> Ref.</strong></th>
                            <th style="text-align: center; width: 15px;"><strong> Debe</strong></th>
                            <th style="text-align: center; width: 15px;"><strong> Haber</strong></th>
                            <th style="text-align: center; width: 15px;"><strong> Saldo</strong></th>
                       
                        </tr>
                    </thead>
                    <tbody class="text-center">
                         
                         @foreach($bus as $key)
                         
                        
                           @if($key->cuenta_id==$val->cuenta_id) 
                          

                           @if($key->debe)
                           <tr style="text-align: center;">

                               <td style="text-align: center;">{{date("d-m-Y", strtotime($key->fecha))}}</td>
                               <td style="text-align: center;">{{$key->descripcion}}</td>
                               <td style="text-align: center;">{{$key->n_folio}}/ {{$key->n_asiento}}</td>
                               <td style="text-align: center;">{{number_format($key->debe,2,',','.')}}</td>
                               <td></td>
                            
                                <td style="text-align: center;">{{number_format(abs( $saldos[$i][1]),2,',','.')}}</td> 
                            </tr>
                            
                            @else if($key->haber)
                            <tr style="text-align: center;">

                               <td style="text-align: center;">{{date("d-m-Y", strtotime($key->fecha))}}</td>
                               <td style="text-align: center;">{{$key->descripcion}}</td>
                               <td style="text-align: center;">{{$key->n_folio}}/ {{$key->n_asiento}}</td>
                               <td></td>
                               <td style="text-align: center;">{{number_format($key->haber,2,',','.')}}</td>

                            
                               <td style="text-align: center;">{{number_format(abs( $saldos[$i][1]),2,',','.')}}</td>
                            
                          
                            </tr>

                            @endif {{$i++}}
                            @endif
                          
                        
                            @endforeach
                            
                         


                            @foreach($total as $item)
                            @if($val->cuenta_id==$item[0])
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                @if($item[1])
                                <th style="text-align: center; "><strong>{{number_format($item[1],2,',','.')}}</strong></th>
                                @else 
                                <th></th>
                                @endif
                                @if($item[2])
                                <th style="text-align: center;"><strong>{{number_format($item[2],2,',','.')}}</strong></th>
                                @else 
                                <th></th>
                                @endif

                                <th></th>
                            </tr>
                            @endif
                            @endforeach  
                            
                          
                     </tbody>
                    
        
                </table>  
                <br>
                @endforeach  