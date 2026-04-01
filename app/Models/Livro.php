<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada à model.
     * (Opcional se sua tabela no banco se chamar 'livros')
     */
    protected $table = 'livros';

    /**
     * Atributos que podem ser preenchidos em massa (Mass Assignment).
     * Adicione aqui o nome das colunas que você criou na sua Migration.
     */
   protected $fillable = [
    'titulo',
    'autor',
    'ano_publicacao',
    'estoque_total',
    'estoque_disponivel',
];

    /**
     * Defina os relacionamentos, se necessário.
     * Por exemplo, se um livro tiver muitos empréstimos:
     */
    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }
}