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
                    <table style="color: black;">
                      <?php
                      use App\empresa;

  $empresa=DB::table ('empresa')->select('nombre', 'tipo_documento','ruf')->get();

                       
                      foreach($empresa as $key){
                        ?>
                        <tr >
                            <th>NOMBRE DE LA EMPRESA:</th>
                            <th><?php echo e($key->nombre)?></th>
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

                    <th style="align-content: right;">

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
                
                    </div></div></th>
                  </tr>

                    </table>
                  <br>
              

                    <table style="border-color: black; border: 1px;  " border="1" id="basic-datatable" class="table dt-responsive nowrap" >
                        <thead>
                            <tr style="color: black;">
                                <th COLSPAN="2" style="text-align: center;">LIBRO MAYOR</th>
                            </tr>
                            <tr>
                                <th COLSPAN="6" style="margin-right: 10cm;"><select name="cuenta" id="cuenta" data-plugin="customselect" name="tipo" class="form-control" data-placehol class="form-control" data-placeholder="Elige" style="width: 8cm;">
                                    <option selected="selected" disabled="disabled">Seleccione una cuenta</option>
                                @foreach($cuentas as $key)
                                        
                                        <option value="{{ $key->id }}" id="id">{{ $key->nombre }}</option>
                                @endforeach
     
                                </select>

                               <!--<button type="button" class="btn btn-primary" id="actu">Actualizar</button>-->
                              
                        <table style="border-color: black; border: 1px;  " border="1" class="table"><br>
                        
                                 <thead id="thead">
                                     
                                 </thead>
                                 <tbody id="tbody">
                                     
                                 </tbody>
                             </table></th>
                         </tr>
                        </thead>
                          


                          
                             
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

<!-- llamado al Modak----->


@endsection

<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/libs/multiselect/jquery.multi-select.js') }}"></script>
<script src="{{ URL::asset('js/jquery/dist/jquery.min.js') }}"></script>



<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/js/pages/form-advanced.init.js') }}"></script>


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
<script>
$(document).ready(function(){
    $("select[name=cuenta]").change(function(){
       var cuenta= document.getElementById("cuenta").value;
        tabla(cuenta);
    });
})

    function tabla(cuenta){
          
                $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/busquedaAjax/'+cuenta+'/buscar',
            type: 'POST',
            success: function(res){
               
               //res me trae 3 arreglos, para acceder a cada uno por separado utilizo el punto (.)
                console.log(res.cuen);
                console.log(res.buscar);
                console.log(res.saldos);
                var cuent=res.cuen;
                var buscar=res.buscar;
                var saldo=res.saldos;
                var debe =[];
                var haber =[];
                var tabla;

 
                nom='<tr style="color: black;"><th colspan="6"><span style=" color: black;" id="titulo_cuenta"></span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;'+cuent[0].nombre+' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N°'+cuent[0].codigo+'</th></tr><tr style="color: black;"><th style="text-align: center;">Debe</th><th style="text-align: center;">Haber</th><th style="text-align: center;">Saldo</th></tr>';
                
                
                  for (var i =0; i<buscar.length; i++) {
                   
                   
              

                    if (buscar[i].debe) {

                        var locale = 'de';
                        var options = { minimumFractionDigits: 2, maximumFractionDigits: 2};
                        var formatter = new Intl.NumberFormat(locale, options);

                         tabla+= '<tr><td style="text-align: center;">'+formatter.format(buscar[i].debe)+'</td><td></td>';
                         $('#tbody').html(tabla);  
                         

                         debe[i]=buscar[i].debe;

                     $('#tbody').html(tabla);

                    }else{

                        var locale = 'de';
                        var options = { minimumFractionDigits: 2, maximumFractionDigits: 2};
                        var formatter = new Intl.NumberFormat(locale, options);


                        tabla+= '<tr><td></td><td style="text-align: center;">'+formatter.format(buscar[i].haber)+'</td>';
                         $('#tbody').html(tabla);  

                       

                     $('#tbody').html(tabla);

                     haber[i]=buscar[i].haber;

                    }

                        var locale = 'de';
                        var options = { minimumFractionDigits: 2, maximumFractionDigits: 2};
                        var formatter = new Intl.NumberFormat(locale, options);
                       
                         tabla+= '<td style="text-align: center;">'+formatter.format(Math.abs(saldo[i]))+'</td></tr>';



                    }

                     var locale = 'de';
                        var options = { minimumFractionDigits: 2, maximumFractionDigits: 2};
                        var formatter = new Intl.NumberFormat(locale, options);
                       

                if (debe.length >0) {  
                var saldod=(new Function("return " +debe.join('+')))();
                tabla+= '<tr><th  style="text-align: center; color:black;">'+formatter.format(saldod)+'</th>';
                $('#tbody').html(tabla);
                }else{
                var saldod=0;
                tabla+= '<tr><th style="text-align: center;"></th>';
                $('#tbody').html(tabla);
                }


                if (haber.length >0) { 
                var saldoh=(new Function("return " +haber.join('+')))();
                tabla+= '<th  style="text-align: center; color:black;">'+formatter.format(saldoh)+'</th>';
                $('#tbody').html(tabla);
                }else{
                var saldoh=0;
                tabla+= '<th style="text-align: center;"></th>';
                $('#tbody').html(tabla);
                }

                tabla+= '<th style="text-align: center;"></th></tr>';

                $('#tbody').html(tabla);

                $('#thead').html(nom);
                


            }

        });
    }
/*    $('#actu').click(function(){
        tabla();
    });*/
</script>

