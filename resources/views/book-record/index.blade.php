@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Préstamos</h1>
@stop

@section('content')

<a href="/book-record/create" role="button" class="btn btn-primary">Registrar préstamo</a>
<a href="{{ route('bookrecord.export') }}" role="button" class="btn btn-success"><i class="fas fa-download"></i> Excel</a>


    <div class="card p-3 mt-3">
        @include('book-record.includes.bookrecords-table')
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $('#book_records').DataTable();
    </script>
    @stop