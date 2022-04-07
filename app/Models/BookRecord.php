<?php

namespace App\Models;

use App\Observers\BookRecordObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRecord extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id', 
        'book_id',
        'status',
        'returned_at'
        
    ];

    protected $casts = [
        'returned_at' => 'datetime:Y-m-d'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }
}
