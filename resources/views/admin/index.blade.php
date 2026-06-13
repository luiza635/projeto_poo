@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-6">

    <h1 class="text-2xl font-bold">Categorias</h1>

    <a href="{{ route('admin.categories.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Nova Categoria
    </a>

</div>

<div class="bg-white rounded-xl shadow p-4">

    <table class="w-full">

        <thead>
            <tr class="border-b text-left">
                <th class="p-2">Nome</th>
                <th class="p-2">Cor</th>
                <th class="p-2">Ordem</th>
                <th class="p-2">Ações</th>
            </tr>
        </thead>

        <tbody>

        @foreach($categories as $cat)

            <tr class="border-b hover:bg-gray-50">

                <td class="p-2 font-semibold">
                    {{ $cat->name }}
                </td>

                <td class="p-2">
                    <span class="px-3 py-1 text-white rounded"
                          style="background: {{ $cat->color ?? '#3b82f6' }}">
                        {{ $cat->color }}
                    </span>
                </td>

                <td class="p-2">
                    {{ $cat->order }}
                </td>

                <td class="p-2 flex gap-3">

                    <a href="{{ route('admin.categories.edit', $cat->id) }}"
                       class="text-blue-600 hover:underline">
                        Editar
                    </a>

                    <form method="POST"
                          action="{{ route('admin.categories.destroy', $cat->id) }}">
                        @csrf
                        @method('DELETE')

                        <button class="text-red-600 hover:underline">
                            Excluir
                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection