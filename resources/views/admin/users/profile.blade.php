@if (Auth::guest())
@else

@extends('layouts.app')


@section('content')
<div class="page-breadcrumb">
    <div class="row " align="center">
        <div class="card col-md-12">
        <div class="col-12 d-flex no-block align-items-center">
         
         @if(\Auth::User()->user_type=="Administrador")
           <a class="btn btn-info" href="{{ route('users.index') }}"> Lista de usuarios</a>
         @endif  
         <div class="ml-auto text-right">
            <h4 style="text-align: center;" class="header-title mt-0 mb-1">Mi Cuenta</h4>
        </div>  

            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="margin-top: 0.5cm;">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Perfil</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
 </div>
</div>

<div class="row">
        <div class="col-md-12">
            @include('flash::message')
        </div>
</div>
{{-- content --}}

     <div class="row">
        <div class="col-lg-3">
         <div class="card">
             <div class="card-body">
                 <div class="text-center mt-3">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      <img width="20px" height="20px" src="{{ asset('uploads/avatars/'.$user->avatar) }}" class="avatar-lg rounded-circle" />
                    </a>
                    <div><br>
                     <button class="btn btn-info" data-toggle="modal"
                    data-target="#myModal2">Cambiar Foto</button>
        </div>
                        <h5 class="mt-2 mb-0">{{ Auth::user()->name }}</h5>
                        <h6 class="text-muted font-weight-normal mt-2 mb-0">{{ Auth::user()->user_type }}
                        </h6>
                        <h6 class="text-muted font-weight-normal mt-1 mb-4">Empresa: {{ Auth::user()->Empresa}}.cl</h6>

                        <div class="progress mb-4" style="height: 14px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%;"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                            <span class="font-size-12 font-weight-bold">Tu perfil esta <span class="font-size-11">20%</span> completo</span>
                            </div>
                    </div>
                </div>


                  <!-- profile  -->
                <div class="mt-3 pt-2 border-top">
                    <h4 class="mb-3 font-size-15" style="text-align: center;">Información de Contacto</h4>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0 text-muted">
                            <tbody>
                                <tr>
                                 <th scope="row">Email</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tel.</th>
                                <td>(424) 459 0130</td>
                            </tr>
                            <br>
                        </tbody>
                    </table>
                </div>
            </div>
                                
        </div>
    </div>
    <!-- end card -->
</div>

                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-pills navtab-bg nav-justified" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-activity-tab" data-toggle="pill"
                                                href="#pills-activity" role="tab" aria-controls="pills-activity"
                                                aria-selected="true">
                                                Mis Datos
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-messages-tab" data-toggle="pill"
                                                href="#pills-messages" role="tab" aria-controls="pills-messages"
                                                aria-selected="false">
                                                Mensajes
                                            </a>
                                        </li>
                                       {{--  <li class="nav-item">
                                            <a class="nav-link" id="pills-projects-tab" data-toggle="pill"
                                                href="#pills-projects" role="tab" aria-controls="pills-projects"
                                                aria-selected="false">
                                                Projects
                                            </a>
                                        </li> --}}
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" id="pills-tasks-tab" data-toggle="pill"
                                                href="#pills-tasks" role="tab" aria-controls="pills-tasks"
                                                aria-selected="false">
                                                Tareas
                                            </a>
                                        </li> --}}
                                         <li class="nav-item">
                                            <a class="nav-link" id="pills-files-tab" data-toggle="pill" href="#pills-files" role="tab" aria-controls="pills-files" aria-selected="false">
                                             Archivos
                                            </a>
                                        </li>
                                    </ul>


