@extends('layouts.app')

@section('content')
<div class="row" style=" align-items: center; justify-content: center;">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 style="text-align: center;" class="header-title mt-0 mb-1">Registro de Empresa</h4>
                <p class="sub-header"></p>
    
                <form  action="{{route('empresa.store')}}" class="needs-validation" method="post" enctype="multipart/form-data"  novalidate>
                    @csrf
                  @include('admin.empresa.partials.create-fields')
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
