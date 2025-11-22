<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payout;
use App\Models\Card;

use Illuminate\Support\Facades\Storage;

class PayoutController extends Controller
{
    // Show form & latest payouts
    public function index()
    {
        $cards = Card::all();
        $payouts = Payout::latest()->paginate(10);
        return view('payouts.index', compact('payouts', 'cards'));
    }

    // Store new payout
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'sites' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'img_recibo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date_processed' => 'required|date',
        ]);

        $path = null;
        if ($request->hasFile('img_recibo')) {
            $path = $request->file('img_recibo')->store('public/payouts');
        }

        Payout::create([
            'username' => $request->username,
            'sites' => $request->sites,
            'amount' => $request->amount,
            'img_recibo' => $path ? basename($path) : null,
            'date_processed' => $request->date_processed,
        ]);

        return redirect()->back()->with('success', 'Payout added successfully!');
    }

    public function destroy(Payout $payout)
    {
        // Delete receipt image if exists
        if ($payout->img_recibo && file_exists(storage_path('app/public/payouts/' . $payout->img_recibo))) {
            unlink(storage_path('app/public/payouts/' . $payout->img_recibo));
        }

        $payout->delete();

        return redirect()->back()->with('success', 'Payout deleted successfully!');
    }
}