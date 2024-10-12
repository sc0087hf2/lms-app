<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LMS\Student;

class StudentPageController extends Controller
{
    /**
     * トップ画面表示
     */
    public function top()
    {
        $student = Student::with('user')->where('user_id', Auth::user()->id)->first();
        $studentInfo = $student->user;
        if ($student->getLatestLesson() === null) {
            return view('student.top', compact(['studentInfo', 'student']));
        }
        $lesson = $student->getLatestLesson();
        $homework = $lesson->homework;
        if (isset($student->getNonAchievementGoal)) {
            $goal = $student->getNonAchievementGoal;
            $todos = $student->getNonAchievementGoal->todos;
            return view('student.top', compact(['studentInfo', 'student', 'goal', 'todos', 'lesson', 'homework']));
        }
        return view('student.top', compact(['studentInfo', 'student', 'lesson', 'homework']));
    }

    /**
     * 進捗一覧表示
     */
    public function showProgress(int $studentId)
    {
        $student = Student::with('user', 'goals.todos')->findOrFail($studentId);
        $studentName = $student->user->last_name . $student->user->first_name;
        $goals = $student->goals()->orderBy('created_at', 'desc')->paginate(5);
        $todos = [];
        foreach ($goals as $goal) {
            $todos[$goal->id] = $goal->todos ? $goal->todos : [];
        }
        return view('student.progress', compact('student', 'studentName', 'goals', 'todos'));
    }

    /**
     * 授業一覧表示
     */
    public function showLessons(int $studentId)
    {
        $student = Student::with('user', 'lessons.homework')->findOrFail($studentId);
        $studentId = $student->id;
        $studentName = $student->user->last_name . ' ' . $student->user->first_name;
        $lessons = $student->lessons()->orderBy('next_lesson_date', 'desc')->paginate(5);
        $homework = [];
        foreach ($lessons as $lesson) {
            $homework[$lesson->id] = $lesson->homework;
        }
        return view('student.lessons', compact('studentId', 'studentName', 'lessons', 'homework'));
    }

    //動画一覧画面表示
    public function grammar()
    {
        return view('student.grammar');
    }

    //動画一覧画面表示
    public function movie()
    {
        return view('student.movie');
    }

    //作成中画面
    public function sorry()
    {
        return view('student.sorry');
    }
}
