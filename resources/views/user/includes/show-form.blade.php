{!!Form::model($user, ['method' => 'GET', 'route' => ['user.show',$user->id]]) !!}
        
<div class="container col-xl-8">
        <div class="card p-4">
            <h1 class="card-title text-center mb-4" style="font-size:1.5rem;">Información del usuario</h1>
                <div class="row">
                    <div class="col-4 mt-1 text-center">
                        <img class="img-fluid rounded" 
                            style="width: 200px; height:250px; object-fit: cover" 
                            src="/storage/{{ $user->image }}" 
                            alt="{{ $user->name }}"/>
                            
                    </div>
                    
                    <div class="col-6 ml-2">
                            <div>
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" id="name" class="form-control" placeholder="{{$user->name}}" readonly>
                            </div>

                            <div class="form-row">
                                <div class="col-8">
                                    <label for="email" class="form-label">Correo</label>
                                    <input type="email" id="email" class="form-control" placeholder="{{$user->email}}" readonly>
                                </div>
                                <div class="col-4">
                                    <label for="phone_number" class="form-label">Teléfono</label>
                                    <input type="phone_number" id="phone_number" class="form-control" placeholder="{{$user->phone_number}}" readonly>
                                </div>
                            </div>
                            
                        <div class="form-row">
                                <label for="address" class="form-label">Domicilio</label>
                                <textarea style="resize: none;" name="address" id="address" rows="3" class="form-control" readonly placeholder="{{$user->address}}"></textarea>
                        </div>
                    </div>
                </div>
            </div>
       </div>
</div>

    {!! Form::close() !!}