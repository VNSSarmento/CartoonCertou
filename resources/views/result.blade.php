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
                <x-slot:data>5</x-slot:data>
            </x-card-component>
            
            <x-card-component colorGradient="green" colorBg="emerald" colorText="green">
                <x-slot:title>✅ Acertos</x-slot:data>
                <x-slot:data>4</x-slot:data>
            </x-card-component>
            
            <x-card-component colorGradient="red" colorBg="pink" colorText="red">
                <x-slot:title>❌ Erros</x-slot:data>
                <x-slot:data>4</x-slot:data>
            </x-card-component>
            
            <div class="bg-gradient-to-r from-yellow-300 via-orange-300 to-yellow-300 rounded-2xl p-8 border-4 border-black shadow-xl transform rotate-2">
                <div class="text-center">
                    <span class="block text-gray-900 font-black text-2xl mb-3">⭐ SUA NOTA ⭐</span>
                    <span class="text-7xl font-black text-transparent bg-clip-text bg-gradient-to-r from-yellow-600 to-orange-600" style="text-shadow: 4px 4px 0px rgba(0,0,0,0.1);">
                        80%
                    </span>
                </div>
            </div>
        </div>
        
        <div class="space-y-4">
            <button class="w-full bg-gradient-to-r from-green-400 to-blue-500 text-white font-black text-xl py-5 rounded-2xl border-4 border-black shadow-lg hover:shadow-2xl transform hover:scale-105 hover:-rotate-2 transition duration-200">
                🔄 JOGAR DE NOVO
            </button>
            <button class="w-full bg-gradient-to-r from-purple-400 to-pink-400 text-white font-black text-xl py-5 rounded-2xl border-4 border-black shadow-lg hover:shadow-2xl transform hover:scale-105 hover:rotate-2 transition duration-200">
                📈 ESTATÍSTICAS
            </button>
            <footer class="text-center font-bold">
                CartoonCertou &copy; {{ date('Y') }}
            </footer>
        </div>
    </div>

</x-main-layout>