@extends('layouts.app')

@section('css')
<!-- plugin css -->
{{-- <link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" /> --}}
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
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1"></h4>
                    <table style="color: black;">
                      <?php
                      use App\empresa;

  $empresa=DB::table ('empresa')->select('nombre', 'tipo_documento','ruf')->get();

                       
                      foreach($empresa as $key){
                        ?>
                        <tr >
                            <th>NOMBRE DE LA EMPRESA:</th>
                            <th ><?php echo e($key->nombre)?></th>
                        </tr>
                        <tr>
                            <th>MES:
                            <script style="text-align: right;" type="text/javascript">document.write("" + months[month] + " " + year);</script></th>
                        </tr>
                        <tr>
                            <th>RUT:
                            <?php echo e($key->tipo_documento)?>-<?php echo e($key->ruf)?></th>
                         <?php
                        }
                        ?>

                        </tr>
                    </table>
                  
  <div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h5 class="header-title mb-3 mt-0" style="text-align: center;">Compra y Venta</h5>

                <div class="row">
                    <div class="col-md-3">
                      <input type="date" id="dia" name="dia" class="form-control">
                    </div>

                    <div class="col-md-2">
                      <select id="mes" name="mes" class="form-control">
                        <option readonly >Mes</option>
                      @foreach($meses as $mes)
                          <option value="{{$x++}}">
                            {{$mes}}
                           </option> 
                           @endforeach
                      </select>
                    </div>

                    <div class="col-md-2">
                      <select id="anio" name="anio" class="form-control">
                        <option disabled="disabled" selected="selected">Año</option>
                        <?php for ($i=2018; $i <=2030; $i++) { ?>
                          <option value="{{$i}}">
                            {{$i}}
                           </option> 
                           <?php } ?>
                      </select>
                    </div>
                    <button class="btn btn-primary" onclick="buscador();">Buscar</button>
                </div>
                <br>

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

              
                <div class="tab-content p-3 text-muted">
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
{{-- <script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script> --}}
@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
@endsection

<script type="text/javascript">

function makeArray() {
for (i = 0; i<makeArray.arguments.length; i++)
this[i + 1] = makeArray.arguments[i];}
var months = new makeArray('Enero','Febrero','Marzo','Abril','Mayo',
'Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
var date = new Date();
var day = date.getDate();
var month = date.getMonth() + 1;
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;

//]]>

</script>