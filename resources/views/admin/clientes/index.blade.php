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
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1">Clientes</h4>
                    
                    @if(buscar_p('Registros Generales','Registrar')=="Si")
                    <a href="{{ route('clientes.create') }}" class="btn btn-secondary" title="Registrar" ><i data-feather="plus"></i></a>
                    @endif
                    @if(buscar_p('Reportes','PDF')=="Si" || buscar_p('Reportes','Excel')=="Si")
                    <div class="btn-group">                           
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class='uil uil-file-alt mr-1'></i>Descargar
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                  
                    <a href="{{ route('clientes.pdf') }}" class="dropdown-item notify-item">
                        <i data-feather="download" class="icon-dual icon-xs mr-2"></i>
                        <span>PDF</span>
                    </a>
                   
                
                    </div></div>
                    @endif
                    <br></br>


                     <table id="key-datatable" class="table dt-responsive nowrap">
                        <thead style="font-size: 12px;">
                            <tr>
                                <th>Nombre</th>
                                <th>RUT</th>
                                <th>Dirección</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                    
                    
                        <tbody style="font-size: 12px;">
                            @foreach($clientes as $key)
                <tr>
                  <td>{{$key->nombre}}</td>
                  <td>{{$key->tipo_documento}}-{{$key->ruf}}</td>
                  <td>{{$key->direccion}}</td>
                  <td>{{$key->email}}</td>
                  <td>+{{$key->codigo}} {{$key->telefono}}</td>
                  <td>
                  @if(buscar_p('Registros Generales','Modificar')=="Si" || buscar_p('Registros Generales','Eliminar')=="Si")   
                        <button type="button" class="btn btn-info btn-sm" title="Editar"><a href="{{ route('clientes.edit',$key->id) }}"><i data-feather="edit"></i></a></button>
                    
                       <br><br>
                       
                        <button   class="btn btn-danger btn-sm" onclick="alert_eliminar_cli('{{$key->id}}')" title="Eliminar"><i data-feather="trash-2"></i></button>
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
        title : "¿Seguro desea eliminar el Cliente?",
        text : "Si elimina el Cliente, todos los cambios alterados por el regresaran a su estado original",
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

          url: '/clientes/'+id+'/eliminar',
          headers: { id: id},
          method: "GET"

         });

        location.reload();
          }
       });

    }
</script>

