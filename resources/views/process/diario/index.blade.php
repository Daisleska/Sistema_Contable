@extends('layouts.app')

@section('css')
<!-- plugin css -->
<link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('Shreyu/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('Shreyu/assets/libs/multiselect/multi-select.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')

<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
           
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
                    <br>
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1">LIBRO DIARIO</h4>
                  <table style="color: black;" >

                    <th style="align-content: right;">
                @if(buscar_p('Diario','Registrar')=="Si")
                     <button  type="button" class="btn btn-secondary  btn-xs remove-item" data-toggle="modal" title="Registrar"  data-target="#bs-example-modal-xl"><i data-feather="plus"></i></button>
                @endif
                  
             @if(buscar_p('Reportes','PDF')=="Si" || buscar_p('Reportes','Excel')=="Si")
                <div class="btn-group">                           
                    <button type="button" class="btn btn-primary btn-xs remove-item" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" title="Descargar">
                    <i data-feather="download"></i>
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                   <a href="{{ route('diario_view') }}" class="dropdown-item notify-item">
                        <i data-feather="book-open" class="icon-dual icon-xs mr-2"></i>
                        <span>Excel</span>
                    </a>
                    <a href="{{ route('diario.pdf') }}" class="dropdown-item notify-item">
                        <i data-feather="download" class="icon-dual icon-xs mr-2"></i>
                        <span>PDF</span>
                    </a>
                    
                
                    </div></div>
                    @endif

                 @if(buscar_p('Diario','Cerrar o Abrir')=="Si")
                 <a href="{{ route('diario.cerrar', $n_folio) }}"  class="btn btn-danger btn-xs remove-item" title="Cerrar"><i data-feather="unlock"></i></a>
                 @endif

                @if(buscar_p('Diario','Historial')=="Si")
                 <a href="{{ route('historial') }}"  class="btn btn-info btn-xs remove-item" title="Historial"><i data-feather="clipboard"></i></a>
                 @endif
             </th>
                  
          </table>
                  <br>

                   <table id="basic-datatable" class="table dt-responsive nowrap" style="border-color: black; border: 1px;" border="1" >
                        <thead style="font-size: 12px;">
                            <tr>
                             
                                <th COLSPAN="5" style="color: black;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;LIBRO DIARIO &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Folio N° <?php echo $n_folio?></th>
                              
                            </tr>
                            <tr style="color: black; text-align: center;">
                                
                                <th >FECHA</th>
                                <th >CUENTA Y DESCRIPCIÓN</th>
                                <th >REF.</th>
                                <th >DEBE</th>
                                <th >HABER</th>
                                
                            
                            </tr>
                        </thead>
                        
                    
                    
                <tbody style="font-size: 12px;">
                <?php   foreach($diario as $key)  { ?>
                       
              <tr>
                  <td style="text-align: center; "><?php echo date("d-m-Y", strtotime($key->fecha)) ?></td>

                <?php $de_cuentas= \DB::select('SELECT DISTINCT cuentas.id, cuentas.nombre, cuentas.tipo, cuenta_has_diario.de_monto FROM cuentas, cuenta_has_diario, diario WHERE cuentas.id=cuenta_has_diario.cuenta_id AND cuenta_has_diario.n_asiento='.$key->n_asiento.' AND YEAR(cuenta_has_diario.fecha)=YEAR(CURRENT_DATE)'); ?>
                 
                 <td>
                   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&#45; {{$key->n_asiento}} &#45;
                   <br>
                 <?php   foreach($de_cuentas as $val) { 
                
                  echo $val->nombre;  ?><br><?php } ?>&nbsp; &nbsp; &nbsp; &nbsp;

                <?php $a_cuentas= \DB::select('SELECT DISTINCT cuentas.id, cuentas.nombre, cuentas.tipo, cuenta_has_diario.a_monto FROM cuentas, cuenta_has_diario, diario WHERE cuentas.id=cuenta_has_diario.c_destino AND cuenta_has_diario.n_asiento='.$key->n_asiento.' AND YEAR(cuenta_has_diario.fecha)=YEAR(CURRENT_DATE)'); ?>

                 <?php  foreach($a_cuentas as $item)  { ?> 
                 <?php echo $item->nombre; ?><br>&nbsp; &nbsp; &nbsp; &nbsp; <?php  } ?>
                <br><hr>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $key->descripcion; ?></td>
                
                <td style="text-align: center; "><br>
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
                
                <td style="text-align: center; "><br>
                <?php   foreach($de_cuentas as $val) { 
                 
                 echo number_format($val->de_monto,2,',','.'); 
                $activo[]= $val->de_monto;
                 
                  ?> <br> <?php }?> 
                   
                </td>
                <td style="text-align: center;  "><br>

                  
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
             </tr>
     
                            <?php  }?>
                          
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
                                <td colspan="3" style="text-align: center;">VAN</td>
                                <?php if (isset($debe)) { ?>
                                <td style="text-align: center; ">
                                {{number_format($debe,2,',','.')}}</td>
                                <?php   }else{
                                    $debe=0;
                               ?>
                                <td style="text-align: center; ">
                                {{number_format($debe,2,',','.')}}</td>
                                <?php } ?>

                                <?php if (isset($haber)) { ?>
                                <td style="text-align: center;  ">{{number_format($haber,2,',','.')}}</td>
                                <?php   }else{
                                    $haber=0;
                                ?>
                                <td style="text-align: center; ">{{number_format($haber,2,',','.')}}</td>
                              <?php  } ?>
                          </tr>
                        
                         
                               
                               </tbody>
                    </table>

                   
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
    <!-- end row-->
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
<!-- llamado al Modak----->
    @include('process.diario.create')
@endsection

@section('script')
<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/multiselect/jquery.multi-select.js') }}"></script>
@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/js/pages/form-advanced.init.js') }}"></script>

@endsection
