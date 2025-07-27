<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if (!$user) {
            return redirect()->route('login');
        }

        // Get membership limits
        $limits = $user->getMembershipLimits();
        
        // Query articles with membership filtering
        $articlesQuery = Article::active()->published()->orderBy('created_at', 'desc');
        
        // Apply limit based on membership type
        $articlesQuery = $articlesQuery->limit($limits['articles']);
        
        // Get articles as collection
        $articles = $articlesQuery->get();

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        $user = auth()->user();
        
        if (!$user) {
            return redirect()->route('login');
        }

        // Get membership limits
        $limits = $user->getMembershipLimits();
        
        // Get all articles ordered by creation date
        $allArticles = Article::active()->published()->orderBy('created_at', 'desc')->get();
        
        // Find the position of current article in the list
        $articlePosition = $allArticles->search(function($item) use ($article) {
            return $item->id === $article->id;
        });
        
        // Check if user can access this article based on position and membership
        if ($articlePosition !== false && $articlePosition >= $limits['articles']) {
            return redirect()->route('articles.index')
                ->with('error', 'This article is not available for your membership type. Please upgrade to access more content.');
        }

        // Get related articles
        $relatedArticles = Article::active()
            ->published()
            ->where('id', '!=', $article->id)
            ->limit(3)
            ->get();

        return view('articles.show', compact('article', 'relatedArticles'));
    }
}
