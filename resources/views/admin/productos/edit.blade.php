@extends('layouts.app')

@section('css')

@endsection


@section('content')
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
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <h4 style="text-align: center;" class="header-title mt-0 mb-1">Modificar Producto</h4>
                <p class="sub-header"></p>
    
                <div class="box-body abs-center">
              {!! Form::open(['route' => ['productos.update',$productos->id], 'method' => 'PUT', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}
                  @csrf
              	@include('admin.productos.partials.edit-fields')
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </div>
@endsection
@section('script')
<!-- Plugin js-->
<script src="{{ URL::asset('Shreyu/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
@endsection
