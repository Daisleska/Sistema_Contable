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
                                            <h4 class="box-title">Ayuda</h4>


                                        </center>

                  
                    <a class="btn btn-info" href="{{ URL::asset('uploads/Manual.pdf')}}" class="dropdown-item notify-item">Manual de Usuario
                        <i data-feather="download" >
                        </i>
                    </a>


                    <table id="key-datatable" class="table dt-responsive nowrap">
                                            <thead style="font-size: 12px;">
                                            <tr>

                                                <th><video src="{{ URL::asset('uploads/video.mp4')}}" width="320" controls></video></th>
                                                
                                            </tr>
                                            </thead>
                                            
                                            
                                        </table>
                
                    </div></div></div>
                        
                                
                            

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