@extends('layouts.app')

@section('content')
    <h1 class="text-center">Aplicación de Chat en Laravel</h1>
    <message :messages="messages"></message>
    <sent-message v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></sent-message>
@endsection
