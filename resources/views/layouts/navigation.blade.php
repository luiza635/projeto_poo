<x-app-layout>

    <!-- HEADER -->
    <div class="bg-blue-900 text-white px-6 py-3 flex justify-between items-center">

        <div class="text-lg font-bold">g2</div>

        <div class="flex items-center gap-4 text-sm">

            @auth
                <span>{{ auth()->user()->name }} (Jornalista)</span>
            @endauth

            @guest
                <a href="/login" class="underline">Entrar</a>
            @endguest

        </div>

    </div>

    <!-- MENU -->
    <div class="bg-blue-800 text-white px-6 py-2 flex gap-6 text-sm">

        <a href="/jornalista">Início</a>
        <a href="/jornalista/materias">Matérias</a>
        <a href="/jornalista/categorias">Categorias</a>
        <a href="/jornalista/galeria">Galeria</a>

    </div>

    <!-- CONTENT -->
    <div class="p-6 bg-gray-100 min-h-screen">

        <div class="bg-blue-700 text-white p-3 rounded mb-6 text-sm">
            AO VIVO • Sistema de notícias ativo
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- PRINCIPAL -->
            <div class="lg:col-span-2 space-y-6">

                <div class="bg-white rounded shadow overflow-hidden">

                    <img class="w-full h-64 object-cover"
                         src="https://images.unsplash.com/photo-1520607162513-77705c0f0d4a">

                    <div class="p-4">

                        <h2 class="font-bold text-xl">
                            Governo anuncia pacote de infraestrutura
                        </h2>

                        <p class="text-gray-600 text-sm mt-2">
                            Destaque principal do portal de notícias.
                        </p>

                    </div>

                </div>

                <!-- CARDS -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div class="bg-white p-4 rounded shadow">
                        <h3 class="font-bold">Tecnologia</h3>
                        <p class="text-sm text-gray-600">
                            Meta lança novos óculos com IA
                        </p>
                    </div>

                    <div class="bg-white p-4 rounded shadow">
                        <h3 class="font-bold">Esportes</h3>
                        <p class="text-sm text-gray-600">
                            Brasil vence Argentina
                        </p>
                    </div>

                </div>

            </div>

            <!-- SIDEBAR -->
            <div class="space-y-4">

                <div class="bg-white p-4 rounded shadow">
                    <h3 class="font-bold mb-2">Mais lidas</h3>

                    <ul class="text-sm space-y-2 text-gray-700">
                        <li>Reforma tributária aprovada</li>
                        <li>Vacina com 94% eficácia</li>
                        <li>Selic mantida em 10,75%</li>
                    </ul>
                </div>

                <div class="bg-white p-4 rounded shadow">

                    <h3 class="font-bold mb-2">Ações rápidas</h3>

                    <a href="/jornalista/materias"
                       class="block bg-blue-600 text-white text-center py-2 rounded mb-2">
                        Nova Matéria
                    </a>

                    <a href="/jornalista/categorias"
                       class="block bg-gray-800 text-white text-center py-2 rounded">
                        Categorias
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>