<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Gallery;
use App\Models\News;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Display the welcome page.
     */
    public function index()
    {
        $featuredNews = News::published()
            ->latest('published_at')
            ->take(3)
            ->get();
            
        $faculties = Faculty::active()
            ->withCount('studyPrograms')
            ->orderBy('name')
            ->get();
            
        $featuredGallery = Gallery::featured()
            ->orderBy('order')
            ->take(6)
            ->get();
        
        return Inertia::render('welcome', [
            'featuredNews' => $featuredNews,
            'faculties' => $faculties,
            'featuredGallery' => $featuredGallery
        ]);
    }
}