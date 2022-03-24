{!! Form::open(array('route' => 'book-record.store', 'method' => 'POST')) !!}
        <div class="row card p-4">
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('user_id', 'Usuario', ['class' => 'ml-1']) !!}
                    {!! Form::select('user_id', $users, null, ['placeholder' => 'Selecciona un usuario' , 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('book_id', 'Libro', ['class' => 'ml-1']) !!}
                    {!! Form::select('book_id', $books, null, ['placeholder' => 'Selecciona un libro' , 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

        </div>

    {!! Form::close() !!}