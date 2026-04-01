<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Controle de Empréstimos') }}
            </h2>
            <a href="{{ route('emprestimos.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-150">
                + Novo Empréstimo
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Livro</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Usuário</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Data</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($emprestimos as $emprestimo)
                            <tr>
                                <td class="px-6 py-4">{{ $emprestimo->livro->titulo }}</td>
                                <td class="px-6 py-4">{{ $emprestimo->user->name }}</td>
                                <td class="px-6 py-4 text-center">{{ \Carbon\Carbon::parse($emprestimo->data_emprestimo)->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 text-center">
                                    @if($emprestimo->status === 'pendente')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pendente</span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Devolvido</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if($emprestimo->status === 'pendente')
                                        <form action="{{ route('emprestimos.devolver', $emprestimo->id) }}" method="POST" class="inline" onsubmit="return confirm('Confirmar devolução deste livro?');">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-blue-600 hover:text-blue-900 font-bold bg-transparent border-none cursor-pointer">
                                                Devolver
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-400">Finalizado</span>
                                    @endif
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