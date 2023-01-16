@extends('layouts.app')

@section('css')
<!-- plugin css -->
<link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
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
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1">PERSONAL</h4>
                    
                    @if(buscar_p('Registros Generales','Registrar')=="Si")
                    <a href="{{ route('empleado.create') }}" class="btn btn-secondary" title="Registrar" ><i data-feather="plus"></i></a>
                    @endif
                    @if(buscar_p('Reportes','PDF')=="Si" || buscar_p('Reportes','Excel')=="Si")
                    <div class="btn-group">                           
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class='uil uil-file-alt mr-1'></i>Descargar
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                  
                    <a href="{{ route('empleado.pdf') }}" class="dropdown-item notify-item">
                        <i data-feather="download" class="icon-dual icon-xs mr-2"></i>
                        <span>PDF</span>
                    </a>
                   
                
                    </div></div>
                    @endif
                    <br></br>


                     <table id="key-datatable" class="table dt-responsive nowrap">
                        <thead style="font-size: 12px;">
                            <tr>
                                <th>Nombres y Apellidos</th>
                                <th>Cédula</th>
                                <th>Tipo de Personal</th>
                                <th>Cargo</th>
                                <th>Adscripción</th>
                                <th>Fecha de Ingreso</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                    
                    
                        <tbody style="font-size: 12px;">
                            @foreach($empleado as $key)
                <tr>
                  <td>{{$key->nombres}} {{$key->apellidos}}</td>
                  <td>{{$key->tipo_doc}}{{$key->cedula}}</td>
                  <td>{{$key->tipo_personal}}</td>
                  <td>{{$key->cargo}}</td>
                  <td>{{$key->adscripcion}}</td>
                  <td>{{$key->fecha_ingreso}}</td>
                  <td>
                  @if(buscar_p('Registros Generales','Modificar')=="Si" || buscar_p('Registros Generales','Eliminar')=="Si")   
                        <button type="button" class="btn btn-info btn-sm" title="Editar"><a href="{{ route('empleado.edit',$key->id) }}"><i data-feather="edit"></i></a></button>
                    
                       <br><br>
                       
                        <button   class="btn btn-danger btn-sm" onclick="alert_eliminar_cli('{{$key->id}}')" title="Eliminar"><i data-feather="trash-2"></i></button>
                        <br><br>
                 
                   <button onclick="detalles('{{$key->id}}')" type="button" class="btn btn-success btn-xs" title="Ver más" data-toggle="modal" data-target="#centermodal"><i data-feather="zoom-in"></i></button>
                  @endif
                    </td>
                </tr>
                @endforeach
                          
                             </tbody>
                    </table>
</div>
</div>
</div>
</div>

<div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="header-title mt-0 mb-1"style="margin-left: 2.9cm;"  id="myCenterModalLabel">Información del Empleado</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      @if(isset($key)==true)
                                                     <tr>
                                                        <p style="color:black;">Nombres y Apellidos: {{$key->nombres}} {{$key->apellidos}}</p>
                                                    </tr>
                                                    <tr>
                                                        <p style="color:black;">Cedula: {{$key->tipo_doc}}{{$key->cedula}} </p>
                                                    </tr>
                                                    <tr>
                                                        <p style="color:black;">Fecha de Nacimiento: {{$key->fecha_nac}} </p>
                                                    </tr>
                                                
                                                    <tr>
                                                        <p style="color:black;">Sexo: {{$key->sexo}} </p>
                                                    </tr>
                                                 
                                                    <tr>
                                                        <p style="color:black;">Sexo: {{$key->estado_civil}} </p>
                                                    </tr>

                                                    

                                                    <tr>
                                                        <p style="color:black;">Tipo: {{$key->tipo_personal}} </p>
                                                    </tr>

                                                    <tr>
                                                        <p style="color:black;">Cargo: {{$key->cargo}} </p>
                                                    </tr>

                                                    <tr>

                                                       <p style="color:black;">Dirección de Adscripción: {{$key->adscripcion}} </p>
                                                    
                                                        
                                                    </tr>

                                                    <tr>
                                                        <p style="color:black;">Fecha de Ingreso: {{$key->fecha_ingreso}} </p>
                                                    </tr>

                                                    <tr>
                                                        <p style="color:black;">Dirección: {{$key->direccion}} </p>
                                                    </tr>

                                                    <tr>
                                                        <p style="color:black;">Sueldo Mensual: {{number_format($key->sueldo,2,',','.')}} Bs </p>
                                                    </tr>

                                                    @endif
                                                        <div class="modal-footer" style="align-content: center;">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                                
                            </div> 
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
@endsection

@section('script')

<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>

<script type="text/javascript">
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
@endsection

<script type="text/javascript">
      function alert_eliminar_cli(id){
        console.log(id);
       swal({
        icon : "warning",
        title : "¿Seguro desea eliminar el Empleado?",
        text : "",
        buttons : {
            cancel: {
                text: "Cancelar",
                value : null,
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: "Eliminar",
                value: true,
                visible: true,

                
            },
             
        },

       }).then(function(confirm){
        if (confirm) {

           $.ajax ({

          url: '/empleado/'+id+'/eliminar',
          headers: { id: id},
          method: "GET"

         });

        location.reload();
          }
       });

    }
</script>


 <script type="text/javascript">
  
  
  function detalles(id, nombres, apellidos, cedula, fecha_nac, tipo, cargo_id, departamento_id, fecha_ingreso, direccion){

  $.ajax({
        url: 'index.blade.php',
        type: 'POST',
        data: {nombres: nombres, apellidos: apellidos, cedula: cedula,  fecha_nac: fecha_nac, tipo: tipo, cargo_id: cargo_id, departamento_id: departamento_id, fecha_ingreso: fecha_ingreso, direccion:direccion }
    }).success(function(respuesta){
        // console.log(respuesta);
        $('#tablita').html(respuesta);
    });
   
    $("#id").text(id);
    $("#nombres").text(nombres);
    $("#apellidos").text(apellidos);
    $("#cedula").text(cedula);
    $("#fecha_nac").text(fecha_nac);
    $("#tipo").text(tipo);
    $("#cargo_id").text(cargo_id);
    $("#departamento_id").text(departamento_id);
    $("#fecha_ingreso").text(fecha_ingreso);
    $("#direccion").text(direccion);

}

</script>

