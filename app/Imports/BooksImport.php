<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;

class BooksImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
            'name'          => $row[0],
            'isbn'          => $row[1],
            'editorial'     => $row[2],
            'image'         => $row[3],
            'description'   => $row[4],
            'stock'         => $row[5],
        ]);
    }
}
