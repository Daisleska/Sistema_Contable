@extends('layouts.app')

@section('css')
<!-- plugin css -->
<link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')

<div class="row page-title">
    <div class="col-md-12">
        
    </div>
</div>
@endsection

@section('content')

<div class="row">
<div class="col-md-7"></div>
<div class="col-md-5">
  @include('flash::message')
</div>
</div>
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <br>
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1">Datos del Ente</h4>
                    
                    
                


                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>RIF</th>
                                <th>Correo</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                          <?php if ($empresa==0) { ?>
                             @include('no_registros')

                       <?php   }else{ ?>
                        

              @foreach($empresa as $key)
                <tr>
                  <td>{{$key->nombre}}</td>
                  <td>{{$key->tipo_documento}}-{{$key->rif}}</td>
                  <td>{{$key->email}}</td>
                  <td>{{$key->direccion}}</td>
                  <td>+{{$key->codigo}} {{$key->telefono}}</td>
                  
                   <td>
                       <form action="{{ route('empresa.edit',$key->id) }}" method="GET">
                       {{ csrf_field() }}
                        <input type="hidden" name="_method" value="EDITAR">
                        <button class="btn btn-info btn-sm" title="Editar"><i data-feather="edit"></i></button>
                        </form>
                   <br>
                   <button onclick="detalles('{{$key->id}}')" type="button" class="btn btn-success btn-sm" data-toggle="modal" title="Ver más" data-target="#centermodal"><i data-feather="zoom-in"></i></button>
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

     <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 style="margin-left: 3cm;" class="header-title mt-0 mb-1" id="myCenterModalLabel">Información de la Empresa</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                    

                                                    <tr>
                                                        <p style="color:black;">Nombre: {{$key->nombre}} </p>
                                                    </tr>
                                                    <tr>
                                                        <p style="color:black;">RUT: {{$key->tipo_documento}}-{{$key->rif}} </p>
                                                    </tr>
                                                    <tr>
                                                        <p style="color:black;">Correo: {{$key->email}} </p>
                                                    </tr>
                                                    <tr>
                                                        <p style="color:black;">Dirección: {{$key->direccion}}</p>
                                                    </tr>
                                                     <tr>
                                                        <p style="color:black;">Teléfono:+{{$key->codigo}} {{$key->telefono}} </p>
                                                    </tr>

                                                    <tr>
                                                        <p style="color:black;">Decreto Maxima Autoridad: {{$key->decreto_max_auto}}</p>
                                                    </tr>

                                                    <tr>
                                                        <p style="color:black;">Slogan: {{$key->slogan}}</p>
                                                    </tr>
                                                    <tr>
                                                        <p style="color:black;">Nombre de la Imagen: {{$key->image_name}} </p>
                                                    </tr>
                                                    <tr>
                                                     
                                                       <img src="{{ asset($key->url_image) }}" width="50%" height="50%">
                                                    </tr>
                                                    <tr>
                                                        <p style="color:black;">Pie de Página: {{$key->page_foot}} </p>
                                                    </tr>
                                                    
                                                  
                                                   <div class="modal-footer" style="align-content: center;">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                                
                            </div>
                                                       
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        <?php }?>


 <script type="text/javascript">
    //descripcion, monto
  
  function detalles(id,nombre, tipo_documento, ruf, correo, direccion, telefono, decreto_max_auto, slogan, image_name, page_foot){

  $.ajax({
        url: 'index.blade.php',
        type: 'POST',
        data: {nombre: nombre, tipo_documento: tipo_documento, ruf: ruf, correo: correo, direccion: direccion, telefono: telefono, decreto_max_auto: decreto_max_auto, slogan: slogan, image_name: image_name, page_foot: page_foot}
    }).success(function(respuesta){
        // console.log(respuesta);
        $('#tablita').html(respuesta);
    });
   
  $("#id").text(id);
  $("#nombre").text(nombre);
  $("#tipo_documento").text(tipo_documento);
  $("#ruf").text(ruf);
  $("#correo").text(correo);
  $("#direccion").text(direccion);
   $("#decreto_max_auto").text(decreto_max_auto);
    $("#slogan").text(slogan);
    $("#image_name").text(image_name);
    $("#page_foot").text(page_foot);
   


}

    
  

</script>
@endsection

@section('script')
<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>
@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
@endsection
