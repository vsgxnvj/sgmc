<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Card;
use App\Models\Organization;
 use App\Models\Testimony;

class HomeHomeController extends Controller
{
    public function index()
    {
        // testimonies only active ones no pagination
        $testimonies = Testimony::where('is_active', true)->latest()->get();
        $faqs = Faq::all();
        $organization = Organization::first();
        $cards = Card::all();

        // SEO data for the welcome page
        $seo = [
            'title' => 'TEAM HAYAHAY Sabong and Casino Portals',
            'description' => 'TEAM HAYAHAY portals – the only official site to protect players from scams and fake mirror links. Trusted since the WPC era.',
            'keywords' => 'TEAM HAYAHAY, portals, sabong, WPC, scam protection, legit site, online registration, trusted group',
            'image' => asset('images/team-hayahay-logo-1.png'),
        ];

        return view('welcome', compact('organization', 'cards', 'seo', 'faqs', 'testimonies'));
    }
}