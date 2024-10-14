<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\LMS\Homework;
use App\Models\LMS\Lesson;
use App\Models\LMS\Todo;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::with(['student.user'])
            ->whereHas('student', function ($query) {
                $query->whereHas('teacher', function ($query) {
                    $query->where('user_id', Auth::user()->id);
                });
            })
            ->paginate(10);
        $studentNames = [];
        foreach ($lessons as $lesson) {
            $studentNames[$lesson->id] = $lesson->student->user->last_name . ' ' . $lesson->student->user->first_name;
        }
        return view('teacher.lessons.index', compact(['studentNames', 'lessons']));
    }

    /**
     * 授業作成画面
     */
    public function create(int $studentId)
    {
        return view('teacher.lessons.create', compact('studentId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request)
    {
        $lesson = new Lesson();
        $lesson->student_id       = $request->student_id;
        $lesson->lesson_date      = $request->lesson_date;
        $lesson->next_lesson_date = $request->next_lesson_date;
        $lesson->lesson           = $request->lesson;
        $lesson->next_lesson      = $request->next_lesson;
        $lesson->teacher_comment  = $request->teacher_comment;
        $lesson->save();
        return redirect()->route('teacher.showGoalProcessForStudent', [
            'studentId' => $lesson->student_id,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson, int $lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        return view('teacher.lessons.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson, int $lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        $lesson->lesson_date      = $request->lesson_date;
        $lesson->next_lesson_date = $request->next_lesson_date;
        $lesson->lesson           = $request->lesson;
        $lesson->next_lesson      = $request->next_lesson;
        $lesson->teacher_comment  = $request->teacher_comment;
        $lesson->save();
        return redirect()->route('teacher.lessons.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson, int $lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        $lesson->delete();
        return redirect()->route('teacher.lessons.index');
    }
}
