@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')

<a href="/user/create" role="button" class="btn btn-primary">Registrar usuario</a>

    <div class="card p-3 mt-3">
        <table class="table table-striped mt-4" id="libros">
            <thead class="text-center">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
    
            <tbody class="text-center">
                @foreach ($users as $user)
                    <tr>
                        <td class="algn-middle"><img class="img-fluid" style="height: 125px; width: 100px; object-fit: cover" src="/storage/{{ $user->imagen }}" alt="User image"></td>
                        <td class="align-middle">{{ $user->name }}</td>
                        <td class="align-middle">{{ $user->email }}</td>
                        <td class="align-middle">
                            @foreach($user->getRoleNames() as $rolName)
                                <span class="badge badge-dark">{{ $rolName }}</span>
                            @endforeach
                        </td>
                        <td class="align-middle">
                            <a href="{{ route('user.show', $user->id) }}" role="button" class="btn btn-dark display:inline">Ver</a>
                            <a href="{{ route('user.edit', $user->id) }}" role="button" class="btn btn-info display:inline">Editar</a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id], 'style' => 'display:inline' ]) !!}
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