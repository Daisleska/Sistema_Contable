@extends('layouts.app')

@section('css')
<!-- plugin css -->
{{-- <link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" /> --}}
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
                <h4 style="text-align: center;" class="header-title mt-0 mb-1">Registro de Facturas</h4>
                <p class="sub-header"></p>

                <form  action="{{route('facturac.store', 'facturac.update')}}" class="needs-validation" method="post"  novalidate>
                    
                    @csrf
                  @include('process.facturac.partials.create-fields')
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->


     @foreach($iva as $key)
<div class="modal fade" id="bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    {!! Form::open(['route' => ['ivaupdateC',$key->id], 'method' => 'PUT', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}
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
                                                        <p>Valor I.V.A actual:{{$key->porcentaje}}%</p>
                                                       <td>% <input type="text" name="porcentaje" id="pct" placeholder="Ingrese el nuevo valor IVA"></td>

                                                       <button class="btn btn-info" id="other">~</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                                {!! Form::close() !!}
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        @endforeach
    @endsection

@section('script')
<!-- Plugin js-->
<script src="{{ URL::asset('Shreyu/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>

<script src="{{ asset('js/jquery/dist/jquery.js') }}"></script>

<script type="text/javascript">
    $(function() {
        
        $("#pct").mask("99%");
        

    
    });
</script>    



@endsection

@section('script-bottom')

@endsection
