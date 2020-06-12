@extends('layouts.app')

@section('css')
<!-- plugin css -->
<link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('Shreyu/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('Shreyu/assets/libs/multiselect/multiselect.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')

<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Shreyu</a></li>
                <li class="breadcrumb-item"><a href="">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Advanced</li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0"></h4>
    </div>
</div>
@endsection

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1"></h4>
                    <table style="color: black;">
                      <?php
                      use App\empresa;

  $empresa=DB::table ('empresa')->select('nombre', 'tipo_documento','ruf')->get();

                       
                      foreach($empresa as $key){
                        ?>
                        <tr >
                            <th>NOMBRE DE LA EMPRESA:</th>
                            <th><?php echo e($key->nombre)?></th>
                        </tr>
                        <tr>
                            <th>MES:
                            <script style="text-align: right;" type="text/javascript">document.write("" + months[month] + " " + year);</script></th>
                        </tr>
                        <tr>
                            <th>RUT:
                            <?php echo e($key->tipo_documento)?>-<?php echo e($key->ruf)?></th>
                         <?php
                        }
                        ?>
                    </tr>

                    <th style="align-content: right;">
                     <button  type="button" class="btn btn-secondary" data-toggle="modal" title="Registrar"  data-target="#bs-example-modal-xl"><i data-feather="plus"></i></button>
                  
            
                       <div class="btn-group">                           
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class='uil uil-file-alt mr-1'></i>Descargar
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                   <a href="#" class="dropdown-item notify-item">
                        <i data-feather="book-open" class="icon-dual icon-xs mr-2"></i>
                        <span>Excel</span>
                    </a>
                    <a href="{{ route('diario.pdf') }}" class="dropdown-item notify-item">
                        <i data-feather="download" class="icon-dual icon-xs mr-2"></i>
                        <span>PDF</span>
                    </a>
                    <a href="javascript:window.print()" class="dropdown-item notify-item">
                        <i data-feather="printer" class="icon-dual icon-xs mr-2"></i>
                        <span>Imprimir</span>
                    </a>
                
                    </div></div></th>
                  </tr>

                    </table>
                  

                    <table style=" color: black; border: solid; width: 22cm;" border="1" id="basic-datatable" class="table dt-responsive nowrap">
                        <thead style=" color: black; border: solid;">
                            <tr style="color: black; border: solid;" >
                                <th COLSPAN="5" style="text-align: center;">LIBRO DIARIO</th>
                            </tr>
                            <tr style="color: black; font-size: 12px;">
                                
                                <th style="text-align: center; color: black; border: solid;">FECHA</th>
                                <th style="text-align: center; color: black; border: solid;">CUENTA Y DESCRIPCIÓN</th>
                                <th style="text-align: center; color: black; border: solid;">REF.</th>
                                <th style="text-align: center; color: black; border: solid;">DEBE</th>
                                <th style="text-align: center; color: black; border: solid;">HABER</th>
                                
                            
                            </tr>
                        </thead>
                        
                    
                    
                <tbody>
                <?php   foreach($diario as $key)  { ?>
                       
                <tr>
                  <td style="text-align: center; color: black; border: solid;"><?php echo $key->fecha; ?></td>

                <?php $de_cuentas= \DB::select('SELECT DISTINCT cuentas.id, cuentas.nombre, cuentas.tipo, cuenta_has_diario.de_monto FROM cuentas, cuenta_has_diario, diario WHERE cuentas.id=cuenta_has_diario.cuenta_id AND cuenta_has_diario.diario_id='.$key->id_d.''); ?>
                 
                 <td style="color: black; border: solid;">
                   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&#45; <?php echo $i++;  ?> &#45;<br>
                 <?php   foreach($de_cuentas as $val) { 
                
                  echo $val->nombre;  ?><br><?php } ?>&nbsp; &nbsp; &nbsp; &nbsp;

                <?php $a_cuentas= \DB::select('SELECT DISTINCT cuentas.id, cuentas.nombre, cuentas.tipo, cuenta_has_diario.a_monto FROM cuentas, cuenta_has_diario WHERE cuentas.id=cuenta_has_diario.c_destino AND cuenta_has_diario.diario_id='.$key->id_d.''); ?>

                 <?php  foreach($a_cuentas as $item)  { ?> 
                 <?php echo $item->nombre; ?><br>&nbsp; &nbsp; &nbsp; &nbsp; <?php  } ?>
                <br><hr>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $key->descripcion; ?></td>
                
                <td style="text-align: center; color: black; border: solid;"><br>
                <?php   foreach($de_cuentas as $val) { 

                

                $cuenta=DB::table ('cuentas')->select('codigo')->where('id',$val->id )->get();
                 ?>
                 @foreach($cuenta as $key)
                 {{$key->codigo}} @endforeach<br> <?php } 
                 foreach($a_cuentas as $item)  { 

                 

                 $cuent=DB::table ('cuentas')->select('codigo')->where('id', $item->id )->get();

                ?>
                @foreach($cuent as $val)
                 {{$val->codigo}} @endforeach<br> <?php } ?>



                </td>
                
                <td style="text-align: center; color: black; border: solid;"><br>
                <?php   foreach($de_cuentas as $val) { 
                 
                 echo number_format($val->de_monto,2,',','.'); 
                $activo[]= $val->de_monto;
                 
                  ?> <br> <?php }?> 
                   
                </td>
                <td style="text-align: center; color: black; border: solid;"><br>

                  
                  <?php 

                 
                 $l=count($de_cuentas);
                 

                 for ($i=0; $i < $l; $i++) { 

                   ?><br> <?php
                 }
                 foreach ($a_cuentas as $item) {
                  
                echo number_format($item->a_monto,2,',','.'); 
                 $pasivo[]= $item->a_monto;
                 
                  ?> <br> <?php }?> 
                 
                  
                 
                 
                
                  
                </td>

                

                
                

                
                  
               
                             </tbody>
                            <?php  }?>
                          
                          <tr style=" color: black; border: solid;">
                                <?php $debe=array_sum($activo);
                                $haber=array_sum($pasivo);  ?>
                                <td colspan="3" style="text-align: center;">VAN</td>
                                <td style="text-align: center; color: black; border: solid;">{{number_format($debe,2,',','.')}}</td>
                                <td style="text-align: center; color: black; border: solid;">{{number_format($haber,2,',','.')}}</td>
                          </tr>
                        
                         
                               
                              
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

<!-- llamado al Modak----->
    @include('process.diario.create')


@endsection

@section('script')
<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/multiselect/multiselect.min.js') }}"></script>
@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/js/pages/form-advanced.init.js') }}"></script>
@endsection

<script type="text/javascript">

function makeArray() {
for (i = 0; i<makeArray.arguments.length; i++)
this[i + 1] = makeArray.arguments[i];}
var months = new makeArray('Enero','Febrero','Marzo','Abril','Mayo',
'Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
var date = new Date();
var day = date.getDate();
var month = date.getMonth() + 1;
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;

//]]>

</script>