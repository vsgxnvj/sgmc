<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashinRequest;
use Illuminate\Support\Facades\Auth;


class CashinRequestController extends Controller
{

    public function create()
{
    return view('cashin-request.cashin');
}



  public function store(Request $request)
{
    $request->validate([
        'username' => 'required',
        'site' => 'required',
        'amount' => 'required|numeric',
        'receipt_img' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $imgName = time().'_'.$request->file('receipt_img')->getClientOriginalName();
    $request->receipt_img->move(public_path('uploads/cashin'), $imgName);

    // dd($request->all());

    CashinRequest::create([
        'user_id' => Auth::id(),
        'username' => $request->username,
        'site' => $request->site,
        'amount' => $request->amount,
        'mode_of_payment' => $request->mode_of_payment,
        'recipient' => $request->recipient,
        'receipt_img' => 'uploads/cashin/'.$imgName,
    ]);

    return back()->with('success', 'Cash-in request submitted!');
}

}
