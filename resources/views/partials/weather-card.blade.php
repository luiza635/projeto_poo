<!-- CARD: PREVISÃO DO TEMPO -->
<div class="bg-white rounded-2xl shadow overflow-hidden">

    <div class="bg-blue-700 text-white px-4 py-3 font-bold">
        Previsão do Tempo
    </div>

    <div class="p-4">

        <h4 class="font-bold text-gray-800">
            {{ $cidade ?? 'Russas' }}
        </h4>

        <p class="text-sm text-gray-500 mt-1">
            Probabilidade de chuva: {{ $probabilidadeChuva ?? '36%' }} {{ $volumeChuva ?? '0mm' }}
        </p>

        <div class="grid grid-cols-3 gap-2 mt-4 text-center">

            <div>
                <div class="text-3xl">⛅</div>
                <p class="text-xs text-gray-500 mt-1">manhã</p>
            </div>

            <div>
                <div class="text-3xl">⛅</div>
                <p class="text-xs text-gray-500 mt-1">tarde</p>
            </div>

            <div>
                <div class="text-3xl">🌦️</div>
                <p class="text-xs text-gray-500 mt-1">noite</p>
            </div>

        </div>

        <div class="border-t mt-4 pt-3 flex items-end justify-between">
            <span class="text-2xl font-bold text-blue-900">
                {{ $tempMax ?? '32°' }} <span class="text-sm font-normal text-gray-500">max</span>
            </span>
            <span class="text-sm text-gray-400">
                {{ $tempMin ?? '22°' }} min
            </span>
        </div>

        <p class="text-[11px] text-gray-400 mt-3">
            Informações meteorológicas fornecidas por Climatempo
        </p>

    </div>

</div>