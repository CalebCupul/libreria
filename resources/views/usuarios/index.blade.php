@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')

<a href="/usuarios/create" role="button" class="btn btn-primary">Registrar usuario</a>

    <div class="card p-3 mt-3">
        <table class="table table-striped mt-4" id="libros">
            <thead class="text-center">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Domicilio</th>
                    <th>Comprobante</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
    
            <tbody class="text-center">
                @foreach ($usuarios as $usuario)
                    <tr>
                        {{-- <img src="/imagenes/{{ $usuario->imagen }}" alt=""> --}}
                        <td class="align-middle">{{ $usuario->imagen }}</td>
                        <td class="align-middle">{{ $usuario->name }}</td>
                        <td class="align-middle">{{ $usuario->domicilio }}</td>
                        <td class="align-middle">{{ $usuario->comprobante }}</td>
                        <td class="align-middle">{{ $usuario->telefono }}</td>
                        <td class="align-middle">{{ $usuario->email }}</td>
                        <td class="align-middle">{{ $usuario->rol }}</td>
                        <td>
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" role="button" class="btn btn-info">Editar</a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['usuarios.destroy', $usuario->id], 'style' => 'display:inline' ]) !!}
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