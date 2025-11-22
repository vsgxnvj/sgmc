<?php

namespace App\Http\Controllers;

use App\Models\Card;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Card::all();
        return view('cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        $data = $request->validate([
            'status' => 'required|in:online,offline',
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'required|url',
            'reflink' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Handle uploaded file
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Create unique, safe filename
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Move file to /public/uploads
            $file->move(public_path('uploads'), $filename);

            // Save relative path into DB
            $data['image'] = 'uploads/' . $filename;
        }
        
        // Auto-slug
        $data['slug'] = Str::slug($data['title']) . '-' . rand(1000, 9999);

        Card::create($data);

        return redirect()->route('cards.index')->with('success', 'Card created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        return view('cards.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card)
    {
        $data = $request->validate([
            'status' => 'required|in:online,offline',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'required|url',
            'reflink' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Handle new image upload
        if ($request->hasFile('image')) {
            // Delete old file if exists
            if ($card->image && file_exists(public_path($card->image))) {
                unlink(public_path($card->image));
            }

            $file = $request->file('image');

            // Create unique filename
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Move to public/uploads
            $file->move(public_path('uploads'), $filename);

            // Save path in DB
            $data['image'] = 'uploads/' . $filename;
        }

        // Update slug if title changes
        if ($data['title'] !== $card->title) {
            $data['slug'] = Str::slug($data['title']) . '-' . rand(1000, 9999);
        }

        $card->update($data);

        return redirect()->route('cards.index')->with('success', 'Card updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        $card->delete();
        return redirect()->route('cards.index')->with('success', 'Card deleted successfully.');
    }
}