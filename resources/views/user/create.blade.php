@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Registrar nuevo usuario</h1>
@stop

@section('content')
    
@include('user.includes.create-form')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop