<?php

namespace App\Exports;

use App\Models\BookRecord;
use Facade\FlareClient\View;
use Illuminate\Contracts\View\View as ViewView;
use Maatwebsite\Excel\Concerns\FromView;

class BookRecordsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): ViewView
    {
        return view('book-record.includes.bookrecords-table', [
            'book_records' => BookRecord::all()
        ]);
    }

    
}
