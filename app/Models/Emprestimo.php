<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Emprestimo extends Model
{
    use HasFactory;
    protected $table = 'emprestimo';

    protected $fillable = [
        'dataEmprestimo',
        'dataDevolucao',
        'livro',
        'usuario'
    ];
    protected $attributes = [];
    protected $hidden = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
