<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::all();
        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'nombre' => 'required',
            'ISBN' => 'required',
            'editorial' => 'required',
            'imagen' => 'required',
            'descripcion' => 'required',
            'stock' => 'required'
        ]);

        

        $libro = $request->all();

        if($request->file('imagen')){
            
            $nombreImagen = $request->file('imagen')->getClientOriginalName();
            $path = public_path() . '/imagenes/' . $nombreImagen;

        }

        Image::make($request->file('imagen'))->resize(150,150)->save($path);

        Libro::create($libro);

        // if($request->hasFile('imagen') && $request->file('imagen')->isValid()){
        //     $libro->addMediaFromRequest('imagen')->toMediaCollection('libro_imagen');
        // }

        return redirect('libros')->with(['libro' => $libro]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro = Libro::findOrFail($id);


        return view('libros.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'ISBN' => 'required',
            'editorial' => 'required',
            'imagen' => 'required',
            'descripcion' => 'required',
            'stock' => 'required'
        ]);

        Libro::whereId($id)->update($request->except('_method', '_token'));

        return redirect('libros');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Libro::whereId($id)->delete();

        return redirect('libros');
    }
}
