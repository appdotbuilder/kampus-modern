<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Inertia\Inertia;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = Gallery::orderBy('order')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
            
        $categories = Gallery::select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');
        
        return Inertia::render('gallery/index', [
            'gallery' => $gallery,
            'categories' => $categories
        ]);
    }
}