<div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-activity" role="tabpanel"
                        aria-labelledby="pills-activity-tab">
            <div class="card">
                <div class="card-body">
                  
                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label text-md-right"><b>Nombre:</b></label>
                        <label for="name" class="col-md-6 col-form-label text-md-right">{{ $user->name }}</label>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label text-md-right"><b>Correo: </b></label>
                        <label for="email" class="col-md-6 col-form-label text-md-right">{{ $user->email }} </label>
                    </div>
                    
                    <div class="form-group row">
                        <label for="log_enterprise" class="col-md-3 col-form-label text-md-right"><b>Nombre de la Empresa:</b></label>
                        <label for="log_enterprise" class="col-md-6 col-form-label text-md-right">{{ $user->Empresa }} </label>
                    </div>
                    <div class="form-group row">
                        <label for="log_enterprise" class="col-md-3 col-form-label text-md-right"><b>Estado:</b></label>
                        <label for="log_enterprise" class="col-md-6 col-form-label text-md-right">{{ $user->status }} </label>
                    </div>
                    <div class="form-group row">
                        <label for="log_enterprise" class="col-md-3 col-form-label text-md-right"><b>Tipo de Usuario:</b></label>
                        <label for="log_enterprise" class="col-md-6 col-form-label text-md-right">{{ $user->user_type }} </label>
                    </div>

                    <div class="form-group row">
                        <label for="log_enterprise" class="col-md-3 col-form-label text-md-right"><b>Contraseña:</b></label>

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button  type="button" class="btn btn-info" data-toggle="modal"
                    data-target="#myModal">Cambiar Contraseña</button> 
                    </div>    
                           
               </div>
        </div>
    </div>

    <!--Chat-->
    <div class="tab-pane" id="pills-messages" role="tabpanel" aria-labelledby="pills-messages-tab">
      <h5 class="mt-3">Chat</h5>
       <div class="col-xl-12">
        <div class="card">
            <div class="card-body pt-2">
                <div class="dropdown mt-2 float-right">
                    <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="uil uil-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item"><i
                                class="uil uil-refresh mr-2"></i>Refrescar</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item"><i class="uil uil-user-plus mr-2"></i>Añadir Miembro</a>
                        <div class="dropdown-divider"></div>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item text-danger"><i
                                class="uil uil-exit mr-2"></i>Salir</a>
                    </div>
                </div>
                <h6 class="header-title mb-4">Chat Grupal</h6>
                <div class="chat-conversation">
                    <ul class="conversation-list slimscroll" style="max-height: 268px;">
                        <?php $i=0; ?>
                         @foreach($chat as $key)
                        @if ($key->usuario!=Auth::user()->id)
                        <li class="clearfix">
                            <div class="chat-avatar">
                                <img src="{{ asset('uploads/avatars/'.$use[$i][1]) }}" alt="Female">
                                <i>{{$key->hora}}
                                  </i>
                            </div>
                            <div class="conversation-text" >
                                <div class="ctext-wrap">

                                
                                    <i>{{$use[$i][0]}}</i>   
                                    <p>
                                        {{$key->mensaje}}
                                    </p>
                                </div>
                            </div>
                        </li>

                       
                        
                        @else

                         
                        <li class="clearfix odd">
                            <div class="chat-avatar">
                                <img src="{{ asset('uploads/avatars/'.$use[$i][1]) }}" alt="Male">
                                <i>{{$key->hora}}</i>
                            </div>
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>{{$use[$i][0]}}</i>
                                    <p>
                                       {{$key->mensaje}}
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endif
                     <?php $i++; ?>
                         @endforeach  

                    <li class="clearfix odd" id="chat">
                              
                    </li>  
                    </ul>
                 
                    
                    <form class="needs-validation" novalidate name="chat-form" id="chat-form">
                        <div class="row">
                            <div class="col">

                                <input type="text" id="mensaje" class="form-control chat-input" placeholder="Ingrese el texto"
                                    required name="mensaje">
 
                                

                                <div class="invalid-feedback">
                                    ¡Por favor ingrese su mensaje!                         
                               </div>
                            </div>
                            <div class="col-auto">
                                <button id="boton" class="btn btn-primary" >Enviar</button>
                            </div>
                        </div>
                    </form>

                </div> <!-- end .chat-conversation-->
            </div>
        </div>
    </div>

    </div>


     <div class="tab-pane fade" id="pills-files" role="tabpanel" aria-labelledby="pills-files-tab">
                        <h5 class="mt-3">Archivos</h5>

                        <div class="card mb-2 shadow-none border">
                            <div class="p-1 px-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <img src="{{ asset('Shreyu/assets/images/projects/project-1.jpg')}}" class="avatar-sm rounded"
                                            alt="file-image">
                                    </div>
                                    <div class="col pl-0">
                                        <a href="javascript:void(0);"
                                            class="text-muted font-weight-bold">sales-assets.zip</a>
                                        <p class="mb-0">2.3 MB</p>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Button -->
                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom"
                                            title="Descargar" class="btn btn-link text-muted btn-lg p-0">
                                            <i class='uil uil-cloud-download font-size-14'></i>
                                        </a>
                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom"
                                            title="Eliminar" class="btn btn-link text-danger btn-lg p-0">
                                            <i class='uil uil-multiply font-size-14'></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2 shadow-none border">
                            <div class="p-1 px-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <img src="{{ asset('Shreyu/assets/images/projects/project-2.jpg')}}" class="avatar-sm rounded"
                                            alt="file-image">
                                    </div>
                                    <div class="col pl-0">
                                        <a href="javascript:void(0);"
                                            class="text-muted font-weight-bold">new-contarcts.docx</a>
                                        <p class="mb-0">1.25 MB</p>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Button -->
                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom"
                                            title="Download" class="btn btn-link text-muted btn-lg p-0">
                                            <i class='uil uil-cloud-download font-size-14'></i>
                                        </a>
                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom"
                                            title="Delete" class="btn btn-link text-danger btn-lg p-0">
                                            <i class='uil uil-multiply font-size-14'></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- end attachments -->
                 </div>
                </div>

            </div>
        </div>
    </div>

 @include('admin.users.modal_cambiarClave')


@endsection


@section('script')
<!-- optional plugins -->
<script src="{{ URL::asset('assets/libs/moment/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>

<!-- De aquí  -->
<script src="{{ URL::asset('js/jquery/dist/jquery.min.js') }}"></script>

<script type="text/javascript">

        $("#boton").on('click',function () {
        var mensaje= $("#mensaje").val();
         $.ajax ({
          url: '/chat/'+mensaje,
          headers: { mensaje: mensaje},
          method: "GET" 
        });

        $('#mensaje').val('');

          $("#chat").append('<div class="chat-avatar"><i></i></div><div class="conversation-text" ><div class="ctext-wrap"><i>'+mensaje+'</i><p></p></div></div><br>');       
          //$('#chat').html(dato);
        });       
   
</script>
@endsection

@section('script-bottom')
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/widgets.init.js') }}"></script>
@endsection

@endif

