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
                                <th COLSPAN="5" style="text-align: center; color: black;">Inventario Bienes Públicos</th>
                            </tr>
                            <tr>
                              <th>
                            
                                <button  type="button" class="btn btn-secondary" data-toggle="modal" title="" data-target="#bs-example-modal-sm1"><i data-feather="plus"></i></button>

                                <button  type="button" class="btn btn-danger" data-toggle="modal" title="" data-target="#bs-example-modal-sm2"><i data-feather="plus"></i></button>

                                @if(buscar_p('Reportes','PDF')=="Si" || buscar_p('Reportes','Excel')=="Si")
                     <div class="btn-group">                           
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class='uil uil-file-alt mr-1'></i>Descargar
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                  
                    <a href="{{ route('inventariob_personas.pdf') }}" class="dropdown-item notify-item">
                        <i data-feather="download" class="icon-dual icon-xs mr-2"></i>
                        <span>PDF</span>
                    </a>
                   
                
                    </div></div>
                    @endif
                           
                             


                            </tr>
                           
                               
                              
                                <th>Fecha</th>
                                <th>N° Ident</th>
                                <th>Descripción</th>
                                <th>Asignado A</th>
                                <th>Status</th>
                                <th>Opciones</th>
                              
                             

                            
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                   @foreach($inventario as $key)       
                <tr>
              
                <td>{{$key->fecha}}</td>
                <td>{{$key->codigo}}</td>
                <td>{{$key->nombre}}</td>
                <td>{{$key->nombres}} {{$key->apellidos}}</td>
                <td>{{$key->status}}</td>
                <td>
                    <button  class="btn btn-danger btn-xs" onclick="alert_eliminar('{{$key->n_inven}}')" title="Eliminar"><i data-feather="trash-2"></i></button>
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
                                            <div class="modal-dialog modal-sm3">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="margin-left: 4cm;" class="modal-title" id="mySmallModalLabel">Asignar a Persona</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form  action="{{route('inventariobienes.asignar_personas')}}" class="needs-validation" method="GET">
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
                                                        Bienes<select  class="select2 form-control custom-select"  name="bienes_id" id="bienes_select">
                                                        <option selected="selected" disabled="disabled" readonly>Seleccione el Bien</option>
                                                        @foreach($bienes as $key)
                                                        <option value="{{ $key->id }}">{{ $key->codigo }} {{ $key->nombre }}</option>
                                                        @endforeach
                                                         </select>
                                           
                                           </th>
                                           <br> 
                                           <th>
                                            <table id="lista_bienes" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>N° de Ident</th>
                                                <th>Descripción</th>
                                                <th>Opción</th>
                                            </tr>
                                        </thead> 
                                    </table>
                                               
                                           </th>   
                                           <br>           
                                                        
                                                        <div class="modal-footer">
                                                     <button type="button" class="btn btn-dark btn-xs remove-item" data-dismiss="modal">Cerrar</button>
                                                     <button type="submit" id="asignar_bien" class="btn btn-primary btn-xs remove-item">Guardar</button>
                                                     </div>
                                                     </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
    

  


   <div class="modal fade" id="bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm3">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="margin-left: 2cm;" class="modal-title" id="mySmallModalLabel">Generar Acta de Asignación de Bienes</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form  action="{{route('inventariobienes.asignar_acta')}}" class="needs-validation" method="GET">
                                                    <div class="modal-body">
                                                       
                                                         

                                                          <th>
                                                           Personal <select name="empleado_id" data-plugin="customselect" title="Seleccione el empleado" required="required" class="form-control" data-placeholder=""  >
                                  
                                                           
                                                           @foreach($personal as $key)
                                                          <option value="{{$key->id}}">{{ $key->nombres}} {{ $key->apellidos}}
                                                          </option>


                                                          @endforeach




                                                       </select>
                                                       
                                                    
                                                        
                                                        <div class="modal-footer">
                                                     <button type="button" class="btn btn-dark btn-xs remove-item" data-dismiss="modal">Cerrar</button>
                                                     <button type="submit" id="asignar_acta" class="btn btn-primary btn-xs remove-item">Generar</button>
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


<script>
$(document).ready( function(){
    var LineNum=0;
    $("#bienes_select").on("change", function (event) {
        var id = event.target.value;


        $.get("/bienes/"+id+"/add",function (data) {
        

           //$("#lista_productos").empty();
       
            
            if(data.length > 0){
                LineNum++;
                for (var i = 0; i < data.length ; i++) 
                {
                    //$('#products_select').children('option[value="'+id+'"]').attr('disabled',true);
                    //$("#lista_productos").append('<tr>'); 
                    //$("#products").removeAttr('disabled');
                    $("#lista_bienes").append('<tr id="Line'+LineNum+'"><td><input type="hidden" name="bienes_id[]" id="bienes_id" value="'+ data[i].id + '">' + data[i].codigo +'</td><td>' + data[i].nombre +'</td><td><button type="button" onclick="EliminarLinea('+LineNum+','+data[i].id+');"  class="btn btn-danger btn-sm"><i class="m-r-10 mdi mdi-delete"><code class="m-r-10"></code><i class="uil-minus"></i></button></td></tr>');
                    //$("#lista_productos").append('</tr>');
                }

            }else{
                
                //$("#client_id").attr('disabled', false);

            }
        });
    });

    
});

function EliminarLinea(rnum,id_opcion) {
    var next=id_opcion-1;
    //console.log(id_opcion+" siguiente "+next);
    /*$('#products_select').children('option[value="'+next+'"]').attr('selected',true);
    $('#products_select').children('option[value="'+id_opcion+'"]').removeAttr('disabled');*/
    $('#Line'+rnum).remove();
        return true;
}
</script>