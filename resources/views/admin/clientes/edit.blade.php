@extends('layouts.app')

@section('content-header')
<section class="content-header">
      <h1> 
        ...
        <small>...</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Clientes</a></li>
        <li class="active">Registros</li>
      </ol>
    </section>
@endsection
@section('content')
<div class="content">
	<div class="row">
        <div class="col">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" align="center">Modificar Clientes</h3>
            </div>
            <!-- /.box-header -->
          
            <div class="box">
              {!! Form::open(['route' => ['clientes.update', $clientes->id], 'method' => 'PUT', 'name' => 'form', 'id' => 'form', 'data-parsley-validate']) !!}
                @csrf
              	@include('admin.clientes.partials.edit-fields')
              {!! Form::close() !!}
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