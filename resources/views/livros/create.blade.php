<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pegar Livro Emprestado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('emprestimos.store') }}" method="POST">
                    @csrf

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Selecione o Leitor (Usuário)</label>
                        <select name="user_id" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200" required>
                            <option value="">-- Escolha quem está pegando o livro --</option>
                            @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id }}">
                                    {{ $usuario->name }} ({{ $usuario->email }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-8">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Selecione o Livro</label>
                        <select name="livro_id" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200" required>
                            <option value="">-- Escolha um livro disponível --</option>
                            @foreach($livros as $livro)
                                <option value="{{ $livro->id }}">
                                    {{ $livro->titulo }} (Estoque disponível: {{ $livro->estoque_disponivel }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-end space-x-4 border-t border-gray-200 pt-4">
                        <a href="{{ route('emprestimos.index') }}" class="text-sm text-gray-600 hover:text-gray-900 hover:underline">
                            Cancelar
                        </a>
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded transition duration-150">
                            Confirmar Empréstimo
                        </button>
                    </div>