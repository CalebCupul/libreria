<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [

        'name', 
        'isbn', 
        'editorial', 
        'image', 
        'description', 
        'stock'
        
    ];

    public function book_records(){
        $this->belongsToMany(BookRecord::class);
    }
}
