<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFacultyRequest;
use App\Http\Requests\UpdateFacultyRequest;
use App\Models\Faculty;
use Inertia\Inertia;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties = Faculty::with('studyPrograms')
            ->orderBy('name')
            ->paginate(10);
        
        return Inertia::render('admin/faculties/index', [
            'faculties' => $faculties
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('admin/faculties/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacultyRequest $request)
    {
        $faculty = Faculty::create($request->validated());

        return redirect()->route('admin.faculties.show', $faculty)
            ->with('success', 'Faculty created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        $faculty->load('studyPrograms', 'lecturers');
        
        return Inertia::render('admin/faculties/show', [
            'faculty' => $faculty
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {
        return Inertia::render('admin/faculties/edit', [
            'faculty' => $faculty
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacultyRequest $request, Faculty $faculty)
    {
        $faculty->update($request->validated());

        return redirect()->route('admin.faculties.show', $faculty)
            ->with('success', 'Faculty updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();

        return redirect()->route('admin.faculties.index')
            ->with('success', 'Faculty deleted successfully.');
    }
}