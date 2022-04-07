<?php

namespace App\Http\Controllers;

use App\Exports\BookRecordsExport;
use App\Mail\BookRecordMailable;
use App\Models\Book;
use App\Models\BookRecord;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class BookRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asd = BookRecord::where('status', 'Pendiente')->get();

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
        // Agrega fecha limite de entrega
        $returned_at = now()->addDays(8)->format('Y-m-d');
        $request->request->add(['returned_at' => $returned_at]);

        $input = $request->validate([

            'user_id' => 'required',
            'book_id' => 'required',
            'returned_at' => 'nullable'

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
        $bookRecord->user->update(['status' => 'Activo']);


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

    public function export(){
        
        return Excel::download(new BookRecordsExport, 'prestamos.xlsx');

    }

    public static function sendEmailAfterBookDelay(BookRecord $bookRecord){
        $email = new BookRecordMailable;

        Mail::to($bookRecord->user->email)->send($email);
    }
}
