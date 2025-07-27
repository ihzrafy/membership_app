<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if (!$user) {
            return redirect()->route('login');
        }

        // Get membership limits
        $limits = $user->getMembershipLimits();
        
        // Query videos with membership filtering
        $videosQuery = Video::active()->published()->orderBy('created_at', 'desc');
        
        // Apply limit based on membership type
        $videosQuery = $videosQuery->limit($limits['videos']);
        
        // Get videos as collection
        $videos = $videosQuery->get();

        return view('videos.index', compact('videos'));
    }

    public function show(Video $video)
    {
        $user = auth()->user();
        
        if (!$user) {
            return redirect()->route('login');
        }

        // Get membership limits
        $limits = $user->getMembershipLimits();
        
        // Get all videos ordered by creation date
        $allVideos = Video::active()->published()->orderBy('created_at', 'desc')->get();
        
        // Find the position of current video in the list
        $videoPosition = $allVideos->search(function($item) use ($video) {
            return $item->id === $video->id;
        });
        
        // Check if user can access this video based on position and membership
        if ($videoPosition !== false && $videoPosition >= $limits['videos']) {
            return redirect()->route('videos.index')
                ->with('error', 'This video is not available for your membership type. Please upgrade to access more content.');
        }

        // Get related videos (exclude current video)
        $relatedVideos = Video::active()
            ->published()
            ->where('id', '!=', $video->id)
            ->limit(3)
            ->get();

        return view('videos.show', compact('video', 'relatedVideos'));
    }
}
