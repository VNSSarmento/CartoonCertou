<x-main-layout pageTitle="CartoonCertou">

    <div id="start-screen" class="bg-white rounded-3xl shadow-2xl p-8 max-w-md w-full border-8 border-black transform hover:rotate-1 transition-transform">
        <div class="text-center mb-8">
            <div class="text-7xl mb-4 animate-bounce">🎮</div>
            <h1 class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 mb-3" style="text-shadow: 3px 3px 0px rgba(0,0,0,0.2);">
                QUIZ GAME
            </h1>
            <p class="text-xl font-bold text-gray-700">Teste seus conhecimentos!</p>
            @error('questions')
            <p class="text-red-400 font-bold">{{ $message }}</p>
            @enderror
        </div>

        <form method="POST" action="{{ route('prepareGame') }}">
            @csrf
            <div class="mb-6 bg-yellow-100 p-6 rounded-2xl border-4 border-black shadow-lg">

                <label for="questions" class="block text-gray-800 font-black text-lg mb-3">
                    ⭐ Quantas perguntas?
                </label>
                <input
                    name="questions"
                    type="number"
                    value="{{ old('questions',5) }}"
                    class="w-full px-4 py-4 border-4 border-black rounded-xl focus:outline-none focus:ring-4 focus:ring-purple-400 font-bold text-2xl text-center bg-white shadow-lg">
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 text-white font-black text-xl py-5 rounded-2xl border-4 border-black shadow-lg hover:shadow-2xl transform hover:scale-105 hover:-rotate-2 transition duration-200">
                COMEÇAR!
            </button>
        </form>
    </div>

</x-main-layout>