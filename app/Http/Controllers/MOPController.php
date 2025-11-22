<?php

namespace App\Http\Controllers;

use App\Models\MOP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MOPController extends Controller
{
     public function index()
    {
        $mops = MOP::all();
        return view('mop.index', compact('mops'));
    }

    public function create()
    {
        return view('mop.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'type_of_account' => 'required|string|max:255',
            'isactive' => 'boolean',
            'image_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:10240', // max 10mb
            'image_qr' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        // Upload files
        if ($request->hasFile('image_logo')) {
            $validated['image_logo'] = $request->file('image_logo')->store('mop/logo', 'public');
        }

        if ($request->hasFile('image_qr')) {
            $validated['image_qr'] = $request->file('image_qr')->store('mop/qr', 'public');
        }

        MOP::create($validated);

        return redirect()->route('mop.index')->with('success', 'Mode of Payment added successfully!');
    }

    public function edit(MOP $mop)
    {
        return view('mop.edit', compact('mop'));
    }

    public function update(Request $request, MOP $mop)
    {
        $validated = $request->validate([
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'type_of_account' => 'required|string|max:255',
            'isactive' => 'boolean',
            'image_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_qr' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image_logo')) {
            if ($mop->image_logo) Storage::disk('public')->delete($mop->image_logo);
            $validated['image_logo'] = $request->file('image_logo')->store('mop/logo', 'public');
        }

        if ($request->hasFile('image_qr')) {
            if ($mop->image_qr) Storage::disk('public')->delete($mop->image_qr);
            $validated['image_qr'] = $request->file('image_qr')->store('mop/qr', 'public');
        }

        $mop->update($validated);

        return redirect()->route('mop.index')->with('success', 'Mode of Payment updated successfully!');
    }

    public function destroy(MOP $mop)
    {
        if ($mop->image_logo) Storage::disk('public')->delete($mop->image_logo);
        if ($mop->image_qr) Storage::disk('public')->delete($mop->image_qr);

        $mop->delete();

        return redirect()->route('mop.index')->with('success', 'Mode of Payment deleted successfully!');
    }
}
