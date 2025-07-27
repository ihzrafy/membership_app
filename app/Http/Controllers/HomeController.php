<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestArticles = Article::active()
            ->published()
            ->latest('published_at')
            ->limit(6)
            ->get();

        $latestVideos = Video::active()
            ->published()
            ->latest('published_at')
            ->limit(6)
            ->get();

        return view('home', compact('latestArticles', 'latestVideos'));
    }
}
