<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\LMS\Student;
use App\Models\LMS\Teacher;
use App\Models\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('user')->paginate(10);
        return view('admin.students.index', [
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('user_type', 'student')
            ->whereDoesntHave('student')
            ->select('id', 'first_name', 'last_name')
            ->get();
        $teachers = Teacher::all();
        return view('admin.students.create', [
            'users' => $users,
            'teachers' => $teachers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $student = new Student();
        $student->user_id = $request->user_id;
        $student->teacher_id = $request->teacher_id;
        $student->guardian = $request->guardian;
        $student->phone_number = $request->phone_number;
        $student->school = $request->school;
        $student->school_year = $request->school_year;
        $student->desired_school = $request->desired_school;
        $student->save();
        return redirect()->route('admin.students.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student, int $studentId)
    {
        $student = Student::findOrFail($studentId);
        $teachers = Teacher::all();
        return view('admin.students.edit', [
            'student' => $student,
            'teachers' => $teachers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student, int $studentId)
    {
        $student = Student::findOrFail($studentId);
        $student->user_id = $request->user_id;
        $student->teacher_id = $request->teacher_id;
        $student->guardian = $request->guardian;
        $student->phone_number = $request->phone_number;
        $student->school = $request->school;
        $student->school_year = $request->school_year;
        $student->desired_school = $request->desired_school;
        $student->save();
        return redirect()->route('admin.students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student, int $studentId)
    {
        $student = Student::findOrFail($studentId);
        $student->delete();
        return redirect()->route('admin.students.index');
    }
}
