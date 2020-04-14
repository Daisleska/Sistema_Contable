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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1">Datos de la empresa</h4>
                   
                       
                    
                    
                    <a href="{{ route('empresa.create') }}" class="btn btn-outline-primary">
                   Registrar</a>


                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Nombre de la Empresa</th>
                                <th>RUF</th>
                                <th>Correo</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Opciones</th>

                            
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                            @foreach($empresa as $key)
                <tr>
                  <td>{{$key->nombre}}</td>
                  <td>{{$key->tipo_documento}}-{{$key->ruf}}</td>
                  <td>{{$key->email}}</td>
                  <td>{{$key->direccion}}</td>
                  <td>+{{$key->codigo}} {{$key->telefono}}</td>
                  
                   <td>
                       <form action="{{ route('empresa.edit',$key->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-info btn-sm" title="Editar"><i data-feather="edit"></i></button>
                        </form>
                   <br>
                   <form action="{{ route('empresa.destroy', $key->id) }}" method="POST">
                   {{ csrf_field() }}
                   <input type="hidden" name="_method" value="DELETE">
                   <button class="btn btn-danger btn-sm" title="Eliminar"><i data-feather="trash-2"></i></button>
                   </form>
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
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>
@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
@endsection
