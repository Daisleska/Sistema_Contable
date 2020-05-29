@extends('layouts.app')

@section('content')
<div>
    <div>
        <div>
            <div class="card-body">
                <h4 style="text-align: center;" class="header-title mt-0 mb-1">Registro de Proveedor</h4>
                <p class="sub-header"></p>


        <form  action="{{route('proveedores.store')}}"  method="post"  novalidate class="">
                    @csrf
                  @include('admin.proveedores.partials.create-fields')
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
    @endsection

@section('script')
<!-- Plugin js-->
<script src="{{ URL::asset('Shreyu/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
@endsection
