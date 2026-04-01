<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Livro:') }} {{ $livro->titulo }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('livros.update', $livro->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Título do Livro</label>
                            <input type="text" name="titulo" value="{{ $livro->titulo }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Autor</label>
                            <input type="text" name="autor" value="{{ $livro->autor }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Ano de Publicação</label>
                            <input type="number" name="ano_publicacao" value="{{ $livro->ano_publicacao }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Estoque Total</label>
                            <input type="number" name="estoque_total" value="{{ $livro->estoque_total }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Estoque Disponível</label>
                            <input type="number" name="estoque_disponivel" value="{{ $livro->estoque_disponivel }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200" required>
                        </div>
                    </div>

                    <div class="flex items-center justify-end space-x-4">
                        <a href="{{ route('livros.index') }}" class="text-sm text-gray-600 hover:underline">
                            Cancelar
                        </a>
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-150">
                            Salvar Alterações
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>