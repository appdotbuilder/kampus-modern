<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use Inertia\Inertia;

class StudyProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studyPrograms = StudyProgram::active()
            ->with('faculty')
            ->orderBy('name')
            ->paginate(12);
        
        return Inertia::render('study-programs/index', [
            'studyPrograms' => $studyPrograms
        ]);
    }
}