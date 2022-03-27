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
                    <th>ISBN</th>
                    <th>Editorial</th>
                    <th>Préstamo</th>
                    <th>Entrega</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
    
            <tbody class="text-center">
                @foreach ($book_records as $book_record)
                    <tr>
                        
                        <td class="align-middle">{{ $book_record->user->name }}</td>
                        <td class="align-middle">{{ $book_record->book->name }}</td>
                        <td class="align-middle">{{ $book_record->book->isbn }}</td>
                        <td class="align-middle">{{ $book_record->book->editorial }}</td>
                        <td class="align-middle">{{ $book_record->created_at->format('Y-m-d') }}</td>
                        <td class="align-middle">{{ $book_record->created_at->addDays(5)->format('Y-m-d') }}</td>
                        <td class="align-middle">
                            @if($book_record->status == 'Pendiente')
                                <span class="badge badge-secondary p-2">{{ $book_record->status }}</span></td>
                            @elseif($book_record->status == 'Entregado')
                                <span class="badge badge-success p-2">{{ $book_record->status }}</span></td>
                            @else
                                <span class="badge badge-danger p-2">{{ $book_record->status }}</span></td>
                            @endif
                        <td class="align-middle" >
                            <a href="{{ route('book-record.show', $book_record->id) }}" role="button" class="btn btn-dark display:inline">Ver</a>
                            @if($book_record->status != 'Entregado')
                            {!! Form::open(['method' => 'PUT', 'route' => ['book-record.update', $book_record->id], 'style' => 'display:inline' ]) !!}
                                {!! Form::submit('Devolver', ['class' => 'btn btn-info ']) !!}
                            {!! Form::close() !!}
                            @endif
    
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