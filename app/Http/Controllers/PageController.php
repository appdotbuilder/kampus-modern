<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Inertia\Inertia;

class PageController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)
            ->published()
            ->firstOrFail();
        
        return Inertia::render('page', [
            'page' => $page
        ]);
    }
}