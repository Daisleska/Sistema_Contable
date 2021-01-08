
@extends('layouts.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
           
                
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('clientes.index') }}">Clientes</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Editar</li>
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
 <style type="text/css">
          .abs-center {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #fff;
        padding: 20px;
          }
      
</style>
<div class="row" style=" align-items: center; justify-content: center;">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
              <br>
                <h4 style="text-align: center;" class="header-title mt-0 mb-1">Modificar Clientes</h4>
                <p class="sub-header"></p>
    
                <div class="box-body abs-center">
                   {!! Form::open(['route' => ['clientes.update',$clientes->id], 'method' => 'PUT', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}
                  @csrf
                @include('admin.clientes.partials.edit-fields')
              </form>
                
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
 </div>
</div>

    @endsection

@section('script')
<!-- Plugin js-->
<script src="{{ URL::asset('Shreyu/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
@endsection
