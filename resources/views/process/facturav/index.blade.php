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
<div class="col-md-7"></div>
<div class="col-md-5">
  @include('flash::message')
</div>
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1">Facturas de Ventas</h4>
                   
                 
                    <a href="{{ route('facturav.create') }}" class="btn btn-outline-primary">
                    Registrar</a>

                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>N° Factura</th>
                                <th>Cliente</th>
                                <th>Total</th>
                                <th>Opciones</th>
                       

                            
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                     @foreach($facturav as $key) 

                <tr>
                  <td>{{$key->fecha}}</td>
                  <td>{{$key->n_factura}}</td>
                  <td>{{$key->nombre}}</td>
                  <td>{{number_format($key->total,2,',','.')}}</td>
                  <td>
                      
                    

                        <div class="float-right" >
                                            <a href="{{ route('facturav.pdf', $key->id_factura) }}" class="btn btn-primary mt-2"
                                                data-toggle="tooltip" 
                                                title="Generar pdf"> <i data-feather="save"></i>
                                            </a>
                        </div>
                       
                  
                   <form action="{{ route('facturav.destroy', $key->id) }}" method="POST">
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
