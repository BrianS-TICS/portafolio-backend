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

    public function autor(){
        return $this->belongsTo(Autor::class, 'Author_id');
    }
}
