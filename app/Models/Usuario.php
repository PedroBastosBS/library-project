<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuario';

    protected $fillable = [
        'nome',
        'endereco',
    ];
    protected $attributes = [];
    protected $hidden = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function emprestimos(): hasMany
    {
        return $this->hasMany(Emprestimo::class, 'usuarioID', 'id');
    }
}
