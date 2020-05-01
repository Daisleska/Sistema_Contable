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
                    </table>
                  
              

                    <table id="basic-datatable" class="table dt-responsive nowrap" >
                        <thead>
                            <tr style="color: black;">
                                <th COLSPAN="13" style="text-align: center;">LIBRO DE CAJA CHICA</th>
                            </tr>
                             <tr style="color: black;">
                                <th>SALDO INICIAL</th>
                                <th></th>
                                <th COLSPAN="2"></th>
                    
                      
                   
                              </tr>
                            <tr style="color: black;">
                               
                            
                                <th>FECHA</th>
                                <th>INGRESOS</th>
                                <th>EGRESOS</th>
                                <th>SALDO</th>
                              
                             

                            
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                      @foreach($cajachica as $key)      
                <tr>
                  <td>{{$key->fecha}}</td>
                  <td>{{number_format($key->ingresos,2,',','.')}}</td>
                  <td>{{number_format($key->egresos,2,',','.')}}</td>
                  <td>{{number_format($key->saldo,2,',','.')}}</td>
                  
             
             
                
                </tr>
               
                     @endforeach
                          
                             </tbody>
                    </table>
                    

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