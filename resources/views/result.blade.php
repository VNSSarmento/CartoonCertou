<x-main-layout pageTitle="CartoonCertou">

    <div id="results-screen" class="bg-white rounded-3xl shadow-2xl p-8 max-w-md w-full border-8 border-black transform hover:rotate-1 transition-transform">
        <div class="text-center mb-8">
            <div class="text-8xl mb-4 animate-bounce">🏆</div>
            <h2 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 via-orange-500 to-red-500 mb-2" style="text-shadow: 3px 3px 0px rgba(0,0,0,0.2);">
                PARABÉNS!
            </h2>
            <p class="text-xl font-bold text-gray-700">Quiz Finalizado! 🎉</p>
        </div>

        <div class="space-y-4 mb-8">

            <x-card-component colorGradient="blue" colorBg="cyan" colorText="blue">
                <x-slot:title>📊 Total</x-slot:data>
                    <x-slot:data>{{ session('total_questions') }}</x-slot:data>
            </x-card-component>

            <x-card-component colorGradient="green" colorBg="emerald" colorText="green">
                <x-slot:title>✅ Acertos</x-slot:data>
                    <x-slot:data>{{ session('correct_answers') }}</x-slot:data>
            </x-card-component>

            <x-card-component colorGradient="red" colorBg="pink" colorText="red">
                <x-slot:title>❌ Erros</x-slot:data>
                    <x-slot:data>{{ session('wrong_answers') }}</x-slot:data>
            </x-card-component>

            <div class=" {{ 
                $progress <= 60 ? 
                    "bg-gradient-to-r from-pink-300 via-orange-300 to-red-200 rounded-2xl p-8 border-4 border-black shadow-xl transform rotate-2" : 
                    "bg-gradient-to-r from-blue-300 via-green-300 to-blue-200 rounded-2xl p-8 border-4 border-black shadow-xl transform rotate-2"
                    }}
                ">
                <div class="text-center">
                    <span class="block text-gray-900 font-black text-2xl mb-3">⭐ SUA NOTA ⭐</span>
                    <span class=" {{ 
                        $progress <= 60 ? 
                        "text-7xl font-black text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-orange-600" : 
                        "text-7xl font-black text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-green-800" }}" style="text-shadow: 4px 4px 0px rgba(0,0,0,0.1);">
                        {{ $progress }}%
                    </span>
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <a href="{{ route('start') }}" class="w-full cursor-pointer text-center px-6 py-5 border-4 border-black rounded-2xl flex items-center group shadow-lg bg-gradient-to-r from-green-400 to-blue-500 text-white font-black text-xl py-5 rounded-2xl border-4 border-black shadow-lg hover:shadow-2xl transform hover:scale-105 hover:-rotate-2 transition duration-200">
                <span class="w-full h-full text-white font-black text-xl ">
                    🔄 JOGAR DE NOVO
                </span>
            </a>
            <button class="w-full bg-gradient-to-r from-purple-400 to-pink-400 text-white font-black text-xl py-5 rounded-2xl border-4 border-black shadow-lg hover:shadow-2xl transform hover:scale-105 hover:rotate-2 transition duration-200">
                📈 ESTATÍSTICAS
            </button>
            <footer class="text-center font-bold">
                CartoonCertou &copy; {{ date('Y') }}
            </footer>
        </div>
    </div>

</x-main-layout>