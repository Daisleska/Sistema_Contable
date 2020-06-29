@extends('errors::layout')

@section('title', 'Error 403')

@section('code',  403)

@section('image')

<div  class="absolute pin bg-no-repeat lg:bg-center">
	<img style="height: 300px; " src="{{asset('images/403.png')}}">
</div>

@endsection

@section('message', 'Acceso no autorizado')

