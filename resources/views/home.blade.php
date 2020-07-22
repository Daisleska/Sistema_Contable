@extends('layouts.vertical')


@section('css')
<link href="{{ URL::asset('Shreyu/assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <i class='uil uil-file-alt mr-1'></i>Descargar
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item notify-item">
                        <i data-feather="mail" class="icon-dual icon-xs mr-2"></i>
                        <span>Correo</span>
                    </a>
                    <a href="#" class="dropdown-item notify-item">
                        <i data-feather="printer" class="icon-dual icon-xs mr-2"></i>
                        <span>Imprimir</span>
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

<div class="row">
    <div class="col-md-4 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Clientes registrados</span>
                         <?php
                              if ($clientes) {
                                $cantidad=count($clientes);
                               }else{
                                $cantidad=0;
                               }  ?>
                        <h2 class="mb-0" style="color: #006699;">{{$cantidad}}</h2>
                    </div>
                    <div class="align-self-center">
                        <span class="icon-lg icon-dual-warning" data-feather="user-check"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Productos</span>
                              <?php
                          
                              if ($productos) {
                         $cantidad_productos=count($productos);
                               }else{
                                $cantidad_productos=0;
                               }  ?>
                   <h2 class="mb-0">{{$cantidad_productos}} </h2>
                    </div>
                    <div class="align-self-center">
                        <span class="icon-lg icon-dual-primary" data-feather="shopping-bag"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <div class="col-md-4 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Proveedores</span>
                         <?php
                              if ($proveedores) {
                                $cantidad_proveedores=count($proveedores);
                               }else{
                                $cantidad_proveedores=0;
                               }  ?>
                        <h2 class="mb-0" style="color: #006699;"> {{$cantidad_proveedores}}</h2>
                    </div>
                    <div class="align-self-center">
                        <span class="icon-lg icon-dual-info" data-feather="truck"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <h5 class="card-title header-title border-bottom p-3 mb-0">Totales</h5>
                <!-- stat 2 -->
                <div class="media px-3 py-4">
                    <div class="media-body">
                         <?php
                          
                              if ($valor_inventario) {
                         $total_inventario=array_sum($valor_inventario);
                               }else{
                                $total_inventario=0;
                               }  ?>
                        <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">{{number_format($total_inventario, 2,',','.')}} <small>Bs.F</small></h4>
                        <span class="text-muted">Valor Del
                            Inventario</span>
                    </div>
                    <i data-feather="dollar-sign" class="align-self-center icon-dual icon-lg"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- stats + charts -->
<div class="row">
    <div class="col-xl-3">
        <div class="card">
            <div class="card-body pb-0">
                <div class="row">
                  <div class="col-sm-4"><h5 class="card-title">Ventas: <span id="total_grafica"></span></h5></div>
                  <div class="col-sm-6"></div>
                  <div class="col-sm-2">
                        <select name="val_anio" class="form-control" id="val_anio">
                          @foreach($anio_factura as $ke)
                           <option value="{{$ke->year}}">{{$ke->year}}</option>
                          @endforeach
                        </select>
                  </div>
                </div>
                <div id="targets-chart" class="apex-charts mt-3" dir="ltr"></div>
            </div>
        </div>
    </div>
<!-- products -->
    <div class="col-xl-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mt-0 mb-0 header-title">Sales By Category</h5>
                <div id="sales-by-category-chart" class="apex-charts mb-0 mt-4" dir="ltr"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<!-- row -->
@endsection
@section('script')
<!-- optional plugins -->
<script src="{{ URL::asset('Shreyu/assets/libs/moment/moment.min.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
@endsection
<script src="{{ URL::asset('js/jquery/dist/jquery.min.js') }}"></script>
@section('script-bottom')
<!-- init js -->
<script src="{{ URL::asset('js/pages/dashboard.init.js') }}"></script>
<script>
$(document).ready(function(){
        var fecha = new Date();
        var anio = fecha.getFullYear();
        grafica(anio);
})

$(document).ready(function(){
  $("select[name=val_anio]").change(function(){
   var anio= document.getElementById("val_anio").value;
   grafica(anio);
  });
})

function grafica(anio){
/*console.log(anio);*/
 $.ajax({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    url: '/busquedaA/'+anio+'/buscar',
    type: 'POST',
    success: function(res){
/* ------------- target */
var gol = Object.values(res);
var total = 0;
for (var i = 0; i < gol.length; i++) {
    total += Number(gol[i]);
}
document.getElementById('total_grafica').innerHTML = total;
/* console.log(Object.values(gol));*/

var options = {
    chart: {
        height: 296,
        type: 'bar',
        stacked: true,
        toolbar: {
            show: false
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '50%',
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    series: [{
   /*     name: 'Nuevas Ventas',
        data: [35, 44, 55, 57, 56, 61, 10, 34, 33, 20, 50, 40]
    }, {*/
        name: 'Ventas',
        data: gol
    }],
    xaxis: {
        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        axisBorder: {
            show: false
        },
    },
    legend: {
        show: false
    },
    grid: {
        row: {
            colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.2
        },
        borderColor: '#f3f4f7'
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return "Cantidad: " + val 
            }
        }
    }
}

var chart = new ApexCharts(
    document.querySelector("#targets-chart"),
    options
);
chart.render();
}
});
}

</script>
@endsection
{{-- Alerta si el usuario no ha registrado los datos de la empresa! --}}
<?php $data_e = \DB::select('SELECT * FROM empresa'); ?> 
@if (empty($data_e)) 
<script>
    $(function(){
        alerta_empresa();
    });
 
    function alerta_empresa() {
        swal({
        icon : "info",
        title : "Registre su empresa",
        text : "Le sugerimos registre los datos de su empresa o negocio, Gracias!.",
        buttons : {
            cancel: {
                text: "Mas tarde",
                value : null,
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: "Ir a registrar",
                value: true,
                visible: true,   
            },
             
        },

       }).then(function(confirm){
        if (confirm) {
            window.location="{{ route('empresa.create') }}";      
          }
       });
    }
</script>
@endif