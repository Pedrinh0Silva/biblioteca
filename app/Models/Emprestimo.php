<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'livro_id',
        'data_emprestimo',
        'data_devolucao',
        'status',
    ];

    // Relacionamento com o 
    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    // Relacionamento com o Cliente 
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}