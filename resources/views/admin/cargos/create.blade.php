@extends('layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
           
                
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('cargos.index') }}">Cargos</a></li>
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
<div class="row" style="  align-items: center; justify-content: center; ">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <br>
                <h4 style="text-align: center;" class="header-title mt-0 mb-1">REGISTRO DE CARGOS</h4>
                <p class="sub-header"></p>

                <form  action="{{route('cargos.store')}}" class="needs-validation" method="post"  novalidate>
                    @csrf
                  @include('admin.cargos.partials.create-fields')
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
    @endsection

@section('script')
<!-- Plugin js-->
<script src="{{ URL::asset('Shreyu/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
@endsection
