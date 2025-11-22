<?php

namespace App\Http\Controllers;
use App\Models\SeoPage;
use Illuminate\Http\Request;

class FrontendSeoPageController extends Controller
{
    // Display list of SEO pages
    public function index(Request $request)
    {
        $query = SeoPage::query();

        // Search by title or category
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%")->orWhere('category', 'like', "%{$search}%");
        }

        $pages = $query->orderBy('id', 'desc')->paginate(10);

        return view('page.index', compact('pages'));
    }

    // Display a single SEO page
    public function show($slug)
    {
        $page = SeoPage::where('slug', $slug)->firstOrFail();

        return view('page.show', compact('page'));
    }
}
