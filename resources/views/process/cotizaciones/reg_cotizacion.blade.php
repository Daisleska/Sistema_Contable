@extends('layouts.app')
@section('css')
<link href="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<div class="row" style="align-content: center;">
@endsection

@section('content')
<div class="row" style="align-content: center;">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
    <h1 align="center">Registro</h1>
    <h3 align="center">Cliente Cotizacion</h3>

                <p class="sub-header"></p>
<input type="submit" name="" value="Guardar" class="btn btn-primary">
<br><br>
                <form>
          <table id="basic-datatable" class="table dt-responsive nowrap">
    <thead>
    	<tr>
    		<th>Cliente</th>
    		<th>Nombre</th>
    		<th>Email</th>
    	</tr>
    </thead>
    <tbody>
    	<tr>
    	<td><input type="text" name="" required></td>
    	<td><input type="text" name="" required></td>
    	<td><input type="email" name="" required></td>
    	</tr>
    </tbody>
    <thead>
    	<tr>
    		<th>Direccion</th>
            <th>Rif</th>
    		<th>Telefono</th>
    		
    	</tr>
    </thead>
    <tbody>
    	<tr>
    	<td><textarea required rows="1"></textarea></td>
    	<td><input type="text" name="" required maxlength="11"></td>
        <td><input type="text" name="" required maxlength="11"></td>
        <td></td>
    	</tr>
    </tbody>
    </table> 
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
    @endsection

@section('script')
<!-- datatable js -->
<script src="{{ URL::asset('Shreyu/assets/libs/datatables/datatables.min.js') }}"></script>
@endsection

@section('script')
<!-- Plugin js-->
<script src="{{ URL::asset('Shreyu/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
@endsection
