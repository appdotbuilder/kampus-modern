<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use App\Models\StudyProgram;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('studyProgram.faculty')
            ->orderBy('name')
            ->paginate(10);
        
        return Inertia::render('admin/students/index', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $studyPrograms = StudyProgram::with('faculty')
            ->active()
            ->orderBy('name')
            ->get();
            
        return Inertia::render('admin/students/create', [
            'studyPrograms' => $studyPrograms
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->validated());

        return redirect()->route('admin.students.show', $student)
            ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load('studyProgram.faculty');
        
        return Inertia::render('admin/students/show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $studyPrograms = StudyProgram::with('faculty')
            ->active()
            ->orderBy('name')
            ->get();
            
        return Inertia::render('admin/students/edit', [
            'student' => $student,
            'studyPrograms' => $studyPrograms
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());

        return redirect()->route('admin.students.show', $student)
            ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('admin.students.index')
            ->with('success', 'Student deleted successfully.');
    }
}