@extends('layouts.app')

@section('content')
    <div
        class="mb-8 flex justify-between items-center bg-zinc-900/50 p-4 rounded-xl border border-zinc-800 backdrop-blur-sm">
        <h2 class="text-2xl font-black text-white italic tracking-tighter">MY TIMELINE</h2>
        <div class="text-xs font-mono text-zinc-500">
            // TOTAL MEMORIES: {{ $gigs->count() }}
        </div>
    </div>

    <div class="space-y-8 relative">
        <!-- Vertical Line (The Timeline) -->
        <div
            class="absolute left-8 top-0 bottom-0 w-0.5 bg-gradient-to-b from-emerald-500/20 via-violet-500/20 to-transparent md:left-1/2 md:-ml-px">
        </div>

        @forelse($gigs as $gig)
            <div class="relative group my-6 transform hover:-translate-y-1 transition-transform duration-300">
                <!-- Neon Glow Border -->
                <div
                    class="absolute -inset-0.5 bg-gradient-to-r from-emerald-500 to-violet-500 rounded-2xl opacity-40 group-hover:opacity-100 blur transition duration-500">
                </div>

                <!-- Ticket Content -->
                <div class="relative flex flex-col md:flex-row bg-zinc-900 rounded-2xl overflow-hidden">

                    <!-- Left Stub (Date) -->
                    <div
                        class="bg-zinc-950 p-6 flex flex-col justify-center items-center border-b md:border-b-0 md:border-r-2 border-dashed border-zinc-800 w-full md:w-40 relative">
                        <!-- Punch holes -->
                        <div
                            class="absolute -left-2 top-1/2 -mt-3 w-4 h-6 bg-zinc-950 rounded-r-full border-r border-zinc-800 z-10">
                        </div>
                        <div class="absolute -right-2 top-1/2 -mt-3 w-4 h-6 bg-zinc-900 rounded-l-full z-10 hidden md:block">
                        </div>

                        <span
                            class="text-zinc-500 text-xs font-bold uppercase tracking-widest">{{ \Carbon\Carbon::parse($gig->gig_date)->format('Y') }}</span>
                        <span
                            class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-tr from-emerald-400 to-violet-500 my-1">{{ \Carbon\Carbon::parse($gig->gig_date)->format('d') }}</span>
                        <span
                            class="text-emerald-400 font-bold uppercase tracking-wider text-sm border-t border-zinc-800 pt-2 w-full text-center">{{ \Carbon\Carbon::parse($gig->gig_date)->format('M') }}</span>
                    </div>

                    <!-- Right Content -->
                    <div class="flex-1 p-6 relative bg-zinc-900">
                        <!-- BG Pattern -->
                        <div class="absolute inset-0 opacity-[0.03]"
                            style="background-image: radial-gradient(#6366f1 1px, transparent 1px); background-size: 16px 16px;">
                        </div>

                        <!-- Header -->
                        <div class="flex justify-between items-start mb-6 relative z-10">
                            <div>
                                <h3 class="text-3xl font-black text-white leading-none uppercase italic tracking-tight">
                                    {{ $gig->artist }}
                                </h3>
                                <div class="flex items-center gap-2 mt-2 text-zinc-400">
                                    <svg class="w-4 h-4 text-violet-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="font-bold text-sm tracking-wide">{{ $gig->venue }}</span>
                                </div>
                            </div>
                            <!-- Actions Container -->
                            <div class="absolute top-0 right-0 z-20 opacity-0 group-hover:opacity-100 transition-opacity flex">
                                <!-- Edit Button -->
                                <a href="{{ route('gigs.edit', $gig->id) }}" class="text-zinc-600 hover:text-orange-500 p-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                        </path>
                                    </svg>
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('gigs.destroy', $gig->id) }}" method="POST"
                                    class="inline-block delete-form" id="delete-form-{{ $gig->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="text-zinc-600 hover:text-red-500 p-2 transition-colors relative z-30"
                                        onclick="openDeleteModal('{{ $gig->id }}')">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Football Strip -->
                        <div
                            class="bg-zinc-950/50 rounded-xl p-4 border border-zinc-800/50 flex flex-col md:flex-row gap-4 relative overflow-hidden">
                            <!-- Background Pattern -->
                            <div class="absolute inset-0 opacity-5"
                                style="background-image: repeating-linear-gradient(45deg, transparent, transparent 10px, #10b981 10px, #10b981 20px);">
                            </div>

                            @if($gig->match_result)
                                <div class="flex-1 relative z-10">
                                    <span class="text-[10px] uppercase font-bold text-emerald-500 tracking-widest mb-1 block">Match
                                        Day Result</span>
                                    <div class="font-black text-xl text-zinc-200">{{ $gig->match_result }}</div>
                                </div>
                            @endif

                            @if($gig->football_team_status)
                                <div
                                    class="flex-1 relative z-10 border-t md:border-t-0 md:border-l border-zinc-800/50 pt-3 md:pt-0 md:pl-4">
                                    <span class="text-[10px] uppercase font-bold text-zinc-500 tracking-widest mb-1 block">Team
                                        Status</span>
                                    <div class="text-sm font-medium text-zinc-300 italic">"{{ $gig->football_team_status }}"</div>
                                </div>
                            @endif
                        </div>

                        <!-- Cultural Tweet/Note -->
                        @if($gig->cultural_note)
                            <div class="mt-4 flex gap-3 items-start opacity-70 group-hover:opacity-100 transition-opacity">
                                <span class="text-violet-500 mt-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                                        </path>
                                    </svg>
                                </span>
                                <p class="text-xs text-zinc-400 font-mono leading-relaxed">
                                    {{ Str::limit($gig->cultural_note, 120) }}
                                </p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-32">
                <div class="text-6xl mb-4 opacity-20">🎫</div>
                <h3 class="text-2xl font-bold text-zinc-700">No tickets found</h3>
                <p class="text-zinc-600 mb-8">Start your collection by logging a memory.</p>
                <a href="{{ route('gigs.create') }}"
                    class="inline-block border border-emerald-500 text-emerald-500 hover:bg-emerald-500 hover:text-white font-bold py-3 px-8 rounded-full transition-all">
                    Generate First Ticket
                </a>
            </div>
        @endforelse
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-black bg-opacity-75 transition-opacity" aria-hidden="true"
                onclick="closeDeleteModal()"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div
                class="inline-block align-bottom bg-zinc-900 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-zinc-800">
                <div class="bg-zinc-900 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-900/30 sm:mx-0 sm:h-10 sm:w-10 border border-red-500/30">
                            <svg class="h-6 w-6 text-red-500" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-white" id="modal-title">
                                Burn this ticket?
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-zinc-400">
                                    Are you sure you want to delete this memory? This action cannot be undone.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-zinc-900/50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-zinc-800">
                    <button type="button" id="confirmDeleteBtn"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Confirm Delete
                    </button>
                    <button type="button" onclick="closeDeleteModal()"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-zinc-700 shadow-sm px-4 py-2 bg-zinc-800 text-base font-medium text-zinc-300 hover:bg-zinc-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let gigIdsToDelete = null;

        function openDeleteModal(gigId) {
            gigIdsToDelete = gigId;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            gigIdsToDelete = null;
        }

        document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
            if (gigIdsToDelete) {
                document.getElementById('delete-form-' + gigIdsToDelete).submit();
            }
        });
    </script>
@endsection