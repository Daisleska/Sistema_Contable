@extends('layouts.app')

@section('content')
<div class="">
    <div class="">
        <div class="">
            <div class="card-body">
                <h4 style="text-align: center;" class="header-title mt-0 mb-1">Registro de Empresa</h4>
                <p class="sub-header"></p>
                <div class="col-md-12">
  
    

                <form  action="{{route('empresa.store')}}" class="needs-validation" method="post" enctype="multipart/form-data"  novalidate>
                    @csrf
                  @include('admin.empresa.partials.create-fields')
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    @endsection

@section('script')
<!-- Plugin js-->
<script src="{{ URL::asset('Shreyu/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
@endsection
