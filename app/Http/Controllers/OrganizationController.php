<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
    public function index()
    {
        $organization = Organization::first();
        return view('organization.index', compact('organization'));
    }

    public function create()
    {
        return view('organization.create');
    }

    public function store(Request $request)
    {

       
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'url' => 'required|string|max:255',
            'same_as' => 'nullable|array',
            'telephone' => 'nullable|string|max:255',
            'contact_type' => 'nullable|string|max:255',
            'area_served' => 'nullable|string|max:255',
            'language' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('organizations', 'public');
        }

        if(isset($data['same_as'])) {
            $data['same_as'] = json_encode($data['same_as']);
        }

        Organization::create($data);

        return redirect()->route('organization.index')->with('success', 'Organization created successfully.');
    }

    public function edit(Organization $organization)
    {

        return view('organization.edit', compact('organization'));
    }

    public function update(Request $request, Organization $organization)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'url' => 'required|url',
            'same_as' => 'nullable|array',
            'telephone' => 'nullable|string|max:50',
            'contact_type' => 'nullable|string|max:50',
            'area_served' => 'nullable|string|max:50',
            'language' => 'nullable|string|max:50',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('organizations', 'public');
        }

        if(isset($data['same_as'])) {
            $data['same_as'] = json_encode($data['same_as']);
        }

        $organization->update($data);

        return redirect()->route('organization.index')->with('success', 'Organization updated successfully.');
    }
}