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
                <li class="breadcrumb-item active" aria-current="page">Balances</li>
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
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1">BALANCES</h4>
                     <table style="color: black;">
                      

            <!--<th style="align-content: right;">

               <div class="btn-group">                           
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class='uil uil-file-alt mr-1'></i>Descargar
            <i class="icon"><span data-feather="chevron-down"></span></i></button>
        <div class="dropdown-menu dropdown-menu-right">
           <a href="#" class="dropdown-item notify-item">
                <i data-feather="book-open" class="icon-dual icon-xs mr-2"></i>
                <span>Excel</span>
            </a>
            <a href="#" class="dropdown-item notify-item">
                <i data-feather="download" class="icon-dual icon-xs mr-2"></i>
                <span>PDF</span>
            </a>
            <a href="javascript:window.print()" class="dropdown-item notify-item">
                <i data-feather="printer" class="icon-dual icon-xs mr-2"></i>
                <span>Imprimir</span>
            </a>
        
            </div></div></th>-->
      
          
            <th>
                @if(buscar_p('Balances','Historial')=="Si")   
                <a href="{{ route('historial_balances') }}"  class="btn btn-info btn-xs remove-item" title="Historial"><i data-feather="clipboard"></i></a></th>
                @endif
            </th>
            <th></th>
          </tr>

</table>
<p>Nota: Los siguientes Estados Financieros son del año actual, si desea ver los estados anteriores, ingrese al historial!</p>
<br>

            <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#comprobacion" data-toggle="tab" aria-expanded="false" class="nav-link active">
                            <span class="d-block d-sm-none"><i class="uil-home-alt"></i></span>
                            <span class="d-none d-sm-block">Comprobación</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a @if($er == 1) href="#no_gan" @endif 
                           @if($er == 2) href="#GyP" @endif 
                          data-toggle="tab" aria-expanded="true" class="nav-link ">
                            <span class="d-block d-sm-none"><i class="uil-user"></i></span>
                            <span class="d-none d-sm-block">Ganancias y Perdidas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a @if($valor == 2) href="#no_fin" @endif 
                           @if($valor == 1) href="#general" @endif 
                         data-toggle="tab" aria-expanded="false" class="nav-link">
                            <span class="d-block d-sm-none"><i class="uil-envelope"></i></span>
                            <span class="d-none d-sm-block">General</span>
                        </a>
                    </li>
             </ul>
                   <div class="tab-content p-3 text-muted">
                    <div class="tab-pane show active" id="comprobacion">
                @include('process.balances.comprobacion')
                    </div>

                    <div class="tab-pane" id="GyP">
                        @include('process.balances.ganancia_perdida')
                    </div>
                    <div class="tab-pane" id="no_gan">
                        @include('process.balances.no_gan')
                    </div>



                    <div class="tab-pane" id="general">
                       @include('process.balances.general')
                    </div>
                     <div class="tab-pane" id="no_fin">
                        @include('process.balances.no_fin')
                    </div>
                </div>




                   

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
<script>
$(document).ready(function(){
    $("select[name=anio]").change(function(){
       var anio= document.getElementById("anio").value;
    
     document.getElementById('buscar').submit();
    });
})

/*    $('#actu').click(function(){
        tabla();
    });*/
</script>
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




