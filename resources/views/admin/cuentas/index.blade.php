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
                <li class="breadcrumb-item"><a href="/"></a></li>
                <li class="breadcrumb-item"><a href=""></a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
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
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1">Cuentas</h4>
                    <p class="sub-header"></p>
                   
                     <a href="{{ route('cuentas.create') }}" class="btn btn-secondary" title="Registrar" ><i data-feather="plus"></i></a>


                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead style="font-size: 12px;">
                            <tr>
                                
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Tipo</th>
                                <th>saldo</th>
                                <th>Opciones</th>
                              


                            
                            </tr>
                        </thead>
                    
                    
                        <tbody style="font-size: 12px;">
                            @foreach($cuentas as $key)
                <tr>
                  
                  <td>{{$key->codigo}}</td>
                  <td>{{$key->nombre}}</td>
                  <td>{{$key->descripcion}}</td>
                  <td>{{$key->tipo}}</td>
                  <td>{{number_format($key->saldo,2,',','.')}}</td>
                  
                  <td>
                       <form action="{{ route('cuentas.edit',$key->id) }}" method="GET">
                        <input type="hidden" name="_method" value="EDITAR">
                        <button class="btn btn-info btn-sm" title="Editar"><i data-feather="edit"></i></button>
                        </form>
                        &nbsp;&nbsp;
                  
                   <form id="f_eliminar" name="formulario" action="{{ route('cuentas.destroy', $key->id) }}" method="POST">
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

<script type="text/javascript">
      function alert_eliminar(){
       swal({
        icon : "warning",
        title : "¿Seguro desea eliminar esta cuenta?",
        text : "Si elimina esta cuenta , todos los datos relacionados con ella seran eliminados",
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

        document.getElementById('f_eliminar').submit();
          }
       });

    }
</script>

@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>

@endsection
