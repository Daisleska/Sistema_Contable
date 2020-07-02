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
                  <table >
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
                
                    </div></div>
                 <a href="{{ route('diario.cerrar', $n_folio) }}"  class="btn btn-danger" title="Cerrar">Cerrar Libro</a>

                 <a href="{{ route('historial') }}"  class="btn btn-info" title="Ver Historial">Historial</a></th>
                  
          </table>
                  <br>

                   <table id="basic-datatable" class="table dt-responsive nowrap" style="border-color: black; border: 1px;" border="1" >
                        <thead >
                            <tr>
                             
                                <th COLSPAN="5" style="color: black;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;LIBRO DIARIO &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Folio N° <?php echo $n_folio?></th>
                              
                            </tr>
                            <tr style="color: black; ">
                                
                                <th >FECHA</th>
                                <th >CUENTA Y DESCRIPCIÓN</th>
                                <th >REF.</th>
                                <th >DEBE</th>
                                <th >HABER</th>
                                
                            
                            </tr>
                        </thead>
                        
                    
                    
                <tbody>
                <?php   foreach($diario as $key)  { ?>
                       
              <tr>
                  <td style="text-align: center; "><?php echo $key->fecha; ?></td>

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

