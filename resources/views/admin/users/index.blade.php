@extends('layouts.app')

@section('sub-title')
<title>Blatt | Usuarios</title>
@endsection

@section('css')

<link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Usuarios</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('users.create') }}" style="color: white;" class="btn btn-info align-right">Registrar</a></h5>

                    <div class="table-responsive">
                        <table id="basic-datatable" class="table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Tipo</th>
                                    <th>Empresa</th>
                                    <th>estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key)
                                <tr>
                                    <td>{{ $key->name }}</td>
                                    <td>{{ $key->email }}</td>
                                    <td>{{ $key->user_type }}</td>
                                    <td>{{ $key->Empresa }}</td>
                                    <td>{{ $key->status }}</td>
                                    <td>
                                        
                                        <a href="{{ route('users.edit',$key->id) }}"><i class="mdi mdi-pencil"></i>edit</a>
                                       

                                       
                                        <a onclick="cambiar_status('{{ $key->id }}','{{ $key->status }}')" class="btn-block waves-effect waves-light"  data-toggle="modal" data-target="#my-event" title="Cambiar Status"><i class="mdi mdi-bell"></i>
                                        cambiar</a>
                                      
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Tipo</th>
                                    <th>Empresa</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>

<!--INICIO DEL MODAL -->

<div class="modal none-border" id="my-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Cambiar Estado del Usuario a <span id="nuevo_status"></span> </strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            {!! Form::open(['route' => ['users.destroy',1033], 'method' => 'DELETE']) !!}
                @csrf
            <div class="modal-body">
                <strong>Está seguro de Cambiar el Estado de éste usuario?</strong>
                <input type="hidden" name="user_id" id="user_id">
                <input type="hidden" name="status" id="status">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success save-event waves-effect waves-light">Cambiar Estado</button>
                
            </div>
            {!! Form::close() !!}               </div>
    </div>
</div>
<!-- END MODAL -->

@endsection

@section('scripts')
<script src="{{ URL::asset('js/feather.min.js')}}"></script>
<script src="{{ URL::asset('js/jquery/dist/jquery.js')}}"></script>

<script type="text/javascript">

    function cambiar_status(user_id,status) {
        
        if (status=="Activo") {
            console.log(status);
            $("#nuevo_status").text('Suspendido');
            $("#status").val('Suspendido');
        }else{
            $("#nuevo_status").text('Activo');
            $("#status").val('Activo');
        }
        $("#user_id").val(user_id);
    }
</script>
<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}">
</script>
  
{{-- 
      $('#zero_config').DataTable();
 --}}
</script>
 
@endsection


@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
@endsection