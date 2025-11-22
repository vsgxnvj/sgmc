<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteAccount;
use Illuminate\Support\Facades\Auth;

class SiteAccountController extends Controller
{
     public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'site' => 'required'
        ]);

        SiteAccount::create([
            'user_id' => Auth::id(),
            'username' => $request->username,
            'site' => $request->site,
            'is_pending_for_approval' => 1 // default pending
        ]);

        return back()->with('success', 'Site account submitted. Waiting for approval.');
    }
}
