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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1">Productos</h4>
                    <p class="sub-header"></p>
                   
                    <a href="{{ route('productos.create') }}" class="btn btn-outline-primary">
                    Registrar</a>


                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <td>Unidad</td>
                                <th>Precio</th>
                                <th>Opciones</th>
                              


                            
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                            @foreach($productos as $key)
                <tr>
                  <td>{{$key->codigo}}</td>
                  <td>{{$key->nombre}}</td>
                  <td>{{$key->descripcion}}</td>
                  <td>{{ $key->unidad }}</td>
                  <td>{{number_format($key->precio,2,',','.')}}</td>
                  
                  <td>
                       <form action="{{ route('productos.edit',$key->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-info btn-sm" title="Editar"><i data-feather="edit"></i></button>
                        </form>
                        <br>
                  
                   <form action="{{ route('productos.destroy', $key->id) }}" method="POST">
                   {{ csrf_field() }}
                   <input type="hidden" name="_method" value="DELETE">
                   <button class="btn btn-danger btn-sm" title="Eliminar"><i data-feather="trash-2"></i></button>
                   </form>
                   <br>
                 
                   <button onclick="detalles('{{$key->id}}')" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#centermodal"><i data-feather="zoom-in"></i></button>
                  
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
                                                        <h5 class="modal-title" id="myCenterModalLabel">Información del Producto</h5>
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

                                                       
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->


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

    <!-- end row-->
@endsection

@section('script')
<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>
@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
@endsection
