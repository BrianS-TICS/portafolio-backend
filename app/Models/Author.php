<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellidos'
    ];

    public function author()
    {
        return $this->hasOne(Cita::class);
    }
}
