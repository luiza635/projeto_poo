<!DOCTYPE html>
<html>
<head>
    <title>Nova Imagem</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded">

    <h1 class="text-2xl font-bold mb-4">Nova Imagem</h1>

    <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
        @csrf

        <input type="text" name="title" placeholder="Título"
               class="w-full border p-2 mb-3">

        <input type="text" name="category" placeholder="Categoria"
               class="w-full border p-2 mb-3">

        <input type="file" name="image"
               class="w-full border p-2 mb-3">

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Salvar
        </button>

    </form>

</div>

</body>
</html>