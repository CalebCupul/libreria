{!!Form::model($user, ['method' => 'PUT', 'route' => ['user.update',$user->id], 'enctype' => 'multipart/form-data']) !!}
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
                    {!! Form::label('phone_number', 'Teléfono') !!}
                    {!! Form::number('phone_number', null, array('class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('address', 'Domicilio') !!}
                    {!! Form::text('address', null, array('class' => 'form-control')) !!}

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('roles', 'Rol', ['class' => 'ml-1']) !!}
                    {!! Form::select('roles', $roles, null, ['placeholder' => 'Selecciona un rol' , 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('image', 'Fotografía') !!}
                    {!! Form::file('image', array('class' => 'form-control-file')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('proof_of_address', 'Comprobante de domicilio') !!}
                    {!! Form::file('proof_of_address', array('class' => 'form-control-file')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

        </div>

    {!! Form::close() !!}