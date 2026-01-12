<div class="mb-6">
    <div class="flex justify-between items-center mb-4">
        <span class="text-lg font-black text-gray-800 bg-blue-200 px-4 py-2 rounded-full border-4 border-black">
            📝 Pergunta {{ $currentQuestion + 1 }} de {{ $totalQuestions }}
        </span>
        {{--  
        <span class="bg-yellow-300 text-gray-800 px-4 py-2 rounded-full border-4 border-black font-black text-lg">
            ⏰ 00:45
        </span>
        --}}
    </div>

    <div class="w-full bg-gray-800 rounded-full h-6 mb-6 border-4 border-black shadow-lg">
        <div class="bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 h-full rounded-full flex items-center justify-end pr-2 w-[{{ $progress }}%]">
            <span class="text-white font-black text-xs">{{ $progress}}%</span>
        </div>
    </div>
</div>

<div class="mb-8 bg-gradient-to-r from-purple-200 to-pink-200 p-6 rounded-2xl border-4 border-black shadow-lg">
    <h2 class="text-3xl font-black text-gray-900 mb-2">
     Qual é a capital de <span class="text-3xl font-black text-green-700 mb-2">{{ ucfirst($question) }}</span> ?
    </h2>
</div>