<?php

namespace App\Http\Controllers;

use App\Models\News;
use Inertia\Inertia;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::published()
            ->with('user')
            ->latest('published_at')
            ->paginate(9);
        
        return Inertia::render('news/index', [
            'news' => $news
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $news = News::where('slug', $slug)
            ->published()
            ->with('user')
            ->firstOrFail();
            
        $relatedNews = News::published()
            ->where('id', '!=', $news->id)
            ->latest('published_at')
            ->take(3)
            ->get();
        
        return Inertia::render('news/show', [
            'news' => $news,
            'relatedNews' => $relatedNews
        ]);
    }
}