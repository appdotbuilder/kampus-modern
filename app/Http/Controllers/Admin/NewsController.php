<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use Inertia\Inertia;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return Inertia::render('admin/news/index', [
            'news' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('admin/news/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        
        if ($data['status'] === 'published') {
            $data['published_at'] = now();
        }

        $news = News::create($data);

        return redirect()->route('admin.news.show', $news)
            ->with('success', 'News created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $news->load('user');
        
        return Inertia::render('admin/news/show', [
            'news' => $news
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return Inertia::render('admin/news/edit', [
            'news' => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $data = $request->validated();
        
        if ($data['status'] === 'published' && $news->status !== 'published') {
            $data['published_at'] = now();
        }

        $news->update($data);

        return redirect()->route('admin.news.show', $news)
            ->with('success', 'News updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'News deleted successfully.');
    }
}