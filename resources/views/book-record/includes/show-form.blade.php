{!! Form::model($bookRecord, ['method' => 'GET', 'route' => ['book-record.show',$bookRecord->id]]) !!}


<div class="container col-md-2 col-lg-6 col-xl-8">
        <div class="card p-4">
            <h1 class="card-title text-center mb-4" style="font-size:1.5rem;">Información del libro</h1>
                <div class="row">
                    <div class="col-4 mt-1 text-center">
                        <img class="img-fluid rounded" 
                            style="width: 200px; height:250px; object-fit: cover" 
                            src="/storage/{{ $bookRecord->book->image }}" 
                            alt="{{ $bookRecord->book->name }}"/>
                    </div>
                    <div class="col-6 ml-2">
                        
                            <div>
                                <label for="bookname" class="form-label">Nombre</label>
                                <input type="text" id="bookname" class="form-control" placeholder="{{$bookRecord->book->name}}" readonly>
                            </div>

                            <div class="form-row">
                                <div class="col-8">
                                    <label for="editorial" class="form-label">Editorial</label>
                                    <input type="text" id="editorial" class="form-control" placeholder="{{$bookRecord->book->editorial}}" readonly>
                                </div>
                                <div class="col-4">
                                    <label for="isbn" class="form-label">ISBN</label>
                                    <input type="isbn" id="isbn" class="form-control" placeholder="{{$bookRecord->book->isbn}}" readonly>
                                </div>
                            </div>
                            
                        <div class="form-row">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea style="resize: none;" name="description" id="description" rows="3" class="form-control" readonly placeholder="{{$bookRecord->book->description}}"></textarea>
                        </div>
                    </div>
                </div>
            </div>
       </div>
</div>

<div class="container col-md-2 col-lg-6 col-xl-8">
        <div class="card p-4">
            <h1 class="card-title text-center mb-4" style="font-size:1.5rem;">Información del usuario</h1>
                <div class="row">
                    <div class="col-4 mt-1 text-center">
                        <img class="img-fluid rounded" 
                            style="width: 200px; height:250px; object-fit: cover" 
                            src="/storage/{{ $bookRecord->user->image }}" 
                            alt="{{ $bookRecord->user->name }}"/>
                    </div>
                    <div class="col-6 ml-2">
                            <div>
                                <label for="bookname" class="form-label">Nombre</label>
                                <input type="text" id="bookname" class="form-control" placeholder="{{$bookRecord->book->name}}" readonly>
                            </div>

                            <div class="form-row">
                                <div class="col-8">
                                    <label for="email" class="form-label">Correo</label>
                                    <input type="email" id="email" class="form-control" placeholder="{{$bookRecord->user->email}}" readonly>
                                </div>
                                <div class="col-4">
                                    <label for="phone_number" class="form-label">Teléfono</label>
                                    <input type="phone_number" id="phone_number" class="form-control" placeholder="{{$bookRecord->user->phone_number}}" readonly>
                                </div>
                            </div>
                            
                        <div class="form-row">
                                <label for="address" class="form-label">Domicilio</label>
                                <textarea style="resize: none;" name="address" id="address" rows="3" class="form-control" readonly placeholder="{{$bookRecord->user->address}}"></textarea>
                        </div>
                    </div>
                </div>
            </div>
       </div>
</div>
                    

    {!! Form::close() !!}

    