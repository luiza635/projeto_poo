<!DOCTYPE html>
<html>
<head>
    <title>Galeria</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

<div class="max-w-6xl mx-auto">

    <div class="flex justify-between mb-6">

        <h1 class="text-2xl font-bold text-blue-900">Galeria</h1>

        <a href="{{ route('gallery.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Nova Imagem
        </a>

    </div>

    <div class="grid grid-cols-3 gap-4">

        @foreach($galleries as $item)

        <div class="bg-white rounded shadow p-3">

            <img src="{{ asset('storage/'.$item->image) }}"
                 class="w-full h-40 object-cover rounded">

            <h2 class="font-bold mt-2">{{ $item->title }}</h2>

            <p class="text-sm text-gray-500">{{ $item->category }}</p>

            <div class="flex gap-2 mt-3">

                <a href="{{ route('gallery.edit', $item->id) }}"
                   class="bg-blue-600 text-white px-3 py-1 rounded text-sm">
                    Editar
                </a>

                <form method="POST"
                      action="{{ route('gallery.destroy', $item->id) }}">
                    @csrf
                    @method('DELETE')

                    <button class="bg-red-500 text-white px-3 py-1 rounded text-sm">
                        Excluir
                    </button>
                </form>

            </div>

        </div>

        @endforeach

    </div>

</div>

</body>
</html>