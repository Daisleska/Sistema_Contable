@extends('layouts.app')

@section('css')
<!-- plugin css -->
<link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
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
                    </table>
                  
              

                    <table id="basic-datatable" class="table dt-responsive nowrap" >
                        <thead>
                            <tr >
                                <th COLSPAN="13" style="text-align: center; color: black;">LIBRO DE CAJA CHICA</th>
                            </tr>
                            <tr>
                              <th><button  type="button" class="btn btn-danger btn-xs remove-item" data-toggle="modal" data-target="#bs-example-modal-sm1"><i data-feather="minus-circle"></i></button>

                              <button  type="button" class="btn btn-success btn-xs remove-item" data-toggle="modal" data-target="#bs-example-modal-sm2"><i data-feather="plus-circle"></i></button>

                              <button  type="button" class="btn btn-info btn-xs remove-item" data-toggle="modal" data-target="#bs-example-modal-sm3"><i data-feather="download"></i></button></th>


                            </tr>
                             <tr style="color: black;">
                                <th id="saldo" COLSPAN="3">SALDO INICIAL: 
                                <?php

                                 use App\cuenta;

                                $cuenta=DB::table ('cuentas')->select('saldo')->where('nombre', '=', 'Caja Chica')->get();
                                ?>
                                @foreach($cuenta as $key)
                                {{number_format($key->saldo,2,',','.')}}</th>
                               @endforeach

                              
                    
                                <th>Semana:{{$semana}} /   Mes:{{$mes}}</th>
                   
                              </tr>
                            <tr style="color: black;">
                               
                            
                                <th>FECHA</th>
                                <th>CONCEPTO</th>
                                <th>INGRESOS</th>
                                <th>EGRESOS</th>
                                <th>SALDO</th>
                              
                             

                            
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                      @foreach($cajachica as $key)      
                <tr>
                  <td>{{$key->fecha}}</td>
                  <td>{{$key->concepto}}</td>
                  <td style="color: green;">+ {{number_format($key->ingresos,2,',','.')}}</td>
                  <td style="color: red;">- {{number_format($key->egresos,2,',','.')}}</td>
                  <td style="color: black;">{{number_format($key->saldo,2,',','.')}}</td>
                  
             
             
                
                </tr>
               
                     @endforeach
                          
                             </tbody>
                    </table>
                    

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
    <!-- egreso -->
     <div class="modal fade" id="bs-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mySmallModalLabel">Registrar nuevo Egreso</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form  action="{{route('cajachica.egreso')}}" class="needs-validation" method="GET">
                                                    <div class="modal-body">
                                                        <tr>
                                                          <th>
                                                            Fecha <input type="date" name="fecha" value="<?php echo date("Y-m-d");?>" readonly="readonly" class="form-control">

                                                            Monto <input type="text" name="egreso" id="monto_egreso" class="form-control">

                                                           N° Comprobante <input type="text" name="n_comp" class="form-control">
                                                           Descripción <input type="text" name="concepto" class="form-control"> 


                                                          </th>
                                                        </tr>
                                                        <div class="modal-footer">
                                                     <button type="button" class="btn btn-dark btn-xs remove-item" data-dismiss="modal">Cerrar</button>
                                                     <button type="submit" id="guardar_egreso" class="btn btn-danger btn-xs remove-item">Guardar</button>
                                                     </div>
                                                     </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
     <!-- rembolso -->
     <div class="modal fade" id="bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mySmallModalLabel">Registrar nuevo Rembolso</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form  action="{{route('cajachica.ingreso')}}" class="needs-validation" method="GET">
                                                    <div class="modal-body">
                                                       <tr>
                                                         <th>
                                                           Fecha <input type="date" name="fecha" value="<?php echo date("Y-m-d");?>" readonly="readonly" class="form-control">

                                                           Monto <input type="text" name="ingreso" class="form-control">

                                                           N° Comprobante <input type="text" name="n_comp" class="form-control">
                                                           Descripción <input type="text" name="concepto" class="form-control"> 
                                                         </th>
                                                       </tr>
                                                       <div class="modal-footer">
                                                     <button type="button" class="btn btn-dark btn-xs remove-item" data-dismiss="modal">Cerrar</button>
                                                     <button type="submit" class="btn btn-success btn-xs remove-item">Guardar</button>
                                                     </div>
                                                     </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

    <!-- pdf -->
     <div class="modal fade" id="bs-example-modal-sm3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mySmallModalLabel">Rango de fecha</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form  action="{{route('cajachica.pdf')}}" class="needs-validation" method="GET">
                                                    <div class="modal-body">
                                                      
                                                      <tr>
                                                        <th>Desde <input type="date" name="fecha" class="form-control" required="required">
                                                        Hasta <input type="date" name="fecha2" class="form-control" required="required"></th>
                                                      </tr>
                                                      <div class="modal-footer">
                        
                                                     <button type="button" class="btn btn-dark btn-xs remove-item" data-dismiss="modal">Cerrar</button>
                                                     <button type="submit" class="btn btn-info btn-xs remove-item">Buscar</button>

                                                     </div>
                                                   </form>
                                                    </div>
                                                  
                                                </div><!-- /.modal-content -->
                                             
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
@endsection

@section('script')
<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('js/feather.min.js')}}"></script>
<script src="{{ URL::asset('js/jquery/dist/jquery.maskedinput.js')}}
"></script> 
@endsection
<script src="{{ URL::asset('js/jquery/dist/jquery.min.js') }}"></script>
@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
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
@if($alerta == '1')
<script type="text/javascript">
  $(function(){
        alertica();
    });

      function alertica(){
       swal({
        icon : "error",
        title : "Lo sentimos, no posee ningun registro",
        text : "El sistema de busqueda no encontro ningun registro acorde con la fecha ingresa, intente nuevamente!",
        buttons : {
            confirm: {
                text: "OK",
                value: true,
                visible: true,       
            },
             
        },

       });

    }
</script>
@endif