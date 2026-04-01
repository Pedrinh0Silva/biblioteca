<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Novo Empréstimo</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">
                
                <form action="{{ route('emprestimos.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Selecionar Cliente (Leitor)</label>
                        <select name="cliente_id" class="w-full rounded-md border-gray-300 shadow-sm" required>
                            <option value="">-- Escolha o Cliente --</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nome }} (CPF: {{ $cliente->cpf ?? 'N/A' }})</option>
                            @endforeach
                        </select>
                        @if($clientes->isEmpty())
                            <p class="text-red-500 text-sm mt-1">Nenhum cliente cadastrado. <a href="{{ route('clientes.create') }}" class="underline">Cadastre um aqui.</a></p>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Selecionar Livro</label>
                        <select name="livro_id" class="w-full rounded-md border-gray-300 shadow-sm" required>
                            <option value="">-- Escolha o Livro --</option>
                            @foreach($livros as $livro)
                                <option value="{{ $livro->id }}">{{ $livro->titulo }} - Disponível: {{ $livro->estoque_disponivel }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('emprestimos.index') }}" class="mr-4 text-gray-600">Cancelar</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                            Confirmar Empréstimo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>