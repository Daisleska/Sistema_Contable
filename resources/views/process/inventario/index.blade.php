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
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1">Libro Inventario</h4>
                    <br>

                <div class="row">
                    <div class="col-md-4">
                    <a href="{{ route('inventario.create') }}" class="btn btn-outline-primary">
                    Registrar</a>
                    </div>
                    <div class="col-md-8">
                         <p style="text-align: right; color: blue;">Valor Total Del Inventario <input type="text" name="" value="180.000" disabled="disabled"></p>
                    </div>
                </div>    


                     <table id="key-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Código</th>
                                <th>Existencia</th>
                                <th>Unidad</th>
                                <th>Costo</th>
                                <th>Costo total</th>
                            </tr>
                        </thead>
                
                        <tbody>
                       
                          <tr>
                             <td>cauchos</td>
                             <td>23123</td>
                             <td>8</td>
                             <td>lotes</td>
                             <td>80.000</td>
                             <td>100.000</td>
                         </tr>
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
