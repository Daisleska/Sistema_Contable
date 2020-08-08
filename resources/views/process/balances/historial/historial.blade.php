
@extends('layouts.app')

@section('css')
<!-- plugin css -->

<link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('Shreyu/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('Shreyu/assets/libs/multiselect/multi-select.css') }}" rel="stylesheet" type="text/css" />

<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumb')

<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Balances</li>
                <li class="breadcrumb-item active" aria-current="page">Historial</li>
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
                    <h3 style="text-align: center; color: black;">HISTORIAL DE BALANCES</h3>
<br>

<a href="{{ route('balances.index') }}"  class="btn btn-info btn-xs remove-item" title="Volver"><i data-feather="corner-up-left"></i></a></th>

                    <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#comprobacion" data-toggle="tab" aria-expanded="false" class="nav-link active">
                            <span class="d-block d-sm-none"><i class="uil-home-alt"></i></span>
                            <span class="d-none d-sm-block">Comprobación</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  href="#GyP"
                          data-toggle="tab" aria-expanded="true" class="nav-link ">
                            <span class="d-block d-sm-none"><i class="uil-user"></i></span>
                            <span class="d-none d-sm-block">Ganancias y Perdidas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#general" data-toggle="tab" aria-expanded="false" class="nav-link">
                            <span class="d-block d-sm-none"><i class="uil-envelope"></i></span>
                            <span class="d-none d-sm-block">General</span>
                        </a>
                    </li>
                </ul>
                   <div class="tab-content p-3 text-muted">
                    <div class="tab-pane show active" id="comprobacion">
                    @include('process.balances.historial.comprobacion_h')
                    </div>

                    <div class="tab-pane" id="GyP">
                    @include('process.balances.historial.ganancias_perdidas_h')
                    </div>

                    <div class="tab-pane" id="general">
                     @include('process.balances.historial.general_h')
                    </div>
                </div>




                   

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
<script src="{{ URL::asset('Shreyu/assets/js/pages/form-validation.init.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/parsleyjs/parsley.min.js') }}"></script>
@endsection




