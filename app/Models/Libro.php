<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'ISBN', 'editorial', 'imagen', 'descripcion', 'stock'];

    public function prestamos(){
        $this->belongsToMany(Prestamo::class);
    }

    

}
