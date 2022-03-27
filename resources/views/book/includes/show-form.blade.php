{!! Form::model($book, ['method' => 'GET', 'route' => ['book.update',$book->id]]) !!}
        
<div class="container col-md-2 col-lg-6 col-xl-8">
        <div class="card p-4">
            <h1 class="card-title text-center mb-4" style="font-size:1.5rem;">Información del libro</h1>
                <div class="row">
                    <div class="col-4 mt-1 text-center">
                        <img class="img-fluid rounded" 
                            style="width: 200px; height:270px; object-fit: cover" 
                            src="/storage/{{ $book->image }}" 
                            alt="{{ $book->name }}"/>
                    </div>
                    <div class="col-6 ml-2">
                        
                            <div>
                                <label for="bookname" class="form-label">Nombre</label>
                                <input type="text" id="bookname" class="form-control" placeholder="{{$book->name}}" readonly>
                            </div>

                            <div class="form-row">
                                <div class="col-6 mt-2">
                                    <label for="editorial" class="form-label">Editorial</label>
                                    <input type="text" id="editorial" class="form-control" placeholder="{{$book->editorial}}" readonly>
                                </div>
                                <div class="col-3 mt-2">
                                    <label for="isbn" class="form-label">ISBN</label>
                                    <input type="isbn" id="isbn" class="form-control" placeholder="{{$book->isbn}}" readonly>
                                </div>
                                <div class="col-3 mt-2">
                                    <label for="isbn" class="form-label">Disponibilidad</label>
                                    <input type="isbn" id="isbn" class="form-control" placeholder="{{$book->stock}}" readonly>
                                </div>
                            </div>
                            
                        <div class="form-row mt-2">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea style="resize: none;" name="description" id="description" rows="3" class="form-control" readonly placeholder="{{$book->description}}"></textarea>
                        </div>
                    </div>
                </div>
            </div>
       </div>
</div>

    {!! Form::close() !!}