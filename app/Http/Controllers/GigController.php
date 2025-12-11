<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gigs = \App\Models\Gig::orderBy('gig_date', 'desc')->get();
        return view('gigs.index', compact('gigs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gigs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'artist' => 'required',
            'venue' => 'required',
            'gig_date' => 'required|date',
            'football_match_result' => 'nullable|string',
            'football_team_status' => 'nullable|string',
            'cultural_note' => 'nullable|string',
        ]);

        \App\Models\Gig::create($validated);

        return redirect()->route('gigs.index')->with('success', 'Gig logged successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gig = \App\Models\Gig::findOrFail($id);
        return view('gigs.edit', compact('gig'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'artist' => 'required',
            'venue' => 'required',
            'gig_date' => 'required|date',
            'football_match_result' => 'nullable|string',
            'football_team_status' => 'nullable|string',
            'cultural_note' => 'nullable|string',
        ]);

        $gig = \App\Models\Gig::findOrFail($id);
        $gig->update($validated);

        return redirect()->route('gigs.index')->with('success', 'Memory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gig = \App\Models\Gig::findOrFail($id);
        $gig->delete();

        return redirect()->route('gigs.index')->with('success', 'Ticket shredded successfully.');
    }
}
