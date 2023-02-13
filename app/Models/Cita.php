<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    protected $dates = ['fecha_difusion'];

    protected $fillable = [
        'contenido',
        'author_id',
        'fecha_difusion'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'authors_id' ,'id');
    }
}
