<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'livro';

    protected $fillable = [
        'titulo',
        'isbn',
        'categoria',
        'autor',
        'status'
    ];
    protected $attributes = [];
    protected $hidden = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];


}
