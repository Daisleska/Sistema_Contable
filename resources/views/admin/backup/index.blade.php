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
                                    {{-- <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                                        </li>
                                       
                                        
                                    </ul> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->

                    <!-- Page body start -->
                    <div class="page-body">
                        <div class="row">


                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right">
                                            <a href="{{ route('backup.create') }}" class="btn btn-primary">Generar respaldo</a>
                                        </div>
                                        <center>
                                            <h4 class="box-title">BASE DATOS</h4>


                                        </center>
                                    </div>
                                   
                                    <div class="card-body">
                                    <table class="table text-center table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Archivo</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($backups as $backup)
                        <tr>
                            <td>{{ substr($backup,15) }}</td>
                            <td class="text-right">

                                <a class="btn btn-sm btn-info" href="{{ route('backup.download', substr($backup,15)) }}">
                                    Descargar
                                </a>


                                <a class="btn btn-sm btn-primary" href="{{ route('backup.restore', substr($backup,15)) }}">
                                    Restaurar
                                </a>



                                <a class="btn btn-sm btn-danger" data-button-type="delete" href="{{ route('backup.delete' , substr($backup,15)) }}">
                                    Borrar
                                </a>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">No hay respaldos realizados</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>


                                    </div>
                                </div>
                            </div><!-- /# column -->
                        </div>
                        <!--  /Traffic -->
                    </div>
                </div>
                <!-- Page body end -->
            </div>
        </div>
        <!-- Main-body end -->


    </div>
</div>



</div>
</div>
</div>
</div>
</div>



</body>

</html>


@endsection
@section('script')

<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>
@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
@endsection