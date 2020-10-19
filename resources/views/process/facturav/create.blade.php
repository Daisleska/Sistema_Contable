@extends('layouts.app')

@section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <link rel="stylesheet" href="{{asset('EasyAutocomplete/dist/easy-autocomplete.min.css')}}">
@endsection

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
           
                
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('facturav.index') }}">Facturas</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Registrar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="row">
        <div class="col-md-7" ></div>
        <div class="col-md-5">
            @include('flash::message')
        </div>
</div>
<div class="row" style="align-content: center;">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <br>
                <h4 style="text-align: center;" class="header-title mt-0 mb-1">Registro de Facturas</h4>
                <p class="sub-header"></p>

                <form  action="{{route('facturav.store')}}" class="needs-validation" method="post"  novalidate>
                    
                    @csrf
                  @include('process.facturav.partials.create-fields')
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->



    @foreach($iva as $key)
<div class="modal fade" id="bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    {!! Form::open(['route' => ['ivaupdate',$key->id], 'method' => 'PUT', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}
                    @csrf

                    <input type="hidden" name="id" value="{{$key->id}}">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 style="margin-left: 1.5cm;" class="header-title mt-0 mb-1" id="mySmallModalLabel">Cambiar I.V.A</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                     <div class="modal-body">
                                                        <p>Valor I.V.A actual: {{$key->porcentaje}}%</p>
                                                       <td><input type="text" name="porcentaje"  placeholder="Ingrese el nuevo valor" class="form-control"></td>

                                                       
                                                       <div class="modal-footer">
                                                     <button type="button" class="btn btn-dark btn-xs remove-item" data-dismiss="modal">Cerrar</button>
                                                     <button class="btn btn-primary btn-xs remove-item" id="other">Guardar</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                                {!! Form::close() !!}
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        @endforeach
    @endsection

@section('script')
<!-- Plugin js-->
<script src="{{ URL::asset('Shreyu/assets/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ URL::asset('Shreyu/assets/js/app.min.js') }}"></script>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

<script src="{{ asset('js/jquery/dist/jquery.js') }}"></script>

<script type="text/javascript">
    $(function() {
        
        $("#pct").mask("99%");
        

    
    });
</script>    



@endsection

@section('script-bottom')

@endsection