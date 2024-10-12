<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreHomeworkRequest;
use App\Http\Requests\UpdateHomeworkRequest;
use App\Models\LMS\Homework;
use App\Models\LMS\Lesson;
use App\Models\LMS\Todo;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homework = Homework::with(['lesson'])
            ->whereHas('lesson', function ($query) {
                $query->whereHas('student', function ($query) {
                    $query->whereHas('teacher', function ($query) {
                        $query->where('user_id', Auth::user()->id);
                    });
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        $next_lesson_dates = [];
        $studentNames       = [];
        foreach ($homework as $work) {
            $next_lesson_dates[$work->id] = $work->lesson->next_lesson_date;
            $studentNames[$work->id]       = $work->lesson->student->user->last_name . ' ' . $work->lesson->student->user->first_name;
        }
        return view('teacher.homework.index', compact(['homework', 'next_lesson_dates', 'studentNames']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = Auth::user()->id;

        $lessons = Lesson::where('next_lesson_date', '>=', now())
            ->whereHas('student.teacher', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->get();

        $todos = Todo::where('is_achievement', 0)
            ->whereHas('goal.student.teacher', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->get();

        $studentNames = [];
        foreach ($lessons as $lesson) {
            $studentNames[$lesson->id] = $lesson->student->user->last_name . ' ' . $lesson->student->user->first_name;
        }

        return view('teacher.homework.create', compact('studentNames', 'lessons', 'todos'));
    }

    /**
     * 授業が選択された状態の宿題作成画面表示
     */
    public function createHomeworkForLesson(int $lessonId)
    {
        $lesson = Lesson::with('student.user')->findOrFail($lessonId);
        $studentId = $lesson->student_id;
        $studentName = $lesson->student->user->last_name . ' ' . $lesson->student->user->first_name;
        $todos = Todo::where('is_achievement', 0)
            ->whereHas('goal', function ($query) use ($studentId) {
                $query->where('student_id', $studentId);
            })
            ->get();
        return view('teacher.homework.create-homework-for-student', compact('studentId', 'studentName', 'lesson', 'todos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHomeworkRequest $request)
    {
        $lesson_id = $request->input('lesson_id');
        $homeworks = $request->input('homework');

        foreach ($homeworks as $index => $homeworkText) {
            $homework = new Homework();
            $homework->lesson_id = $lesson_id;
            $homework->todo_id   = $request->todo_id[$index];
            $homework->homework  = $homeworkText;
            $homework->save();
        }
        if ($request->studentId) {
            return redirect()->route('teacher.showGoalProcessForStudent', [
                'studentId' => $request->studentId,
            ]);
        }
        return redirect()->route('teacher.homework.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Homework $homework, int $homeworkId)
    {
        $homework    = Homework::with(['lesson.student.user', 'todo'])->findOrFail($homeworkId);
        $lesson      = $homework->lesson;
        $studentName = $homework->lesson->student->user->last_name . ' ' . $homework->lesson->student->user->first_name;
        $todo        = $homework->todo;
        return view('teacher.homework.show', compact(['homework', 'lesson', 'studentName', 'todo']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Homework $homework, int $homeworkId)
    {
        $userId = Auth::user()->id;

        $homework = Homework::findOrFail($homeworkId);
        $todos = Todo::where('is_achievement', 0)
            ->whereHas('goal.student.teacher', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->get();
        return view('teacher.homework.edit', compact(['homework', 'todos']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomeworkRequest $request, Homework $homework, int $homeworkId)
    {
        $homework = Homework::findOrFail($homeworkId);
        $homework->todo_id  = $request->todo_id;
        $homework->homework = $request->homework;
        $homework->save();
        return redirect()->route('teacher.homework.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Homework $homework, int $homeworkId)
    {
        $homework = Homework::findOrFail($homeworkId);
        $homework->delete();
        return redirect()->route('teacher.homework.index');
    }
}
