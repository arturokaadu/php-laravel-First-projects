@extends('layouts.app')

@section('content')
    <div class="min-h-[80vh] flex flex-col justify-center items-center text-center">
        <!-- Hero Section -->
        <div class="mb-12 relative">
            <h1 class="text-6xl md:text-8xl font-black text-white mb-6 tracking-tighter uppercase italic">
                Where <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-emerald-600">Legends</span><br>
                Meet <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-400 to-violet-600">Live
                    Music</span>
            </h1>

            <div
                class="max-w-2xl mx-auto bg-zinc-900/50 backdrop-blur-sm border border-zinc-800 rounded-2xl p-6 mb-8 transform hover:scale-105 transition-transform duration-500">
                <p class="text-zinc-300 text-lg mb-4 leading-relaxed">
                    Welcome to <strong class="text-white">Gigs & Goals</strong>.
                    The only place where the roar of the stadium meets the bass of the concert hall.
                    Log your memories, track your team, and build your legacy.
                </p>
                <p class="text-zinc-500 text-sm font-mono">
                    // System Status: READY | MODE: LEGACY_BUILDER
                </p>
            </div>

            <div class="mt-12">
                <a href="{{ route('gigs.index') }}" class="relative inline-flex group">
                    <div
                        class="absolute transition-all duration-1000 opacity-70 -inset-px bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E] rounded-xl blur-lg group-hover:opacity-100 group-hover:-inset-1 group-hover:duration-200 animate-tilt">
                    </div>
                    <button
                        class="relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-200 bg-zinc-900 font-pj rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                        ENTER TIMELINE &rarr;
                    </button>
                </a>
            </div>
        </div>

        <!-- Quotes (Dynamic) -->
        <div
            class="grid md:grid-cols-2 gap-12 max-w-4xl mx-auto opacity-60 hover:opacity-100 transition-opacity duration-500">
            @foreach($quotes as $quote)
                <div
                    class="border-l-4 {{ $quote->category == 'football' ? 'border-emerald-500' : 'border-violet-500' }} pl-6 text-left">
                    <p class="text-2xl text-zinc-200 font-serif italic mb-3">"{{ $quote->content }}"</p>
                    <p
                        class="{{ $quote->category == 'football' ? 'text-emerald-500' : 'text-violet-500' }} font-bold text-sm tracking-widest uppercase">
                        — {{ $quote->author }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection