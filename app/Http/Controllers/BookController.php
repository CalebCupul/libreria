<?php

namespace App\Http\Controllers;

use App\Events\BookSaved;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('book.index' , compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name'              => 'required',
            'isbn'              => 'required',
            'editorial'         => 'required',
            'description'       => 'required',
            'image'             => 'required|image',
            'stock'             => 'required'
        ]);

        $input['image'] = $request->file('image')->store('BookImages');
        $book = Book::create($input);

        BookSaved::dispatch($book);

        return redirect('book');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $input = $request->validate([
            'name'              => 'required',
            'isbn'              => 'required',
            'editorial'         => 'required',
            'description'       => 'required',
            'image'             => 'nullable|image',
            'stock'             => 'required'
        ]);

        if( $request->hasFile('image')){
            Storage::delete($book->image);
            $input['image'] = $request->file('image')->store('BookImages');
        }else{
            $input = Arr::except($input, array('image'));
        }

        $book->update($input);
        BookSaved::dispatch($book);

        return redirect('book');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        Storage::delete($book->image);
        $book->delete();

        return redirect('book');
    }
}
