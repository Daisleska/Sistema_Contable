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
                   <table >
                        <thead >
                            <tr>
                             
                                <th COLSPAN="5" style="color: black; text-align: center;"> <strong>LIBRO DIARIO Folio N° <?php echo $n_folio?></strong></th>
                              
                            </tr>
                            <tr style="color: black; ">
                                
                                <th style="width: 25px; text-align: center;"><strong>FECHA</strong></th>
                                <th style="width: 30px; text-align: center;"><strong>CUENTA Y DESCRIPCIÓN</strong></th>
                                <th style="width: 20px; text-align: center;"><strong>REF.</strong></th>
                                <th style="width: 25px; text-align: center;"><strong>DEBE</strong></th>
                                <th style="width: 20px; text-align: center;"><strong>HABER</strong></th>
                                
                            
                            </tr>
                        </thead>
                        @foreach($diario as $key)
                         
                        
                           <tr>
                               
                               <td style="text-align: center;">{{date("d-m-Y", strtotime($key->fecha))}}</td>

                               <td style="text-align: center;">-{{$key->n_asiento}}-</td>

                               <td></td>

                               <td></td>

                               <td></td>
                           </tr>

                            

                            <?php $de_cuentas= \DB::select('SELECT DISTINCT cuentas.id, cuentas.nombre, cuentas.tipo, cuenta_has_diario.de_monto FROM cuentas, cuenta_has_diario, diario WHERE cuentas.id=cuenta_has_diario.cuenta_id AND cuenta_has_diario.n_asiento='.$key->n_asiento.' AND YEAR(cuenta_has_diario.fecha)=YEAR(CURRENT_DATE)'); ?>

                            @foreach($de_cuentas as $val)
                            <tr>
                               
                           
                               <td></td>
                            
                               <td>{{$val->nombre}}</td>

                            <?php
                            $cuenta=DB::table ('cuentas')->select('codigo')->where('id',$val->id )->get();
                            ?>
                            @foreach($cuenta as $k)
                  
                               <td style="text-align: center;">{{$k->codigo}}</td>
                            @endforeach
                            
                               <td style="text-align: center;">{{number_format($val->de_monto,2,',','.')}}</td>
                            <?php 
                            $activo[]= $val->de_monto;
                 
                            ?>
                           
                               <td></td>

                           </tr>
                            @endforeach

                           
                            <?php $a_cuentas= \DB::select('SELECT DISTINCT cuentas.id, cuentas.nombre, cuentas.tipo, cuenta_has_diario.a_monto FROM cuentas, cuenta_has_diario, diario WHERE cuentas.id=cuenta_has_diario.c_destino AND cuenta_has_diario.n_asiento='.$key->n_asiento.' AND YEAR(cuenta_has_diario.fecha)=YEAR(CURRENT_DATE)'); ?>
                            @foreach($a_cuentas as $item) 
                            <tr>
                                <td></td>
                                <td>&nbsp; &nbsp; &nbsp; &nbsp;{{$item->nombre}}</td>
                             <?php
                            $cuent=DB::table ('cuentas')->select('codigo')->where('id', $item->id )->get();

                            ?>
                            @foreach($cuent as $val)
                  
                                <td style="text-align: center;">{{$val->codigo}}</td>
                            @endforeach
                            <td></td>
                            <td style="text-align: center;">{{number_format($item->a_monto,2,',','.') }}</td>

                             <?php 
                             $pasivo[]= $item->a_monto;
                             
                              ?> 
                                
                            @endforeach
                           </tr>

                           <tr>
                               <td></td>
                               <td style="text-align: center;">{{$key->descripcion}}</td>
                               <td></td>
                               <td></td>
                               <td></td>
                           </tr>

                            
                           @endforeach

                           <tbody>
                          <tr>
                                <?php
                                if (isset($activo)) {
                                $debe=array_sum($activo);
                                }else{
                                    $activo[]=0; 
                                }

                                 if (isset($pasivo)) {
                                $haber=array_sum($pasivo);
                                }else{  
                                 $pasivo[]=0;
                                }

                                 ?>
                                <td colspan="3" style="text-align: center;"><strong>VAN</strong></td>
                                <?php if (isset($debe)) { ?>
                                <td style="text-align: center; ">
                                <strong>{{number_format($debe,2,',','.')}}</strong></td>
                                <?php   }else{
                                    $debe=0;
                               ?>
                                <td style="text-align: center; ">
                                <strong>{{number_format($debe,2,',','.')}}</strong></td>
                                <?php } ?>

                                <?php if (isset($haber)) { ?>
                                <td style="text-align: center;  "><strong>{{number_format($haber,2,',','.')}}</strong></td>
                                <?php   }else{
                                    $haber=0;
                                ?>
                                <td style="text-align: center; "><strong>{{number_format($haber,2,',','.')}}</strong></td>
                              <?php  } ?>
                          </tr>
                               
                        </tbody>
                    </table>

             