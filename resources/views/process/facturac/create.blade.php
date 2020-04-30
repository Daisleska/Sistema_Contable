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
    @endsection

@section('script')
<!-- Plugin js-->
<script src="{{ URL::asset('Shreyu/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>

<script src="{{ asset('js/jquery/dist/jquery.js') }}"></script>



@endsection

@section('script-bottom')

@endsection
