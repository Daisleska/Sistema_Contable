
@extends('layouts.app')

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
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
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
