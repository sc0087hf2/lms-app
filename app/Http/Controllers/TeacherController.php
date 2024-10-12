<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\User;
use App\Models\LMS\Teacher;

use function PHPUnit\Framework\returnSelf;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::with('user')->paginate(10);
        return view('admin.teachers.index', [
            'teachers' => $teachers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('user_type', 'teacher')
            ->whereDoesntHave('teacher')
            ->select('id', 'first_name', 'last_name')
            ->get();
        return view('admin.teachers.create', [
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $teacher = new Teacher();
        $teacher->user_id = $request->user_id;
        $teacher->save();
        return redirect()->route('admin.teachers.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher, int $teacherId)
    {
        $teacher = Teacher::findOrFail($teacherId);
        $teacher->delete();
        return redirect()->route('admin.teachers.index');
    }
}
