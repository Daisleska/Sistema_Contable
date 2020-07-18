@extends('layouts.app')

@section('css')
<!-- plugin css -->
<link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('Shreyu/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('Shreyu/assets/libs/multiselect/multi-select.css') }}" rel="stylesheet" type="text/css" />
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
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1"></h4>
                    <h3 style="text-align: center;">Historial Libro Diario</h3>
                    <br>
                    <a href="{{ route('diario.index') }}"  class="btn btn-info btn-xs remove-item" title="Volver"><i data-feather="corner-up-left"></i></a></th>
                    <table id="key-datatable" class="table dt-responsive nowrap">
                      <thead>
                        <th>N° Folio</th>
                        <th>Año</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                      </thead>
                      <tbody>
                          @foreach($historial as $valor)
                        <tr>
                          <td>{{$valor->n_folio}}</td>
                          <td>{{$valor->anio}}</td>
                          @if($valor->estado=='Abierto')
                          <td style="color: green;">{{$valor->estado}}</td>
                          @elseif($valor->estado=='Cerrado')
                          <td style="color: red;">{{$valor->estado}}</td>
                          @endif
                          <td><a href="{{ route('diario.individual', $valor->n_folio) }}" class="btn btn-info btn-xs remove-item"><i data-feather="download"></i></a></td>
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
<script src="{{ URL::asset('Shreyu/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/multiselect/jquery.multi-select.js') }}"></script>
@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/js/pages/form-advanced.init.js') }}"></script>
@endsection


