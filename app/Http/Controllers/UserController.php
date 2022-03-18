<?php

namespace App\Http\Controllers;

use App\Events\UserSaved;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::pluck('name', 'id');
        return view('user.create', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Valida los campos de la petición
        $input = $request->validate([
            'name'          => 'required',
            'password'      => 'required',
            'email'         => 'required',
            'domicilio'     => 'required',
            'telefono'      => 'required',
            'imagen'        => 'required|image',
            'comprobante'   => 'required|mimes:pdf,jpeg',
            'roles'         => 'required'
        ]);
        
        // Guarda las imágenes en el disco público y retorna la ruta
        // como nombre de imagen de los respectivos campos
        $input['imagen'] = $request->file('imagen')->store('user-images');
        $input['comprobante'] = $request->file('comprobante')->store('comprobantes');

        // Encripta la contraseña y crea el usuario
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        // Optimización de imagen
        UserSaved::dispatch($user);

        // Asignación de rol
        $user->assignRole($request->roles);
        
        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
        $roles = Role::pluck('name', 'id');
        
        return view('user.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id');
        
        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Valida los campos de la petición
        $input = $request->validate([
            'name'          => 'required',
            'password'      => 'nullable',
            'email'         => 'required',
            'domicilio'     => 'required',
            'telefono'      => 'required',
            'imagen'        => 'nullable|image',
            'comprobante'   => 'nullable|mimes:pdf,jpeg',
            'roles'         => 'required'
        ]);

        // Si la petición contiene un archivo
        if( $request->hasFile('imagen')){

            // Borra la imagen anterior
            Storage::delete($user->imagen);

            // Actualiza la nueva imagen del usuario
            $input['imagen'] = $request->file('imagen')->store('user-images');

        } else {
            
            //Si no contiene un archivo, no incluye el campo
            $input = Arr::except($input, array('imagen'));
        }

        if( $request->hasFile('comprobante')){
            Storage::delete($user->comprobante);
            $input['comprobante'] = $request->file('comprobante')->store('comprobantes');
        } else {
            $input = Arr::except($input, array('comprobante'));
        }

        // Si la petición contiene una contraseña
        if( !empty($input['password'])){

            // Guarda una nueva contraseña encriptada
            $input['password'] = Hash::make($input['password']);

        } else {

            // Si no contiene una contraseña, no incluye el campo
            $input = Arr::except($input, array('password'));
        }

        // Actualiza el usuario
        $user->update($input);

        // Optimización de imagen
        UserSaved::dispatch($user);

        // Encuentra el Usuario en la tabla de roles y lo elimina para posteriormente actualizarlo
        DB::table('model_has_roles')->where('model_id', $user->id)->delete();
        // Asignación de rol
        $user->assignRole($request->roles);
        
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        Storage::delete($user->imagen);
        Storage::delete($user->comprobante);
        $user->delete();

        return redirect('user');
    }

}
