<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Cadastrar Novo Cliente</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <form action="{{ route('clientes.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Nome Completo</label>
                            <input type="text" name="nome" class="w-full rounded-md border-gray-300 shadow-sm" required placeholder="Ex: João da Silva">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">E-mail</label>
                            <input type="email" name="email" class="w-full rounded-md border-gray-300 shadow-sm" required placeholder="joao@email.com">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Telefone</label>
                            <input type="text" name="telefone" class="w-full rounded-md border-gray-300 shadow-sm" placeholder="(11) 99999-9999">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">CPF</label>
                            <input type="text" name="cpf" class="w-full rounded-md border-gray-300 shadow-sm" placeholder="000.000.000-00">
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end">
                        <a href="{{ route('clientes.index') }}" class="text-gray-600 mr-4">Cancelar</a>
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded shadow">
                            Salvar Cliente
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>