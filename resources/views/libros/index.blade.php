@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Libros</h1>
@stop

@section('content')

<a href="/libros/create" role="button" class="btn btn-primary">Registrar libro</a>

    <div class="card p-3 mt-3">
        <table class="table table-striped mt-4" id="libros">
            <thead class="text-center">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>ISBN</th>
                    <th>Editorial</th>
                    <th>Descripción</th>
                    <th>Disponibilidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
    
            <tbody class="text-center">
                @foreach ($libros as $libro)
                    <tr>
                        <td class="align-middle">{{ $libro->imagen }}</td>
                        <td class="align-middle">{{ $libro->nombre }}</td>
                        <td class="align-middle">{{ $libro->ISBN }}</td>
                        <td class="align-middle">{{ $libro->editorial }}</td>
                        <td class="align-middle">{{ $libro->descripcion }}</td>
                        <td class="align-middle">{{ $libro->stock }}</td>
                        <td>
                            <a href="{{ route('libros.edit', $libro->id) }}" role="button" class="btn btn-info">Editar</a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['libros.destroy', $libro->id], 'style' => 'display:inline' ]) !!}
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
        $('#libros').DataTable();
    </script>
    @stop