@php
    //vai tranformar em verde se acertar e vai transformar em vermelho se errar, ai se o padrao é a cor normal
    $containerClasses = match ($answer['state']) {
        'correct' => 'bg-green-300 shadow-xl transform rotate-1',
        'wrong'   => 'bg-red-300 shadow-xl transform -rotate-1',
        default   => 'bg-white hover:bg-yellow-100 hover:shadow-xl transform hover:scale-105 hover:-rotate-1 transition duration-200',
    };

    $badgeClasses = match ($answer['label']) {
        'A' => 'bg-blue-400',
        'B' => 'bg-purple-400',
        'C' => 'bg-green-400',
        'D' => 'bg-red-400',
        default => 'bg-gray-400',
    };

    $icon = match ($answer['state']) {
        'correct' => '✓',
        'wrong'   => '✗',
        default   => null,
    };
@endphp


<a href="{{ route('answer',Crypt::encryptString($answer['text'])) }}" class="w-full cursor-pointer text-left px-6 py-5 border-4 border-black rounded-2xl flex items-center group shadow-lg {{ $containerClasses }}">
    
    <span class="w-12 h-12 rounded-full text-white flex items-center justify-center font-black text-xl mr-4 border-4 border-black {{ $badgeClasses }}">
        {{ $answer['label'] }}
    </span>

    <span class="text-gray-900 font-bold text-lg">
        {{ $answer['text'] }}
    </span>

    @if ($icon)
        <span class="ml-auto text-4xl">
            {{ $icon }}
        </span>
    @endif
</a>
