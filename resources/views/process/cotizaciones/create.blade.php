@extends('layouts.app')

@section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('EasyAutocomplete/dist/easy-autocomplete.min.css')}}">
@endsection

@section('content')
<div class="row">
        <div class="col-md-7" ></div>
        <div class="col-md-5">
            @include('flash::message')
        </div>
</div>
<div class="row" style="align-content: center;">
    <div class="col-lg-13">
        <div class="card">
            <div class="card-body">
                <h4 style="text-align: center;" class="header-title mt-0 mb-1">Registro de Cotización</h4>
                <p class="sub-header"></p>

                <form  action="{{route('cotizacion.store')}}" class="needs-validation" method="post"  novalidate>
                    
                    @csrf
                  @include('process.cotizaciones.partials.create-fields')
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
                                                        <h5 class="modal-title" id="mySmallModalLabel">Cambiar I.V.A</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <p>Valor I.V.A actual: {{$key->porcentaje}}%</p>
                                                       <td><input type="text" name="porcentaje"  placeholder="Ingrese el nuevo valor" class="form-control"></td>

                                                       
                                                       <div class="modal-footer">
                                                     <button type="button" class="btn btn-dark btn-xs remove-item" data-dismiss="modal">Cerrar</button>
                                                     <button class="btn btn-info btn-xs remove-item" id="other">Guardar</button>
                                                     </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                                {!! Form::close() !!}
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        @endforeach


<!-- otro modal -->


@foreach($descuento as $key)
<div class="modal fade" id="bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    {!! Form::open(['route' => ['descupdate',$key->id], 'method' => 'PUT', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}
                    @csrf

                    <input type="hidden" name="id" value="{{$key->id}}">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="mySmallModalLabel">Cambiar Descuento</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <p>Valor Descuento actual: {{$key->porcen}}%</p>
                                                       <td><input type="text" name="porcen" placeholder="Ingrese el nuevo valor" class="form-control"></td>

                                                       <div class="modal-footer">
                                                        <button type="button" class="btn btn-dark btn-xs remove-item" data-dismiss="modal">Cerrar</button>
                                                       <button class="btn btn-info btn-xs remove-item" id="other">Guardar</button>
                                                   </div>

                                                    </div>
                                                </div><!-- /.modal-content -->
                                                {!! Form::close() !!}
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        @endforeach



 
    @endsection

@section('script')
<!-- Plugin js-->
{{-- <script src="{{ URL::asset('Shreyu/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
 --}}
<script src="{{ asset('js/jquery/dist/jquery.js') }}"></script>
<!-- jQuery CDN -->
<script src="{{ asset('js/jquery/dist/jquery.min.js') }}"></script>

<script src="{{ URL::asset('js/jquery/dist/jquery.maskedinput.js')}}
"></script>





   

@endsection