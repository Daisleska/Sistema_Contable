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
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1">Proveedores</h4>
                    
                    <a href="{{ route('proveedores.create') }}" class="btn btn-outline-primary">
                    Registrar</a>
                    <br></br>


                     <table id="key-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                    <th>Nombre de la Empresa</th>
                                <th>RUF</th>
                                <th>Representante</th>
                                <th>Direccion</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                    @foreach($proveedores as $key)
                <tr>
                  <td>{{$key->nombre}}</td>
                  <td>{{$key->tipo_documento}}-{{$key->ruf}}</td>
                  <td>{{$key->representante}}</td>
                  <td>{{$key->direccion}}</td>
                  <td>{{$key->correo}}</td>
                  <td>{{$key->telefono}}</td>
                  <td>
                        <form action="{{ route('proveedores.edit',$key->id) }}" method="GET">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="EDITAR">
                        <button class="btn btn-info btn-sm" title="Editar"><i data-feather="edit"></i></button>
                        </form>
                       <br>
                        
                        <form name="formulario" action="{{ route('proveedores.destroy', $key->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        </form>
                        <button  class="btn btn-danger btn-sm" onclick="alert_eliminar()" title="Eliminar"><i data-feather="trash-2"></i></button>
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
      function alert_eliminar(){
       swal({
        icon : "warning",
        title : "¿Seguro desea eliminar el Proveedor?",
        text : "Si elimina el Proveedor, todos los cambios alterados por ella regresaran a su estado original",
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

       document.formulario.submit();
          }
       });

    }
</script>
