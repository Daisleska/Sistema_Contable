@extends('layouts.app')
@section('css')
<!-- plugin css -->
<link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="row">
        <div class="col-md-7" ></div>
        <div class="col-md-5">
            @include('flash::message')
        </div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
                <div class="card-body">
                    <br>
                     <h4 style="text-align: center;" class="header-title mt-0 mb-1">USUARIOS</h4>
                    <br>
                    <h5 class="card-title">

                        <a href="{{ route('users.create') }}" class="btn btn-secondary" title="Registrar" ><i data-feather="plus"></i></a>
                  

                    {{--     <a href="{{ route('users.create') }}" style="color: white;" class="btn btn-info align-right">Registrar</a></h5> --}}

                    <div class="table-responsive">
                        <table id="key-datatable" class="table dt-responsive nowrap">
                            <thead style="font-size: 12px;">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Tipo</th>
                                    <th>estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 12px;">
                                @foreach($users as $key)
                                <tr>
                                    <td>{{ $key->name }}</td>
                                    <td>{{ $key->email }}</td>
                                    <td>{{ $key->user_type }}</td>
                                        <?php 
                                        if ($key->status=='Activo') {
                                            ?>
                                         <td style="color: green;">{{ $key->status }}</td>

                                            <?php
                                        }elseif ($key->status=='Suspendido') {
                                            ?>
                                        <td style="color: red;">{{ $key->status }}</td>
                                        <?php
                                        }
                                        ?>
                                    
                                   <td>
                                 @if(buscar_p('Usuarios','cambiar tipo usuario')=="Si")
                                        <a title="Cambiar tipo" onclick="cambiar_tipo('{{ $key->id }}')"
                                           class="btn-block waves-effect waves-light"  data-toggle="modal" data-target="#my-event2" title="Cambiar Tipo" ><i data-feather="edit"></i>
                                       </a>
                                       
                                        <a title="Cambiar estado" onclick="cambiar_status('{{ $key->id }}','{{ $key->status }}')" class="btn-block waves-effect waves-light"  data-toggle="modal" data-target="#my-event" title="Cambiar Estado"><i data-feather="book"></i>
                                        </a>
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
	</div>
</div>

<!--INICIO DEL MODAL -->

<div class="modal none-border" id="my-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="header-title mt-0 mb-1" style="margin-left: 1.3cm;">Cambiar Estado del Usuario a <span id="nuevo_status"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            {!! Form::open(['route' => ['users.destroy',1033], 'method' => 'DELETE']) !!}
                @csrf
            <div class="modal-body">
                <strong style="margin-left: 1cm;">¿Está seguro de cambiar el estado de éste usuario?</strong>
                <input type="hidden" name="user_id" id="user_id">
                <input type="hidden" name="status" id="status">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary save-event waves-effect waves-light">Cambiar</button>
                
            </div>
                    </div>
    </div>
</div>
 {!! Form::close() !!}      
<!-- END MODAL -->



<!--INICIO DEL MODAL para cambiar user type -->

<div class="modal none-border" id="my-event2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="header-title mt-0 mb-1" style="margin-left: 3.5cm;">Cambiar Tipo de Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            {!! Form::open(['route' => ['cambiar_tipo'], 'method' => 'PUT']) !!}
                @csrf
            <div class="modal-body">
              
                <input type="hidden" name="user_id" id="user_id2">

                <div class="form-group row">
                            <label for="user_type" class="col-md-4 col-form-label text-md-right">Tipo de usuario</label>

                             <div class="col-md-6">
                             <select name="user_type" class="form-control" >
                                <option value="Administrador">Administrador</option>
                                <option value="Jefe">Jefe</option>
                                <option value="Contador">Contador</option>
                            </select>
                             </div>
                        </div>    
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary save-event waves-effect waves-light">Guardar</button>
                
            </div>
                    </div>
    </div>
</div>
 {!! Form::close() !!}      
<!-- END MODAL -->

@endsection

@section('script')
<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>
@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
@endsection


<script type="text/javascript">

    function cambiar_status(user_id,status) {
        
        if (status=="Activo") {   
      /*    console.log(status); */
            $("#nuevo_status").text('Suspendido');
            $("#status").val('Suspendido');
        }else{
            $("#nuevo_status").text('Activo');
            $("#status").val('Activo');
        }

    
        $("#user_id").val(user_id);
          
    }

 function cambiar_tipo(user_id) {
        $("#user_id2").val(user_id);
          
    }
</script>



@if (isset($x)) 
<script>
    $(function(){
        alerta_exitosa();
    });
  function alerta_exitosa() {
    console.log('holaaaa');
      swal({
            icon : "success",
            title : "Actualización exitosa",
        });
    }
</script>
@endif