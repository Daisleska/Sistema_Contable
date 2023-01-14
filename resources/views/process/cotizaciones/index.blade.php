@extends('layouts.app')

@section('css')
<!-- plugin css -->
<link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')

<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
          
        </nav>
        <h4 class="mb-1 mt-0"></h4>
    </div>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-md-7"></div>
     <div class="col-md-5">
        @include('flash::message')
    </div>
</div>
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <br>
                    <h4 style="text-align: center;" class="header-title mt-0 mb-1">Cotizaciones</h4>

                     <a href="{{ route('cotizacion.create') }}" class="btn btn-secondary" title="Registrar" ><i data-feather="plus"></i></a>
                  

                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead style="font-size: 12px;">
                            <tr>
                                <tr>
                                    <th>Fecha</th>
                                    <th>N° Cotización</th>
                                    <th>Cliente</th>
                                    <th>RIF</th>
                                    <th>Correo</th>
                                    <th>Monto</th>
                                    <th>Opciones</th>
                                </tr>
                       

                            
                            </tr>
                        </thead>
                    
                    
                        <tbody style="font-size: 12px;">
                     
                @foreach($cotizacion as $key) 
                <tr>
                  <td>{{date("d-m-Y", strtotime($key->fecha)) }}</td>
                  <td>000{{$key->n_cotizacion}}</td>
                  <td>{{$key->nombre}}</td>
                  <td>{{$key->tipo_documento}}-{{$key->ruf}}</td>
                  <td>{{$key->email}}</td>
                  <td>{{number_format($key->total,2,',','.')}} {{$key->divisa}}</td>
                  <td>
                       @if(buscar_p('Reportes','PDF')=="Si")
                                            <a href="{{ route('cotizacion.pdf', $key->n_cotizacion) }}" class="btn btn-info btn-sm"
                                                data-toggle="tooltip" 
                                                title="Generar pdf"> <i data-feather="save"></i>
                                            </a>
                        @endif
                         @if(buscar_p('Cotizaciones','Eliminar')=="Si" )
                      
                        <br><br>
                        <button   class="btn btn-danger btn-sm" onclick="alert_eliminar_cot('{{$key->n_cotizacion}}')" title="Eliminar"><i data-feather="trash-2"></i></button>
                        @endif
                 
                    </td>
             
                  </tr>
          @endforeach
                          
                             </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
    <script type="text/javascript">
      function alert_eliminar_cot(n_cotizacion){

      console.log(n_cotizacion);

       swal({
        icon : "warning",
        title : "¿Seguro desea eliminar esta cotización?",
        text : "Nota: Si elimina este registro no podra acceder a su información.",
        buttons : {
            cancel: {
                text: "Cancelar",
                value : null,
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: "Eliminar",
                value: true,
                visible: true,

                
            },
             
        },

       }).then(function(confirm){
        if (confirm) {

          $.ajax ({

          url: '/cotizacion/'+n_cotizacion+'/eliminar',
          headers: { n_cotizacion: n_cotizacion},
          method: "GET"

         });

        location.reload();
          }
       });

    }
</script>

@endsection

@section('script')
<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>
@endsection

@section('script-bottom')
<!-- Datatables init -->
<script src="{{ URL::asset('Shreyu/assets/js/pages/datatables.init.js') }}"></script>
@endsection
