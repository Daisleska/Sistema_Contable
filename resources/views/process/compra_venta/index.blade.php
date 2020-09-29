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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body" style="padding-right: 50px;">
                  
  <div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-1 mt-0" style="text-align: center;">Compra y Venta</h4> 

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#compras" data-toggle="tab" aria-expanded="false" class="nav-link active">
                            <span class="d-block d-sm-none"><i class="uil-home-alt"></i></span>
                            <span class="d-none d-sm-block">Compras</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#ventas" data-toggle="tab" aria-expanded="true" class="nav-link ">
                            <span class="d-block d-sm-none"><i class="uil-user"></i></span>
                            <span class="d-none d-sm-block">Ventas</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="#messages" data-toggle="tab" aria-expanded="false" class="nav-link">
                            <span class="d-block d-sm-none"><i class="uil-envelope"></i></span>
                            <span class="d-none d-sm-block">Messages</span>
                        </a>
                    </li> --}}
                </ul>

              
                <div class="tab-content text-muted">
                    <div class="tab-pane show active" id="compras">
                @include('process.compra_venta.partials.libro_compra')
                    </div>

                    <div class="tab-pane " id="ventas">
                        @include('process.compra_venta.partials.libro_venta')
                    </div>
                   {{--  <div class="tab-pane" id="messages">
                        <p>Vakal text here dolor sit amet, consectetuer adipiscing elit. Aenean
                          </p>
                        
                    </div> --}}
                </div>
            </div>
        </div>
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
@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
@endsection
