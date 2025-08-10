<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Inertia\Inertia;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties = Faculty::active()
            ->with(['studyPrograms' => function ($query) {
                $query->active()->orderBy('name');
            }])
            ->orderBy('name')
            ->get();
        
        return Inertia::render('faculties/index', [
            'faculties' => $faculties
        ]);
    }
}