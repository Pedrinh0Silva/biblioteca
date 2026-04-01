<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lista de Livros') }}
            </h2>
            
            <a href="{{ route('livros.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-150">
                + Novo Livro
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Título</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Autor</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Ano</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Estoque</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Disponível</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($livros as $livro)
                            <tr>
                                <td class="px-6 py-4">{{ $livro->titulo }}</td>
                                <td class="px-6 py-4">{{ $livro->autor }}</td>
                                <td class="px-6 py-4 text-center">{{ $livro->ano_publicacao }}</td>
                                <td class="px-6 py-4 text-center">{{ $livro->estoque_total }}</td>
                                <td class="px-6 py-4 text-center font-bold text-green-600">{{ $livro->estoque_disponivel }}</td>
                                
                                <td class="px-6 py-4 text-center flex justify-center space-x-4">
                                    <a href="{{ route('livros.edit', $livro->id) }}" class="text-indigo-600 hover:text-indigo-900 font-bold">
                                        Editar
                                    </a>

                                    <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir este livro?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 font-bold cursor-pointer bg-transparent border-none">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>