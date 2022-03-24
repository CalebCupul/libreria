@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Préstamos</h1>
@stop

@section('content')

<a href="/book-record/create" role="button" class="btn btn-primary">Registrar préstamo</a>

    <div class="card p-3 mt-3">
        <table class="table table-striped mt-4" id="book_records">
            <thead class="text-center">
                <tr>
                    <th>Usuario</th>
                    <th>Libro</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
    
            <tbody class="text-center">
                @foreach ($book_records as $book_record)
                    <tr>
                        
                        <td class="align-middle">{{ $book_record->user->name }}</td>
                        <td class="align-middle">{{ $book_record->book->name }}</td>
                        <td class="align-middle">{{ $book_record->status }}</td>
                        <td class="align-middle" >
                            <a href="{{ route('book-record.show', $book_record->id) }}" role="button" class="btn btn-dark display:inline">Ver</a>
                            <a href="{{ route('book-record.edit', $book_record->id) }}" role="button" class="btn btn-info display:inline">Editar</a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['book-record.destroy', $book_record->id], 'style' => 'display:inline' ]) !!}
                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
    
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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