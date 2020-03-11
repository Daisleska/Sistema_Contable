@extends('layouts.app')

@section('content')
<div class="row" style="align-content: center;">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 style="text-align: center;" class="header-title mt-0 mb-1">Registro de Clientes</h4>
                <p class="sub-header"></p>

                <form  action="{{route('clientes.store')}}" class="needs-validation" method="post"  novalidate>
                    @csrf
                  @include('clientes.partials.create-fields')
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
    @endsection

@section('script')
<!-- Plugin js-->
<script src="{{ URL::asset('Shreyu/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
@endsection
