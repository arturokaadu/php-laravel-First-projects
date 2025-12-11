@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('gigs.index') }}"
                class="text-zinc-500 hover:text-white text-sm font-bold tracking-widest uppercase transition-colors">
                &larr; Back to Timeline
            </a>
        </div>

        <!-- Ticket Generator Card -->
        <div class="bg-zinc-900 rounded-2xl border border-zinc-800 overflow-hidden shadow-2xl relative">
            <!-- Top decorative strip -->
            <div class="h-2 bg-gradient-to-r from-emerald-500 via-zinc-800 to-violet-500"></div>

            <div class="p-8 md:p-12">
                <h2 class="text-4xl font-black text-white mb-2 uppercase italic">Issue New Ticket</h2>
                <p class="text-zinc-500 mb-8">Fill perfectly to capture the moment forever.</p>

                <form action="{{ route('gigs.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Section 1: The Event -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="h-px bg-zinc-800 flex-1"></div>
                            <span class="text-xs font-bold text-emerald-500 uppercase tracking-widest">Event Details</span>
                            <div class="h-px bg-zinc-800 flex-1"></div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-zinc-400 uppercase">Headliner Artist</label>
                                <input type="text" name="artist"
                                    class="w-full bg-zinc-950 border border-zinc-800 rounded-lg p-4 text-white font-bold text-lg focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 transition-all placeholder-zinc-700"
                                    placeholder="e.g. OASIS" required>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-zinc-400 uppercase">Date</label>
                                <input type="date" name="gig_date"
                                    class="w-full bg-zinc-950 border border-zinc-800 rounded-lg p-4 text-white font-bold text-lg focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all"
                                    required>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-bold text-zinc-400 uppercase">Venue / Stadium</label>
                            <input type="text" name="venue"
                                class="w-full bg-zinc-950 border border-zinc-800 rounded-lg p-4 text-white font-bold text-lg focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 transition-all placeholder-zinc-700"
                                placeholder="e.g. WEMBLEY STADIUM" required>
                        </div>
                    </div>

                    <!-- Section 2: The Context -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="h-px bg-zinc-800 flex-1"></div>
                            <span class="text-xs font-bold text-violet-500 uppercase tracking-widest">Context & Vibe</span>
                            <div class="h-px bg-zinc-800 flex-1"></div>
                        </div>

                        <div class="space-y-4">
                            <div class="relative group">
                                <div
                                    class="absolute -inset-0.5 bg-gradient-to-r from-emerald-500 to-violet-500 rounded-lg opacity-20 group-hover:opacity-40 transition duration-1000 blur">
                                </div>
                                <input type="text" name="football_match_result"
                                    class="relative w-full bg-zinc-950 border border-zinc-800 rounded-lg p-4 text-zinc-300 focus:outline-none focus:text-white transition-all placeholder-zinc-700"
                                    placeholder="⚽ Match Result (e.g. Liverpool 4 - 0 Barcelona)">
                            </div>

                            <input type="text" name="football_team_status"
                                class="w-full bg-zinc-950 border border-zinc-800 rounded-lg p-4 text-zinc-300 focus:outline-none focus:border-zinc-700 transition-all placeholder-zinc-700"
                                placeholder="🏆 Team Status (e.g. Champions League Semi-final)">

                            <textarea name="cultural_note" rows="3"
                                class="w-full bg-zinc-950 border border-zinc-800 rounded-lg p-4 text-zinc-300 focus:outline-none focus:border-zinc-700 transition-all placeholder-zinc-700 resize-none font-mono text-sm"
                                placeholder="💬 Cultural/Personal Note (e.g. 'It was raining heavily, felt like 1996')"></textarea>
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit"
                            class="w-full bg-white text-black font-black uppercase tracking-widest py-4 rounded-lg hover:bg-emerald-400 hover:scale-[1.02] transition-all duration-200 shadow-xl">
                            Print Ticket in Memory
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection