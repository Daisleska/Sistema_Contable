@extends('layouts.app')

@section('css')
<!-- plugin css -->

<link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('Shreyu/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('Shreyu/assets/libs/multiselect/multiselect.min.css') }}" rel="stylesheet" type="text/css" />

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
                            <?php
                      use App\empresa;

                      $empresa=DB::table ('empresa')->select('nombre')->get();

                       
                      foreach($empresa as $key){ ?>
                            <tr style="color: black;" id="anio">
                                <th COLSPAN="2" style="text-align: center;"><?php echo $key->nombre; ?><br> BALANCE GENERAL</th>
                                <?php }  ?>
                            </tr>
                            <tr>
                                <th COLSPAN="4" style="margin-right: 10cm;"><select name="anio" id="anio" class="form-control" data-placeholder="Elige" style="width: 4cm;">
                                    <option selected="selected" disabled="disabled">Seleccione</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>

     
                                </select>

                               <!--<button type="button" class="btn btn-primary" id="actu">Actualizar</button>-->
                              
                        <table style="border-color: black; border: 1px;  " border="1" class="table"><br>
                                 <thead style="text-align: center; color: black;">
                                    <th>Número</th>
                                    <th>Cuentas</th>
                                    <th>Movimientos <br>Deudor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Acreedor</th>
                                    <th>Saldo <br>Deudor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Acreedor</th>
                                     
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
<script src="{{ URL::asset('Shreyu/assets/libs/multiselect/multiselect.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery/dist/jquery.min.js') }}"></script>



<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/js/pages/form-advanced.init.js') }}"></script>



<script>
$(document).ready(function(){
    $("select[name=anio]").change(function(){
       var anio= document.getElementById("anio").value;
    
        tabla(anio);
    });
})

    function tabla(anio){
          
                $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/busqueda/'+anio+'/buscar',
            type: 'POST',
            success: function(res){
               // var js= JSON.parse(JSON.stringify({res}));
                //console.log(res.buscar);
               
                var tabla;
                $('#tbody').html(tabla);



                
               
            }

        });
    }
/*    $('#actu').click(function(){
        tabla();
    });*/
</script>