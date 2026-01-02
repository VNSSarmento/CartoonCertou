<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Game</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-yellow-300 min-h-screen flex items-center justify-center p-4" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23fbbf24\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
    
 <div id="results-screen" class="bg-white rounded-3xl shadow-2xl p-8 max-w-md w-full border-8 border-black transform hover:rotate-1 transition-transform">
        <div class="text-center mb-8">
            <div class="text-8xl mb-4 animate-bounce">🏆</div>
            <h2 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 via-orange-500 to-red-500 mb-2" style="text-shadow: 3px 3px 0px rgba(0,0,0,0.2);">
                PARABÉNS!
            </h2>
            <p class="text-xl font-bold text-gray-700">Quiz Finalizado! 🎉</p>
        </div>

        <div class="space-y-4 mb-8">
            <div class="bg-gradient-to-r from-blue-300 to-cyan-300 rounded-2xl p-5 border-4 border-black shadow-lg transform -rotate-1">
                <div class="flex justify-between items-center">
                    <span class="text-gray-900 font-black text-lg">📊 Total</span>
                    <span class="text-4xl font-black text-blue-900">5</span>
                </div>
            </div>

            <div class="bg-gradient-to-r from-green-300 to-emerald-300 rounded-2xl p-5 border-4 border-black shadow-lg transform rotate-1">
                <div class="flex justify-between items-center">
                    <span class="text-gray-900 font-black text-lg">✅ Acertos</span>
                    <span class="text-4xl font-black text-green-900">4</span>
                </div>
            </div>

            <div class="bg-gradient-to-r from-red-300 to-pink-300 rounded-2xl p-5 border-4 border-black shadow-lg transform -rotate-1">
                <div class="flex justify-between items-center">
                    <span class="text-gray-900 font-black text-lg">❌ Erros</span>
                    <span class="text-4xl font-black text-red-900">1</span>
                </div>
            </div>

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
        </div>
    </div>

</body>
</html>