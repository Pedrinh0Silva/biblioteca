<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Livro;
use App\Models\Cliente;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    public function index()
    {
        // Carrega os relacionamentos para evitar erro de variável vazia na lista
        $emprestimos = Emprestimo::with(['livro', 'cliente'])->get();
        return view('emprestimos.index', compact('emprestimos'));
    }

    public function create()
    {
        // Busca apenas livros com estoque
        $livros = Livro::where('estoque_disponivel', '>', 0)->get();
        // Busca todos os clientes cadastrados
        $clientes = Cliente::all(); 
        
        return view('emprestimos.create', compact('livros', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'livro_id' => 'required|exists:livros,id',
            'cliente_id' => 'required|exists:clientes,id',
        ]);

        $livro = Livro::findOrFail($request->livro_id);

        if ($livro->estoque_disponivel <= 0) {
            return back()->withErrors(['estoque' => 'Livro sem estoque.']);
        }

        Emprestimo::create([
            'cliente_id' => $request->cliente_id,
            'livro_id' => $livro->id,
            'data_emprestimo' => now(),
            'status' => 'pendente',
        ]);

        $livro->decrement('estoque_disponivel');

        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo realizado!');
    }

    public function devolver($id)
    {
        $emprestimo = Emprestimo::findOrFail($id);
        
        if ($emprestimo->status !== 'devolvido') {
            $emprestimo->update([
                'status' => 'devolvido',
                'data_devolucao' => now()
            ]);
            $emprestimo->livro->increment('estoque_disponivel');
        }

        return redirect()->route('emprestimos.index')->with('success', 'Livro devolvido!');
    }
}