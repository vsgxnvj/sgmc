<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Testimony;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonies = Testimony::latest()->paginate(10);
        return view('testimonies.index', compact('testimonies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('testimonies.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'message' => 'required|string',
            'is_active' => 'boolean',
        ]);

        Testimony::create($validated);

        return redirect()->route('testimonies.index')->with('success', 'Testimony created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimony $testimony)
    {
        return view('testimonies.show', compact('testimony'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimony $testimony)
    {
        return view('testimonies.edit', compact('testimony'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimony $testimony)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'message' => 'required|string',
            'is_active' => 'boolean',
        ]);

        $testimony->update($validated);

        return redirect()->route('testimonies.index')->with('success', 'Testimony updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimony $testimony)
    {
        $testimony->delete();

        return redirect()->route('testimonies.index')->with('success', 'Testimony deleted successfully.');
    }
}
