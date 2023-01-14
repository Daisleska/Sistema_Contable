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
        <div class="col-md-7" ></div>
        <div class="col-md-5">
            @include('flash::message')
        </div>
</div>
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                 
                
                  
              

                    <table id="basic-datatable" class="table dt-responsive nowrap" >
                        <thead>
                            <tr >
                                <th COLSPAN="13" style="text-align: center; color: black;">Resoluciones</th>
                            </tr>
                            <tr>
                              <th>
                            
                                <button  type="button" class="btn btn-secondary" data-toggle="modal" title="Resoluciones" data-target="#bs-example-modal-sm1"><i data-feather="plus"></i></button>

                                <div class="btn-group">                           
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class='uil uil-file-alt mr-1'></i>Descargar
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                  
                    <a href="{{ route('resolucionesgeneral.pdf') }}" class="dropdown-item notify-item">
                        <i data-feather="download" class="icon-dual icon-xs mr-2"></i>
                        <span>PDF</span>
                    </a>
                    

                           
                             


                            </tr>
                           
                               
                                <th>N° Resolución</th>
                                <th>Funcionario</th>
                                <th>Fecha </th>
                                <th>Status</th>
                                <th>Opciones</th>
                              
                             

                            
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                   @foreach($resoluciones as $key)       
                <tr>
                <td>{{$key->n_resolucion}}</td>
                <td>{{$key->nombres}} {{$key->apellidos}}</td>
                <td>{{$key->fecha}}</td>
                <td>{{$key->status}}</td>
                <td>
                    @if(buscar_p('Reportes','PDF')=="Si")
                                            <a href="{{ route('resoluciones.pdf', $key->n_resolucion) }}" class="btn btn-info btn-sm"
                                                data-toggle="tooltip" 
                                                title="Resolución pdf"> <i data-feather="save"></i>
                                            </a>

                                            <a href="{{ route('noti_resolucion.pdf', $key->n_resolucion) }}" class="btn btn-danger btn-sm"
                                                data-toggle="tooltip" 
                                                title="Notificación pdf"> <i data-feather="save"></i>
                                            </a>
                        @endif
                </td>
                  
             
             
                
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
                                                        <h5 style="margin-left: 2cm;" class="modal-title" id="mySmallModalLabel">Resoluciones</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form  action="{{route('resoluciones.crear')}}" class="needs-validation" method="GET">
                                                    <div class="modal-body">


                                                        <?php 

                                                    use App\resoluciones;
                                                    $anio = date('Y');

                                                    $resolucion = \DB::select('SELECT * FROM `resoluciones` WHERE YEAR(fecha)='.$anio);

                                                    if($resolucion) {

                                                    $num=count($resolucion);
                                                    $anio = date('Y'); ?>

                                                    <th>N° Resolución</th>
                                                    <th><input style="width: 160px;" type="text" readonly="readonly" name="n_resolucion" class="form-control" value="00<?php  echo $num +1;?>-{{$anio}}"></th>

                            
                                                    </tr>
                                                    <?php }else{
                                                    $anio = date('Y');  ?>
                                 
                                                    <th>N° Resolución</th>
                                                    <th><input style="width: 160px;" type="text" readonly="readonly" name="n_resolucion" class="form-control" value="001-{{$anio}}"></th>

                                
                                                    </tr>
                                                    <?php
                                                    }?>
                                                       
                                                          <th>
                                                            Fecha <input type="date" name="fecha" value="<?php echo date("Y-m-d");?>" readonly="readonly" class="form-control" required="required">

                                                          </th>
                                                          <br>

                                                          <th>
                                                           Funcionario <select name="empleado_id" data-plugin="customselect" title="Seleccione el funcionario" required="required" class="form-control" data-placeholder=""  >
                                  
                                                           
                                                           @foreach($empleado as $key)
                                                          <option value="{{$key->id}}">{{ $key->nombres}} {{ $key->apellidos}}</option>
                                                          
                                                          @endforeach

                                                          
                                                          </select>


                                                          </th>
                                                        
                                                          

                                                         
                                  
                                </select>
                                                        </tr>
                                                        <div class="modal-footer">
                                                     <button type="button" class="btn btn-dark btn-xs remove-item" data-dismiss="modal">Cerrar</button>
                                                     <button type="submit" id="guardar_resoluciones" class="btn btn-primary btn-xs remove-item">Guardar</button>
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

