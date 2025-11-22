<?php

namespace App\Http\Controllers;

use App\Models\SeoPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SeoPageController extends Controller
{
    public function index()
    {
        $pages = SeoPage::all();
        return view('seopages.index', compact('pages'));
    }

    public function create()
    {
        return view('seopages.create');
    }

    public function show($id)
    {
        $page = SeoPage::findOrFail($id);
        return view('seopages.show', compact('page'));
    }

    public function store(Request $request)
    {
        // Validate the form input
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:seo_pages,slug', // unique for new records
            'meta_description' => 'nullable|string|max:255',
            'focus_keywords' => 'nullable|string|max:255',
            'secondary_keywords' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string|max:255',
            'og_image' => 'nullable|string|max:255',
            'twitter_title' => 'nullable|string|max:255',
            'twitter_description' => 'nullable|string|max:255',
            'twitter_image' => 'nullable|string|max:255',
            'h1' => 'nullable|string|max:255',
            'full_description' => 'nullable|string',
            'faq_schema' => 'nullable|string',
            'json_ld' => 'nullable|string',
            'gallery' => 'nullable|json',
            'alt_texts' => 'nullable|json',
            'video' => 'nullable|string|max:255',
            'registration_type' => 'nullable|string|max:255',
            'cashin_method' => 'nullable|string|max:255',
            'cashout_method' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'plasada' => 'nullable|string|max:255',
            'agent_contact_link' => 'nullable|string|max:255',
        ]);

        // Create the new page
        SeoPage::create($data);

        // Redirect back with success message
        return redirect()->route('pages.index')->with('success', 'SEO page created successfully!');
    }

    public function edit($id)
    {
        $page = SeoPage::findOrFail($id); // fetch the page or 404
        return view('seopages.edit', compact('page')); // pass $page to the view
    }

    public function update(Request $request, $id)
    {
        // Validate inputs
        // Validate all inputs
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:seo_pages,slug,' . $id,
            'meta_description' => 'nullable|string|max:255',
            'focus_keywords' => 'nullable|string|max:255',
            'secondary_keywords' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string|max:255',
            'og_image' => 'nullable|string|max:255',
            'twitter_title' => 'nullable|string|max:255',
            'twitter_description' => 'nullable|string|max:255',
            'twitter_image' => 'nullable|string|max:255',
            'h1' => 'nullable|string|max:255',
            'full_description' => 'nullable|string',
            'faq_schema' => 'nullable|string',
            'json_ld' => 'nullable|string',
            'gallery' => 'nullable|json',
            'alt_texts' => 'nullable|json',
            'video' => 'nullable|string|max:255',
            'registration_type' => 'nullable|string|max:255',
            'cashin_method' => 'nullable|string|max:255',
            'cashout_method' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'plasada' => 'nullable|string|max:255',
            'agent_contact_link' => 'nullable|string|max:255',
        ]);

        // Static-style update using query builder
        SeoPage::where('id', $id)->update($data);

        return redirect()->route('pages.index')->with('success', 'SEO page updated successfully!');

    }

    public function destroy(SeoPage $seoPage)
    {
        $seoPage->delete();
        return redirect()->route('pages.index')->with('success', 'SEO page deleted successfully!');
    }
}
