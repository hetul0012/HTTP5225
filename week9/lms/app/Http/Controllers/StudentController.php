<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager-load courses so you can show them in the list without N+1 queries
        return view('students.index', [
            'students' => Student::with('courses')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::orderBy('name')->get();
        return view('students.create', ['courses' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        // Validate checkbox input for many-to-many
        $request->validate([
            'courses'   => ['nullable', 'array'],
            'courses.*' => ['integer', 'exists:courses,id'],
        ]);

        // Create the student from your FormRequest rules
        $student = Student::create($request->validated());

        // Attach selected courses (if any)
        $student->courses()->sync($request->input('courses', []));

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load('courses');
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $courses  = Course::orderBy('name')->get();
        $selected = $student->courses()->pluck('courses.id')->toArray();

        return view('students.edit', compact('student', 'courses', 'selected'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        // Validate checkbox input for many-to-many
        $request->validate([
            'courses'   => ['nullable', 'array'],
            'courses.*' => ['integer', 'exists:courses,id'],
        ]);

        // Update basic fields from your FormRequest
        $student->update($request->validated());

        // Sync selected courses (if none selected, detach all)
        $student->courses()->sync($request->input('courses', []));

        return redirect()->route('students.index')->with('success', 'Student updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
