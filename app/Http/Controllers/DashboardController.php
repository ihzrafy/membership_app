<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $limits = $user->getMembershipLimits();
        
        $membershipInfo = [
            'A' => [
                'name' => 'Membership Tipe A',
                'description' => 'Akses 3 Artikel & 3 Video',
                'features' => ['3 Artikel', '3 Video', 'Support Email']
            ],
            'B' => [
                'name' => 'Membership Tipe B', 
                'description' => 'Akses 10 Artikel & 10 Video',
                'features' => ['10 Artikel', '10 Video', 'Support Email', 'Priority Support']
            ],
            'C' => [
                'name' => 'Membership Tipe C',
                'description' => 'Akses Semua Artikel & Video',
                'features' => ['Artikel Unlimited', 'Video Unlimited', 'Support Email', 'Priority Support', '24/7 Chat Support']
            ]
        ];

        return view('dashboard', compact('user', 'limits', 'membershipInfo'));
    }

    public function upgrade(Request $request)
    {
        $request->validate([
            'membership_type' => 'required|in:A,B,C'
        ]);

        $user = auth()->user();
        $user->update([
            'membership_type' => $request->membership_type
        ]);

        return redirect()->back()->with('success', 'Membership berhasil diupgrade!');
    }
}
