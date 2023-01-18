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
                 
                    <br>
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1">CONTRATOS</h4>
                    <a><button  type="button" class="btn btn-secondary" data-toggle="modal" title="Contratos" data-target="#bs-example-modal-sm1"><i data-feather="plus"></i></button></a>


                    <div class="btn-group">                           
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class='uil uil-file-alt mr-1'></i>Descargar
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                  
                    <a href="{{ route('contratosgeneral.pdf') }}" class="dropdown-item notify-item">
                        <i data-feather="download" class="icon-dual icon-xs mr-2"></i>
                        <span>PDF</span>
                    </a>
               
                    </div></div>
                            
                    <br></br>        
                           
                             
                    <table id="key-datatable" class="table dt-responsive nowrap">
                        <thead style="font-size: 12px;">

                            </tr>
                           
                               
                              
                                <th>Personal</th>
                                <th>Fecha E</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Status</th>
                                <th>Opciones</th>
                              
                             

                            
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                   @foreach($contratos as $key)       
                <tr>
              
                <td>{{$key->nombres}} {{$key->apellidos}}</td>
                <td>{{$key->fecha}}</td>
                <td>{{$key->fecha_inicio}}</td>
                <td>{{$key->fecha_final}}</td>
                <td>{{$key->status}}</td>
                <td>
                    @if(buscar_p('Reportes','PDF')=="Si")
                                            <a href="{{ route('contratos.pdf', $key->numero) }}" class="btn btn-info btn-sm"
                                                data-toggle="tooltip" 
                                                title="Generar pdf"><i data-feather="save"></i>
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
                                                        <h5 style="margin-left: 1.5cm;" class="modal-title" id="mySmallModalLabel">Registrar Contrato</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form  action="{{route('contratos.crear')}}" class="needs-validation" method="GET">
                                                    <div class="modal-body">
                                                       
                                                          <th>
                                                            Fecha <input type="date" name="fecha" value="<?php echo date("Y-m-d");?>" readonly="readonly" class="form-control" required="required">

                                                          </th>
                                                          <br>

                                                          <th>
                                                           Personal <select name="empleado_id" data-plugin="customselect" title="Seleccione el empleado" required="required" class="form-control" data-placeholder=""  >
                                  
                                                           
                                                           @foreach($empleado as $key)
                                                          <option value="{{$key->id}}">{{ $key->nombres}} {{ $key->apellidos}}
                                                          </option>


                                                          @endforeach

                                                       </select>
                                                        
                                                          </th>
                                                          
                                                          
                                                           
                                                           <br>
                                                          <th>
                                                            Área <input type="text" name="area" class="form-control" required="required">

                                                          </th>
                                                          <br>
                                                          <th>
                                                            Tareas <input type="texarea" name="tarea" class="form-control" required="required">

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

