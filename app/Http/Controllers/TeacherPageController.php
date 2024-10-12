<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateStudentInfoRequest;
use App\Models\LMS\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LMS\Student;

class TeacherPageController extends Controller
{
    /**
     * トップ画面表示
     */
    public function top()
    {
        $students = Student::with(['user', 'teacher'])
            ->whereHas('teacher', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })
            ->get();
        $studentId = [];
        $studentNames = [];
        $lessons = [];
        $homework = [];
        foreach ($students as $student) {
            $studentNames[$student->id] = $student->user->last_name . ' ' . $student->user->first_name;
            $lessons[$student->id]      = $student->getLatestLesson();
            $homework[$student->id]     = $lessons[$student->id] ? $lessons[$student->id]->homework : [];
        }
        return view('teacher.top', compact(['students', 'studentNames', 'lessons', 'homework']));
    }

    /**
     * このアプリの説明ページ表示
     */
    public function about()
    {
        return view('teacher.about');
    }

    /**
     * 生徒ごとの目標プロセス表示
     */
    public function showGoalProcess(int $studentId)
    {
        // 生徒ごとの名前、取り組んでいる目標、ToDo、最新の授業情報、宿題を取得
        $student         = Student::with(['user', 'getNonAchievementGoal.todos'])->findOrFail($studentId);
        $studentName     = $student->user->last_name . ' ' . $student->user->first_name;
        $studentId       = $student->id;
        $goal            = $student->getNonAchievementGoal;
        $lesson          = $student->getLatestLesson();
        $todos           = [];
        $homework        = [];
        $todoForHomework = [];
        if ($goal) {
            $todos = $goal->todos;
        }
        if ($lesson !== null) {
            $homework = $lesson->homework;
            $todoForHomework = $homework->mapWithKeys(function ($work) {
                return [$work->id => $work->todo];
            });
        }

        // viewファイルに渡す
        if ($goal) {
            //目標あり
            return view('teacher.details.student', compact('studentName', 'studentId', 'goal', 'todos', 'lesson', 'homework', 'todoForHomework'));
        } else {
            // 目標なし、授業あり
            return view('teacher.details.student', compact('studentName', 'studentId', 'lesson', 'homework', 'todoForHomework'));
        }
    }

    /**
     * 生徒の進捗表示
     */
    public function showStudentProgress(int $studentId)
    {
        $student = Student::with('user', 'goals.todos')->findOrFail($studentId);
        $studentId = $student->id;
        $studentName = $student->user->last_name . $student->user->first_name;
        $goals = $student->goals->sortByDesc('created_at');
        $todos = [];
        foreach ($goals as $goal) {
            $todos[$goal->id] = $goal->todos ? $goal->todos : [];
        }
        return view('teacher.details.progress', compact('studentId', 'studentName', 'goals', 'todos'));
    }

    /**
     * 生徒ごとの授業一覧表示
     */
    public function showLessonsForStudent(int $studentId)
    {
        $student = Student::with('user', 'lessons.homework')->findOrFail($studentId);
        $studentId = $student->id;
        $studentName = $student->user->last_name . ' ' . $student->user->first_name;
        $lessons = $student->lessons;
        $homework = [];
        foreach ($lessons as $lesson) {
            $homework[$lesson->id] = $lesson->homework;
        }
        return view('teacher.details.lessons', compact('studentId', 'studentName', 'lessons', 'homework'));
    }

    /**
     * 生徒情報表示画面
     */
    public function showStudentInfo(int $studentId)
    {
        $student = Student::with(['user', 'teacher.user'])->findOrFail($studentId);
        $studentName = $student->user->last_name . ' ' . $student->user->first_name;
        $teacherName = $student->teacher->user->last_name . ' ' . $student->teacher->user->first_name;
        return view('teacher.details.student-info', compact('studentName', 'student', 'teacherName'));
    }

    /**
     * 生徒情報編集画面
     */
    public function editStudentInfo(int $studentId)
    {
        $student = Student::with('user')->findOrFail($studentId);
        $studentName = $student->user->last_name . ' ' . $student->user->first_name;
        return view('teacher.details.edit-student-info', compact('student', 'studentName'));
    }

    /**
     * 生徒情報更新処理
     */
    public function updateStudentInfo(UpdateStudentInfoRequest $request, int $studentId)
    {
        $student = Student::findOrFail($studentId);
        $student->guardian = $request->guardian;
        $student->phone_number = $request->phone_number;
        $student->school = $request->school;
        $student->school_year = $request->school_year;
        $student->desired_school = $request->desired_school;
        $student->save();
        return redirect()->route('teacher.showStudentInfo', [
            'studentId' => $student->id,
        ]);
    }
}
