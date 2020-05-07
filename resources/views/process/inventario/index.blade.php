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
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="">Libro Inventario</a></li>
             
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
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1">Libro Inventario</h4>
                    <br>

                <div class="row">
                    <div class="col-md-4">
                       <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class='uil uil-file-alt mr-1'></i>Descargar
                    <i class="icon"><span data-feather="chevron-down"></span></i></button>
                <div class="dropdown-menu dropdown-menu-right">
                   <a href="{{ route('inventario_view') }}" class="dropdown-item notify-item">
                        <i data-feather="book-open" class="icon-dual icon-xs mr-2"></i>
                        <span>Excel</span>
                    </a>
                    <a href="{{ route('inventario.pdf') }}" class="dropdown-item notify-item">
                        <i data-feather="download" class="icon-dual icon-xs mr-2"></i>
                        <span>PDF</span>
                    </a>
                    <a href="javascript:window.print()" class="dropdown-item notify-item">
                        <i data-feather="printer" class="icon-dual icon-xs mr-2"></i>
                        <span>Imprimir</span>
                    </a>
                </div>
            </div>
                    </div>
                      @foreach($inventario as $key)
                       <?php
                        $existencia=$key->existencia;
                        $precio=$key->precio;
                        $costo_total=$precio*$existencia;

                       
                        $total_inventario =$costo_total;

                      
                        ?>
                        @endforeach
                        
                       <?php
                       
                       
                         $total_inventario=array_sum($costo_t);
                      
                      
                        ?>
                  
                    <div class="col-md-8">
                         <p style="text-align: right; color: blue;">Valor Total Del Inventario <input id="total_inventario" type="text" name="" value="{{number_format($total_inventario, 2,',','.')}}" readonly="readonly"></p>
                    </div>
                </div>    


                     <table id="key-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Código</th>
                                <th>Existencia</th>
                                <th>Unidad</th>
                                <th>Costo</th>
                                <th>Costo total</th>
                            </tr>
                        </thead>
                
                        <tbody>
                      
                  @foreach($inventario as $key)
                       <?php
                        $existencia=$key->existencia;
                        $precio=$key->precio;
                        $costo_total=$precio*$existencia;


                      
                        
                        ?>
                       
                          
                          <tr>
                             <td>{{$key->nombre}}</td>
                             <td>{{$key->codigo}}</td>
                             <td style="color: green;">{{$key->existencia}}</td>
                             <td>{{$key->unidad}}</td>
                             <td>{{number_format($key->precio, 2,',','.')}}</td>
                             <td  id="costo_total" >{{number_format($costo_total, 2,',','.')}}</td>

                             {{-- <td >{{str_split(strval($costo_total)))}}</td> --}}
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

<script type="text/javascript">
     $("#costo_total").on('keyup',function (event) {
        //asignar evento a la variable ruf
        var costo_total = event.target.value;
     
    var total = $("#costo_total").val();
    

    var total_inventario += parseFloat(total).val();

    console.log(total_inventario);
    
      if (total) {
        $("#total_inventario").text('0');
      } else {
        $('#total_inventario').val(total);
        
      }
    });


</script>
<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>
@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
@endsection
