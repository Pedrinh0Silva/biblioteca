<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser preenchidos em massa.
     * Importante: Nunca coloque '_token' aqui!
     */
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'cpf',
    ];

    /**
     * Relacionamento: Um cliente pode ter muitos empréstimos.
     */
    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }
}
