@extends('layouts.app')

@section('css')
<!-- plugin css -->
<link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-container navbar-wrapper">
    </div>

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-header start -->
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-12">
                                <div class="page-header-breadcrumb">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->

                    <!-- Page body start -->
                    <div class="page-body">
                       <!-- Zero config.table start -->
                            <div class="card">
                            <div class="card-body">
                                 
                                        
                                        <center>
                                            <h4 class="box-title">Bitácora</h4>


                                        </center>

                  <div class="row">
                    <div class="col-md-4">
                       <div class="btn-group">                           
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class='uil uil-file-alt mr-1'></i>Descargar
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                   <a href="{{ route('bitacora_view') }}" class="dropdown-item notify-item">
                        <i data-feather="book-open" class="icon-dual icon-xs mr-2"></i>
                        <span>Excel</span>
                    </a>
                    <a href="{{ route('bitacora.pdf') }}" class="dropdown-item notify-item">
                        <i data-feather="download" class="icon-dual icon-xs mr-2"></i>
                        <span>PDF</span>
                    </a>
                    <a href="javascript:window.print()" class="dropdown-item notify-item">
                        <i data-feather="printer" class="icon-dual icon-xs mr-2"></i>
                        <span>Imprimir</span>
                    </a>
                
                    </div></div></div></div>
                        
                                <div class="card-block ">
                                    <div class="dt-responsive table-responsive" >
                                        <table id="key-datatable" class="table dt-responsive nowrap">
                                            <thead style="font-size: 12px;">
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Tipo Usuario</th>
                                                <th>Acción</th>
                                                <th>Fecha y hora</th>
                                               
                                            </tr>
                                            </thead>
                                            <tbody style="font-size: 12px;">
                                             @foreach($bitacora as $item)
                                                <tr>
                                                
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $item->user }}</td>
                                                    <td>{{ $item->role }}</td>
                                                    <td>{{ $item->action }}</td>
                                                 
                                                    <td>{{ date('d-M-Y \a\ \l\a\s H:i:s:A' , strtotime($item->created_at)) }}</td>



                                                
                                                    
                                                </tr>
                                               @endforeach
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
</div>
</div>
</div>
</div>
</div>
</div>


@endsection

@section('script')

<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>
@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
@endsection