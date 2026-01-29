<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\CampaignEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MarketingController extends Controller
{
    public function index()
    {
        // Simple authorization check (In real app, use Gate/Policy)
        if (auth()->user()->email !== 'admin@membership.com') {
             return redirect()->route('dashboard')->with('error', 'Unauthorized access.');
        }

        $stats = [
            'total_users' => User::count(),
            'type_A' => User::where('membership_type', 'A')->count(),
            'type_B' => User::where('membership_type', 'B')->count(),
            'type_C' => User::where('membership_type', 'C')->count(),
        ];

        return view('marketing.dashboard', compact('stats'));
    }

    public function sendCampaign(Request $request)
    {
        if (auth()->user()->email !== 'admin@membership.com') {
            abort(403);
        }

        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'target' => 'required|in:all,A,B,C'
        ]);

        $query = User::query();

        if ($request->target !== 'all') {
            $query->where('membership_type', $request->target);
        }

        $users = $query->get();
        $count = 0;

        // In production, this should be dispatched to a Job Queue!
        // For simple demo, we iterate (might be slow for many users)
        foreach ($users as $user) {
            // Use try-catch to avoid crashing if mail is not configured
            try {
                Mail::to($user->email)->send(new CampaignEmail($request->subject, $request->message));
                $count++;
            } catch (\Exception $e) {
                // Log error but continue
                \Log::error("Failed to send email to {$user->email}: " . $e->getMessage());
            }
        }

        return redirect()->back()->with('success', "Campaign terkirim ke $count user!");
    }
}
