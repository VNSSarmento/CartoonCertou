<x-main-layout pageTitle="CartoonCertou Perguntas">

    <div id="quiz-screen" class="bg-white rounded-3xl shadow-2xl p-8 max-w-2xl w-full border-8 border-black transform hover:rotate-1 transition-transform">
        <x-question-component :question="$question" :totalQuestions="$totalQuestions" :currentQuestion="$currentQuestion" />

        <div class="space-y-4 mb-6">
            @foreach ($answers as $key => $answer )
                <x-answers-component :answer="$answer" />
            @endforeach
        </div>

        <button class="w-full bg-gradient-to-r from-orange-400 to-pink-500 text-white font-black text-xl py-5 rounded-2xl border-4 border-black shadow-lg hover:shadow-2xl transform hover:scale-105 hover:rotate-2 transition duration-200">
            ➡️ PRÓXIMA PERGUNTA
        </button>
    </div>
</x-main-layout>