@extends('layouts.appLayout')

@section('breadcomb')
<!-- Breadcomb area Start-->
<div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <a href="{{ route('areas.index') }}" data-toggle="tooltip"
                                        data-placement="bottom" title="Volver" class="btn">
                                        <i class="notika-icon notika-left-arrow"></i>
                                    </a>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Registrar área</h2>
                                    <p>Registra nuevos área en el sistema</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcomb area End-->

@endsection

@section('content')
<!-- Form Element area Start-->
<div class="form-element-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-element-list">
                    <div class="basic-tb-hd text-center">
                        <p>Todos los campos (<b style="color: red;">*</b>) son obligatorios</p>
                        @if(count($errors))
                        <div class="alert-list m-4">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>
                                        {{$error}}
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        @endif
                        @include('flash::message')
                    </div>

                    <form action="{{ route('areas.store') }}" method="POST" name="registrar_gerencia" data-parsley-validate>
                    @csrf
                        <h4>Datos de área</h4>
                        <hr>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-3">
                                <div class="form-group">
                                    <label for="gerencia">Gerencia: <b style="color: red;">*</b></label>
                                    <select name="gerencia" id="gerencia" class="form-control" required="required">
                                        @foreach($gerencias as $item)
                                        <option value="{{$item->id}}">{{$item->gerencia}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-3">
                                <div class="form-group">
                                    <label for="area">Área: <b style="color: red;">*</b></label>
                                    <input type="text" name="area" id="area" class="form-control" placeholder="Ingrese nombre del área" required="required" value="{{ old('area') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-3">
                                <div class="form-group">
                                    <label for="descripcion">Descripción: <b style="color: red;">*</b></label>
                                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese  descripción" required="required" value="{{ old('descripcion') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-3">
                                <div class="form-group">
                                    <label for="ubicacion">Ubicación: <b style="color: red;">*</b></label>
                                    <input type="text" name="ubicacion" id="ubicacion" class="form-control" placeholder="Ingrese ubicación" required="required" value="{{ old('ubicacion') }}">
                                </div>
                            </div>
                        </div><hr>

                        <div class="text-center mt-4">
                            <a href="{{route('areas.index')}}" class="btn btn-info btn-sm">Regresar</a>
                            <button class="btn btn-lg btn-success btn-sm" type="submit">Guardar gerencia</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
</div>


@endsection
