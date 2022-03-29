<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name', 
        'isbn', 
        'editorial', 
        'image', 
        'description', 
        'stock'
        
    ];

    public function bookRecords(){
        return $this->hasMany(BookRecord::class);
    }
}
