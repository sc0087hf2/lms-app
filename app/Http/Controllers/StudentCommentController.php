<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGoalCommentRequest;
use App\Http\Requests\StoreLessonCommentRequest;
use App\Http\Requests\UpdateGoalCommentRequest;
use App\Http\Requests\UpdateLessonCommentRequest;
use Illuminate\Http\Request;
use App\Models\LMS\Lesson;
use App\Models\LMS\Goal;
use App\Models\LMS\Student;

class StudentCommentController extends Controller
{
    /**
     * 授業コメント作成画面表示
     */
    public function addLessonComment(int $lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        return view('student.comments.add-lesson-comment', compact('lesson'));
    }

    /**
     * 授業コメント保存処理
     */
    public function storeLessonComment(StoreLessonCommentRequest $request, int $lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        $lesson->student_comment = $request->student_comment;
        $lesson->save();
        return redirect()->route('student.top');
    }

    /**
     * 授業コメント編集画面表示
     */
    public function editLessonComment(int $lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        return view('student.comments.edit-lesson-comment', compact('lesson'));
    }

    /**
     * 授業コメント更新処理
     */
    public function updateLessonComment(UpdateLessonCommentRequest $request, int $lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        $lesson->student_comment = $request->student_comment;
        $lesson->save();
        return redirect()->route('student.top');
    }

    /**
     * 取り組みに対するコメント作成画面表示
     */
    public function addGoalComment(int $goalId)
    {
        $goal = Goal::findOrFail($goalId);
        return view('student.comments.add-goal-comment', compact('goal'));
    }

    /**
     * 取り組みに対するコメントコメント保存処理
     */
    public function storeGoalComment(StoreGoalCommentRequest $request, int $goalId)
    {
        $goal = Goal::findOrFail($goalId);
        $goal->student_comment = $request->student_comment;
        $goal->save();
        $studentId = $goal->student_id;
        return redirect()->route('student.progress', compact('studentId'));
    }

    /**
     * 取り組みに対するコメントコメント編集画面表示
     */
    public function editGoalComment(int $goalId)
    {
        $goal = Goal::findOrFail($goalId);
        return view('student.comments.edit-goal-comment', compact('goal'));
    }

    /**
     * 取り組みに対するコメントコメント更新処理
     */
    public function updateGoalComment(UpdateGoalCommentRequest $request, int $goalId)
    {
        $goal = Goal::findOrFail($goalId);
        $goal->student_comment = $request->student_comment;
        $goal->save();
        $studentId = $goal->student_id;
        return redirect()->route('student.progress', compact('studentId'));
    }
}
