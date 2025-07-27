<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    public function showMembershipSelect()
    {
        return view('auth.membership-select');
    }

    public function updateMembership(Request $request)
    {
        $request->validate([
            'membership_type' => 'required|in:A,B,C'
        ]);

        $user = Auth::user();
        $user->update([
            'membership_type' => $request->membership_type
        ]);

        return redirect()->route('dashboard')->with('success', 'Membership type updated successfully! Welcome to Membership Type ' . $request->membership_type);
    }
}
