<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * 1. INDEX: Mostra a lista de todos os livros
     */
    public function index()
    {
        // Pega todos os livros do banco de dados (você pode usar ->paginate(10) no futuro)
        $livros = Livro::all();
        
        return view('livros.index', compact('livros'));
    }

    /**
     * 2. CREATE: Abre o formulário de cadastro de um novo livro
     */
    public function create()
    {
        return view('livros.create');
    }

    /**
     * 3. STORE: Recebe os dados do formulário e salva no banco
     */
    public function store(Request $request)
    {
        // Validação de segurança (impede dados em branco ou errados)
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'ano_publicacao' => 'required|integer',
            'estoque_total' => 'required|integer|min:0',
            'estoque_disponivel' => 'required|integer|min:0',
        ]);

        // Salva tudo de uma vez (graças ao $fillable da Model)
        Livro::create($request->all());

        // Redireciona de volta para a tabela com uma mensagem de sucesso invisível (por enquanto)
        return redirect()->route('livros.index')->with('success', 'Livro cadastrado com sucesso!');
    }

    /**
     * 4. EDIT: Abre o formulário de edição com os dados do livro preenchidos
     */
    public function edit($id)
    {
        // findOrFail procura o ID. Se não achar, mostra a tela de Erro 404 automaticamente
        $livro = Livro::findOrFail($id);
        
        return view('livros.edit', compact('livro'));
    }

    /**
     * 5. UPDATE: Recebe os dados do formulário de edição e atualiza no banco
     */
    public function update(Request $request, $id)
    {
        // Mesma validação do store
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'ano_publicacao' => 'required|integer',
            'estoque_total' => 'required|integer|min:0',
            'estoque_disponivel' => 'required|integer|min:0',
        ]);

        $livro = Livro::findOrFail($id);
        $livro->update($request->all());

        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
    }

    /**
     * 6. DESTROY: Exclui o livro do banco de dados
     */
    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();

        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso!');
    }
}