<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Essentia Group') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <header class="flex items-center justify-between gap-3 mb-6">
                        <div class="w-full border-b-2 border-[#A0894E]">
                            <h2 class="text-xl font-semibold">
                                <i class="fa-solid fa-users-viewfinder"></i>
                                Clientes cadastrados
                            </h2>
                        </div>
                        <a href="{{ route('incluir-cliente') }}">
                            <button class="bg-[#BAA263] hover:bg-[#A0894E] transition-all py-1 w-[100px] rounded-md font-semibold">Novo</button>
                        </a>
                    </header>
                    <div class="">
                        <table class="w-full">
                            <tr class="border bg-[#BAA263]">
                                <th class="border-r"></th>
                                <th class="border-r">Código</th>
                                <th class="border-r">Nome</th>
                                <th class="border-r">E-mail</th>
                                <th class="border-r">Telefone</th>
                                <th class="border-r"></th>
                            </tr>

                            @foreach ($customers as $customer)
                                <tr>
                                    <td class="border-l border-r px-3 border-b">
                                        <img src="/images/{{ $customer->photo }}" alt="Avatar" class="w-[60px] max-h-[60px] mx-auto">
                                    </td>
                                    <td class="border-r border-b px-3 text-center">{{ $customer->id }}</td>
                                    <td class="border-r border-b px-3">{{ $customer->name; }}</td>
                                    <td class="border-r border-b px-3">{{ $customer->email }}</td>
                                    <td class="border-r border-b px-3 text-center">{{ $customer->phone }}</td>
                                    <td class="border-r border-b px-3">
                                        <div class="flex justify-center gap-3">
                                            <a href="{{ route('editar-cliente', $customer->id) }}">
                                                <i class="fa-regular fa-pen-to-square text-blue-700"></i>
                                            </a>
                                            <form action="{{ route('excluir-cliente') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $customer->id }}">
                                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?');">
                                                    <i class="fa-regular fa-trash-can text-red-500"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
