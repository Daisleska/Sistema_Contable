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
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <br>
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1">Productos</h4>
                    <p class="sub-header"></p>
                   @if(buscar_p('Registros Generales','Registrar')=="Si")
                   <a href="{{ route('productos.create') }}" class="btn btn-secondary" title="Registrar" ><i data-feather="plus"></i></a>
                   @endif
                     <div class="btn-group">                           
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class='uil uil-file-alt mr-1'></i>Descargar
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                  
                    <a href="{{ route('productos.pdf') }}" class="dropdown-item notify-item">
                        <i data-feather="download" class="icon-dual icon-xs mr-2"></i>
                        <span>PDF</span>
                    </a>
                   
                
                    </div></div>
                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead style="font-size: 12px;">
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <td>Unidad</td>
                                <th>Precio</th>
                                <th>Opciones</th>
                              


                            
                            </tr>
                        </thead>
                    
                    
                        <tbody style="font-size: 12px;">
                            @foreach($productos as $key)
                <tr>
                  <td>{{$key->codigo}}</td>
                  <td>{{$key->nombre}}</td>
                  <td>{{$key->descripcion}}</td>
                  <td>{{$key->unidad }}</td>
                  <td>{{number_format($key->precio,2,',','.')}}</td>
                  
                  <td>
                 @if(buscar_p('Registros Generales','Modificar')=="Si" || buscar_p('Registros Generales','Eliminar')=="Si")
                    <button type="button" class="btn btn-info btn-xs" title="Editar"><a href="{{ route('productos.edit',$key->id) }}"></a><i data-feather="edit"></i></button>

                  
                  
                   <button  class="btn btn-danger btn-xs" onclick="alert_eliminar('{{$key->id}}')" title="Eliminar"><i data-feather="trash-2"></i></button>
                   <br><br>
                 
                   <button onclick="detalles('{{$key->id}}')" type="button" class="btn btn-success btn-xs" title="Ver más" data-toggle="modal" data-target="#centermodal"><i data-feather="zoom-in"></i></button>
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
 <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="header-title mt-0 mb-1"style="margin-left: 2.9cm;"  id="myCenterModalLabel">Información del Producto</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                     <tr>
                                                        <p style="color:black;">Código: {{$key->codigo}} </p>
                                                    </tr>
                                                    <tr>
                                                        <p style="color:black;">Nombre: {{$key->nombre}} </p>
                                                    </tr>
                                                    <tr>
                                                        <p style="color:black;">Descripción: {{$key->descripcion}} </p>
                                                    </tr>

                                                    <tr>
                                                        <p style="color:black;">Existencia: {{$key->existencia}} </p>
                                                    </tr>

                                                    <tr>
                                                        <p style="color:black;">Unidad: {{$key->unidad}} </p>
                                                    </tr>


                                                    <tr>
                                                        <p style="color:black;">Precio: {{number_format($key->precio,2,',','.')}} </p>
                                                    </tr>

                                                    <tr>
                                                        <p style="color:black;">Stock Mínimo: {{$key->stock_min}} </p>
                                                    </tr>

                                                    <tr>
                                                        <p style="color:black;">Stock Máximo: {{$key->stock_max}} </p>
                                                    </tr>

                                                        <div class="modal-footer" style="align-content: center;">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                                
                            </div> 
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->


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
      function alert_eliminar(id){
        console.log(id);
       swal({
        icon : "warning",
        title : "¿Seguro desea eliminar el Producto?",
        text : "Si elimina el Producto, todos los datos del producto se eliminaran",
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

          url: '/productos/'+id+'/eliminar',
          headers: { id: id},
          method: "GET"

         });

        location.reload();
          }
       });
    }
</script>

 <script type="text/javascript">
    //descripcion, monto
  
  function detalles(id, codigo, nombre, descripcion, existencia, unidad, precio, stock_min, stock_max){

  $.ajax({
        url: 'index.blade.php',
        type: 'POST',
        data: {codigo: codigo, nombre: nombre, descripcion: descripcion, existencia: existencia, unidad: unidad, precio: precio, stock_min: stock_min, stock_max: stock_max}
    }).success(function(respuesta){
        // console.log(respuesta);
        $('#tablita').html(respuesta);
    });
   
  $("#id").text(id);
  $("#codigo").text(codigo);
    $("#nombre").text(nombre);
    $("#descripcion").text(descripcion);
    $("#existencia").text(existencia);
    $("#unidad").text(unidad);
    $("#precio").text(precio);
    $("#stock_min").text(stock_min);
    $("#stock_max").text(stock_max);


}

</script>