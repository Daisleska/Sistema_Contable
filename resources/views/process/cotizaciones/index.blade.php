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
                <li class="breadcrumb-item"><a href="/">home</a></li>
                <li class="breadcrumb-item active" aria-current="page">cotizaciones</li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0"></h4>
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
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1">Cotizaciones</h4>

                    
                   
                 
                    <a href="{{ route('cotizacion.create') }}" class="btn btn-outline-primary">
                    Registrar</a>

                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <tr>
                                    <th>Fecha</th>
                                    <th>N° Cotización</th>
                                    <th>Cliente</th>
                                    <th>RUT</th>
                                    <th>Correo</th>
                                    <th>Monto</th>
                                    <th>Opciones</th>
                                </tr>
                       

                            
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                     
                @foreach($cotizacion as $key) 
                <tr>
                  <td>{{$key->fecha}}</td>
                  <td>{{$key->n_cotizacion}}</td>
                  <td>{{$key->nombre}}</td>
                  <td>{{$key->tipo_documento}}-{{$key->ruf}}</td>
                  <td>{{$key->email}}</td>
                  <td>{{number_format($key->total,2,',','.')}}</td>
                  <td>
                      
                    

                        <div class="float-right" >
                                            <a href="{{ route('cotizacion.pdf', $key->n_cotizacion) }}" class="btn btn-info btn-sm"
                                                data-toggle="tooltip" 
                                                title="Generar pdf"> <i data-feather="save"></i>
                                            </a>
                        </div>
                       
                  
                   <form action="#" method="POST">
                   {{ csrf_field() }}
                   <input type="hidden" name="_method" value="DELETE">
                   <button class="btn btn-danger btn-sm" title="Eliminar"><i data-feather="trash-2"></i></button>
                   </form>
                   <br>
                 
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
@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
@endsection
