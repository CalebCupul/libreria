@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar usuario</h1>
@stop

@section('content')
    
    {!!Form::model($usuario, ['method' => 'PUT', 'route' => ['usuarios.update',$usuario->id]]) !!}
        <div class="row card p-4">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('email', 'Correo') !!}
                    {!! Form::email('email', null, array('class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('password', 'Contraseña') !!}
                    {!! Form::password('password', array('class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('domicilio', 'Domicilio') !!}
                    {!! Form::text('domicilio', null, array('class' => 'form-control')) !!}

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('telefono', 'Teléfono') !!}
                    {!! Form::number('telefono', null, array('class' => 'form-control')) !!}
                </div>
            </div>

            

            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('libros_activos', 'Libros A') !!}
                    {!! Form::number('libros_activos', null, array('class' => 'form-control')) !!}
                </div>
            </div> --}}

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('rol', 'Rol') !!}
                    {!! Form::text('rol', null, array('class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('imagen', 'Fotografía') !!}
                    {!! Form::file('imagen', array('class' => 'form-control-file')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('comprobante', 'Comprobande de domicilio') !!}
                    {!! Form::file('comprobante', array('class' => 'form-control-file')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

        </div>

    {!! Form::close() !!}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop