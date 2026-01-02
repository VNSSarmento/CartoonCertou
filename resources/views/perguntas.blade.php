<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Game</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-yellow-300 min-h-screen flex items-center justify-center p-4" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23fbbf24\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
    
    <!-- Tela Inicial -->
    <div id="start-screen" class="bg-white rounded-3xl shadow-2xl p-8 max-w-md w-full border-8 border-black transform hover:rotate-1 transition-transform">
        <div class="text-center mb-8">
            <div class="text-7xl mb-4 animate-bounce">🎮</div>
            <h1 class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 mb-3" style="text-shadow: 3px 3px 0px rgba(0,0,0,0.2);">
                QUIZ GAME
            </h1>
            <p class="text-xl font-bold text-gray-700">Teste seus conhecimentos! 🧠</p>
        </div>
        
        <div class="mb-6 bg-yellow-100 p-6 rounded-2xl border-4 border-black shadow-lg">
            <label class="block text-gray-800 font-black text-lg mb-3">
                ⭐ Quantas perguntas?
            </label>
            <input 
                type="number" 
                min="1" 
                max="20" 
                value="5"
                class="w-full px-4 py-4 border-4 border-black rounded-xl focus:outline-none focus:ring-4 focus:ring-purple-400 font-bold text-2xl text-center bg-white shadow-lg"
            >
        </div>
        
        <button class="w-full bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white font-black text-xl py-5 rounded-2xl border-4 border-black shadow-lg hover:shadow-2xl transform hover:scale-105 hover:-rotate-2 transition duration-200">
            🚀 COMEÇAR!
        </button>
    </div>

    <!-- Tela de Perguntas -->
    <div id="quiz-screen" class="bg-white rounded-3xl shadow-2xl p-8 max-w-2xl w-full hidden border-8 border-black transform hover:rotate-1 transition-transform">
        <div class="mb-6">
            <div class="flex justify-between items-center mb-4">
                <span class="text-lg font-black text-gray-800 bg-blue-200 px-4 py-2 rounded-full border-4 border-black">
                    📝 Pergunta 1 de 5
                </span>
                <span class="bg-yellow-300 text-gray-800 px-4 py-2 rounded-full border-4 border-black font-black text-lg">
                    ⏰ 00:45
                </span>
            </div>
            
            <div class="w-full bg-gray-800 rounded-full h-6 mb-6 border-4 border-black shadow-lg">
                <div class="bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 h-full rounded-full flex items-center justify-end pr-2" style="width: 20%">
                    <span class="text-white font-black text-xs">20%</span>
                </div>
            </div>
        </div>

        <div class="mb-8 bg-gradient-to-r from-purple-200 to-pink-200 p-6 rounded-2xl border-4 border-black shadow-lg">
            <h2 class="text-3xl font-black text-gray-900 mb-2">
                🇧🇷 Qual é a capital do Brasil?
            </h2>
        </div>
        
        <div class="space-y-4 mb-6">
            <button class="w-full text-left px-6 py-5 border-4 border-black rounded-2xl bg-white hover:bg-yellow-100 hover:shadow-xl transform hover:scale-105 hover:-rotate-1 transition duration-200 flex items-center group shadow-lg">
                <span class="w-12 h-12 rounded-full bg-blue-400 text-white flex items-center justify-center font-black text-xl mr-4 border-4 border-black">A</span>
                <span class="text-gray-900 font-bold text-lg">São Paulo</span>
            </button>
            
            <button class="w-full text-left px-6 py-5 border-4 border-black rounded-2xl bg-white hover:bg-yellow-100 hover:shadow-xl transform hover:scale-105 hover:-rotate-1 transition duration-200 flex items-center group shadow-lg">
                <span class="w-12 h-12 rounded-full bg-purple-400 text-white flex items-center justify-center font-black text-xl mr-4 border-4 border-black">B</span>
                <span class="text-gray-900 font-bold text-lg">Rio de Janeiro</span>
            </button>
            
            <button class="w-full text-left px-6 py-5 border-4 border-black rounded-2xl bg-green-300 shadow-xl flex items-center transform rotate-1">
                <span class="w-12 h-12 rounded-full bg-green-500 text-white flex items-center justify-center font-black text-xl mr-4 border-4 border-black">C</span>
                <span class="text-gray-900 font-bold text-lg">Brasília</span>
                <span class="ml-auto text-4xl">✓</span>
            </button>
            
            <button class="w-full text-left px-6 py-5 border-4 border-black rounded-2xl bg-red-300 shadow-xl flex items-center transform -rotate-1">
                <span class="w-12 h-12 rounded-full bg-red-500 text-white flex items-center justify-center font-black text-xl mr-4 border-4 border-black">D</span>
                <span class="text-gray-900 font-bold text-lg">Salvador</span>
                <span class="ml-auto text-4xl">✗</span>
            </button>
            
            <button class="w-full text-left px-6 py-5 border-4 border-black rounded-2xl bg-white hover:bg-yellow-100 hover:shadow-xl transform hover:scale-105 hover:-rotate-1 transition duration-200 flex items-center group shadow-lg">
                <span class="w-12 h-12 rounded-full bg-pink-400 text-white flex items-center justify-center font-black text-xl mr-4 border-4 border-black">E</span>
                <span class="text-gray-900 font-bold text-lg">Belo Horizonte</span>
            </button>
        </div>

        <button class="w-full bg-gradient-to-r from-orange-400 to-pink-500 text-white font-black text-xl py-5 rounded-2xl border-4 border-black shadow-lg hover:shadow-2xl transform hover:scale-105 hover:rotate-2 transition duration-200">
            ➡️ PRÓXIMA PERGUNTA
        </button>
    </div>

    <!-- Tela de Resultados -->
    <div id="results-screen" class="bg-white rounded-3xl shadow-2xl p-8 max-w-md w-full hidden border-8 border-black transform hover:rotate-1 transition-transform">
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