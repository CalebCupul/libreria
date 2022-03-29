@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Libros</h1>
@stop

@section('content')

<a href="/book/create" role="button" class="btn btn-primary">Registrar libro</a>
<a href="{{ route('book.export') }}" role="button" class="btn btn-success"><i class="fas fa-download"></i> Excel</a>
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#importModal"><i class="fas fa-file-excel"></i> Importar</button>

<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="importModalLabel">Importar libros desde Excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(array('route' => 'book.import', 'method' => 'POST', 'enctype' => "multipart/form-data", 'style' => 'display:inline')) !!}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('import_file', 'Documento') !!}
                    {!! Form::file('import_file', array('class' => 'form-control-file')) !!}
                </div>
                
            </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            {!! Form::submit('Importar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
      </div>

    </div>
  </div>
</div>

    <div class="card p-3 mt-3">
        <table class="table table-striped mt-4" id="libros">
            <thead class="text-center">
                <tr>
                    <th>Portada</th>
                    <th>Nombre</th>
                    <th>ISBN</th>
                    <th>Editorial</th>
                    <th>Disponibilidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
    
            <tbody class="text-center">
                @foreach ($books as $book)
                    <tr>
                        <td class="align-middle"><img class="img-fluid" style="height: 125px; width: 100px; object-fit: cover" src="/storage/{{ $book->image }}" alt="{{ $book->name }}"></td>
                        <td class="align-middle">{{ $book->name }}</td>
                        <td class="align-middle">{{ $book->isbn }}</td>
                        <td class="align-middle">{{ $book->editorial }}</td>
                        <td class="align-middle">{{ $book->stock }}</td>
                        <td class="align-middle">
                            <a href="{{ route('book.show', $book->id) }}" role="button" class="btn btn-dark display:inline">Ver</a>
                            <a href="{{ route('book.edit', $book->id) }}" role="button" class="btn btn-info display:inline">Editar</a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['book.destroy', $book->id], 'style' => 'display:inline' ]) !!}
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