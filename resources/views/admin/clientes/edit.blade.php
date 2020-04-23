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
              <h3 class="box-title">Modificar Clientes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form name="form" action="{{ route('clientes.update',$clientes->id)}}" method="PUT">
                  @csrf
              	@include('clientes.partials.edit-fields')
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