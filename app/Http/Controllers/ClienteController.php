<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Lista todos os clientes cadastrados.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Mostra o formulário de criação.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Salva um novo cliente no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome'     => 'required|string|max:255',
            'email'    => 'required|email|unique:clientes,email',
            'telefone' => 'nullable|string|max:20',
            'cpf'      => 'nullable|string|unique:clientes,cpf',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    /**
     * Mostra o formulário de edição.
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Atualiza os dados do cliente.
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $request->validate([
            'nome'     => 'required|string|max:255',
            'email'    => 'required|email|unique:clientes,email,' . $id,
            'telefone' => 'nullable|string|max:20',
            'cpf'      => 'nullable|string|unique:clientes,cpf,' . $id,
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Dados do cliente atualizados!');
    }

    /**
     * Remove um cliente do sistema.
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        
        // Opcional: Verificar se o cliente tem empréstimos ativos antes de deletar
        if ($cliente->emprestimos()->where('status', 'pendente')->exists()) {
            return back()->withErrors(['erro' => 'Não é possível excluir um cliente com empréstimos pendentes.']);
        }

        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente removido com sucesso!');
    }
}