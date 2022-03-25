<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookRecord;
use App\Models\User;
use Illuminate\Http\Request;

class BookRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_records = BookRecord::with('user')->with('book')->get();
        return view('book-record.index', compact('book_records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        return view('book-record.create', compact('books', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRecordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([

            'user_id' => 'required',
            'book_id' => 'required'

        ]);
        
        BookRecord::create($input);

        return redirect('book-record');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookRecord  $bookRecord
     * @return \Illuminate\Http\Response
     */
    public function show(BookRecord $bookRecord)
    {
        return view('book-record.show', compact('bookRecord'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookRecord  $bookRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(BookRecord $bookRecord)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRecordRequest  $request
     * @param  \App\Models\BookRecord  $bookRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookRecord $bookRecord)
    {
        // Al devolver el libro, cambia el estado del prestamo
        $bookRecord->update(['status' => 'Entregado']);

        return redirect('book-record');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookRecord  $bookRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookRecord $bookRecord)
    {

    }
}
