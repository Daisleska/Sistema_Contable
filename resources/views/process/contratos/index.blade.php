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
                 
                
                  
              

                    <table id="basic-datatable" class="table dt-responsive nowrap" >
                        <thead>
                            <tr >
                                <th COLSPAN="13" style="text-align: center; color: black;">Contratos</th>
                            </tr>
                            <tr>
                              <th>
                            
                                <button  type="button" class="btn btn-danger btn-xs remove-item" data-toggle="modal" title="Contratos" data-target="#bs-example-modal-sm1"><i data-feather="minus-circle"></i></button>
                           
                             


                            </tr>
                           
                               
                            
                                <th>Empleado</th>
                                <th>Fecha E</th>
                                <th>Fecha Ingreso</th>
                                <th>Fecha fin</th>
                              
                             

                            
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                          
                <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                  
             
             
                
                </tr>
               
                 
                          
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
                                                        <h5 style="margin-left: 1.3cm;" class="modal-title" id="mySmallModalLabel">Registrar Contrato</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form  action="{{route('cajachica.egreso')}}" class="needs-validation" method="GET">
                                                    <div class="modal-body">
                                                        <tr>
                                                            <th>
                                    <?php                         
                                use App\contratos;

                                $contrato=DB::table ('contratos')->select('n_control')->take(1)->orderBy('n_control', 'desc')->first();

                                 if($contrato) {
                            ?>

                                <th>N° Contrato</th>
                                <th><input  type="text" readonly="readonly" name="n_control" class="form-control" value="<?php  echo $contrato->n_control +1; ?>"></th>



                          
                            </tr>
                          <?php }else{
                            ?>
                                
                                <th>N° Contrato</th>
                                <th><input  type="text" readonly="readonly" name="n_control" class="form-control" value="1"></th>

                                
                            </tr>
                            <?php
                          }?>  </th>
                                                            <br>
                                                          <th>
                                                            Fecha <input type="date" name="fecha" value="<?php echo date("Y-m-d");?>" readonly="readonly" class="form-control" required="required">

                                                          </th>
                                                          <br>

                                                          <th>
                                                           Empleado <select name="empleado_id" data-plugin="customselect" title="Seleccione el empleado" required="required" class="form-control" data-placeholder=""  >
                                  
                                                           <option selected="selected" disabled="disabled" readonly>Seleccione el empleado</option>
                                                           @foreach($empleado as $key)
                                                          <option value="{{$key->empleado_id}}">{{ $key->nombres}} {{ $key->apellidos}}</option>
                                                          @endforeach
                                                          </select>

                                                          </th>
                                                          <br>
                                                          <th>
                                                            Tareas <input type="text" name="tarea" class="form-control" required="required">

                                                          </th>
                                                          <br>
                                                          <th>
                                                            Fecha Inicio<input type="date" name="fecha_inicio"  class="form-control" required="required">

                                                          </th>

                                                          <br>

                                                          <th>
                                                            Fecha Final <input type="date" name="fecha_final" value="fecha_final"  class="form-control" required="required">

                                                          </th>

                                                         
                                  
                                </select>
                                                        </tr>
                                                        <div class="modal-footer">
                                                     <button type="button" class="btn btn-dark btn-xs remove-item" data-dismiss="modal">Cerrar</button>
                                                     <button type="submit" id="guardar_contrato" class="btn btn-primary btn-xs remove-item">Guardar</button>
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

