<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cadastrar Novo Livro
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">
                
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('livros.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Título do Livro</label>
                        <input type="text" name="titulo" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200" required placeholder="Ex: Dom Casmurro">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Autor</label>
                        <input type="text" name="autor" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200" required placeholder="Ex: Machado de Assis">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Ano de Publicação</label>
                        <input type="number" name="ano_publicacao" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200" required placeholder="Ex: 1899">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Quantidade em Estoque</label>
                        <input type="number" name="estoque_disponivel" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200" required min="1" value="1">
                    </div>

                    <div class="flex items-center justify-end mt-6 border-t border-gray-200 pt-4">
                        <a href="{{ route('livros.index') }}" class="mr-4 text-gray-600 hover:text-gray-900 hover:underline">
                            Cancelar
                        </a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded transition duration-150">
                            Salvar Livro
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>