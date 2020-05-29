@extends('layouts.app')

@section('content-header')
<section class="content-header">
      <h1> 
        ...
        <small>...</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Productos</a></li>
        <li class="active">Registros</li>
      </ol>
    </section>
@endsection
@section('content')
<div class="">
	<div class="">
        <div class="">
          <div class="">
            <div class="box-header">
              <h3 class="box-title" align="center">Modificar Productos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              {!! Form::open(['route' => ['productos.update', $productos->id], 'method' => 'PUT', 'name' => 'form', 'id' => 'form', 'data-parsley-validate']) !!}
                @csrf
                @include('admin.productos.partials.edit-fields')
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</div>
@endsection