@extends('layouts.app')

@section('css')
{{-- <link rel="stylesheet" href="{{ mix('/css/app.css')}}"> --}}

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
        <div class="col-md-7" ></div>
        <div class="col-md-5">
            @include('flash::message')
        </div>
</div>
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1">Facturas de Compras</h4>
                   
                          <div class="float-right" >
                                            <a href="{{ route('facturac.pdf') }}" class="btn btn-primary mt-2"
                                                data-toggle="tooltip" 
                                                title="Generar pdf"> <i class="feather icon-file-text"
                                                    style="font-size: 20px"></i> Generar PDF</a>
                                        </div>

                    
                  
                    <a href="{{ route('facturac.create') }}" class="btn btn-outline-primary">
                    Registrar</a>

                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>N° Factura</th>
                                <th>Proveedor</th>
                                <th>Total</th>
                                <th>Opciones</th>
                       

                            
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                           @foreach($facturac as $key)
                <tr>
                  <td>{{$key->fecha}}</td>
                  <td>{{$key->n_factura}}</td>
                  <td>{{$key->nombre}}</td>
                  <td>{{$key->total}}</td>
                  <td></td>
             
                  
                  

                
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
{{-- <script type="text/javascript">
    mix.js('resources/js/app.js', 'public/js').version();
</script> --}}
<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>

@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
@endsection