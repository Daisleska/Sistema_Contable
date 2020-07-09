@if (Auth::guest())
@else

@extends('layouts.vertical')


@section('css')

<link href="{{ URL::asset('Shreyu/assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<div class="row page-title align-items-center">
    <div class="col-sm-4 col-xl-6">
        <h4 class="mb-1 mt-0">Panel de Control</h4>
    </div>
    <div class="col-sm-8 col-xl-6">
        <form class="form-inline float-sm-right mt-3 mt-sm-0">
            <div class="form-group mb-sm-0 mr-2">
                <input type="text" class="form-control" id="dash-daterange" style="min-width: 190px;" />
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class='uil uil-file-alt mr-1'></i>Download
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item notify-item">
                        <i data-feather="mail" class="icon-dual icon-xs mr-2"></i>
                        <span>Email</span>
                    </a>
                    <a href="#" class="dropdown-item notify-item">
                        <i data-feather="printer" class="icon-dual icon-xs mr-2"></i>
                        <span>Print</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item notify-item">
                        <i data-feather="file" class="icon-dual icon-xs mr-2"></i>
                        <span>Re-Generate</span>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('content')
   <?php 
    $user_type=\Auth::User()->user_type; 
    ?> 
 {{-- <style type="text/css">
    .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url("../../../public/images/progress.git") 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
</style>
    
    <div class="loader"></div> --}}
   
@endsection

@section('script')
<!-- optional plugins -->
<script type="text/javascript">
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>

<script src="{{ URL::asset('Shreyu/assets/libs/moment/moment.min.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/flatpickr/flatpickr.min.js') }}"></script>

<script src="{{ URL::asset('js/jquery/dist/jquery.min.js')}}"></script>

@endsection

@section('script-bottom')
<!-- init js -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/dashboard.init.js') }}"></script>
@endsection

@endif