<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreGoalRequest;
use App\Http\Requests\StoreGoalTodoRequest;
use App\Http\Requests\UpdateGoalRequest;
use App\Models\LMS\Goal;
use App\Models\LMS\Todo;

class GoalController extends Controller
{
    /**
     * 目標一覧表示
     */
    public function index()
    {
        $goals = Goal::with(['student.user'])
            ->whereHas('student', function ($query) {
                $query->whereHas('teacher', function ($query) {
                    $query->where('user_id', Auth::user()->id);
                });
            })
            ->paginate(10);
        $studentNames = [];
        foreach ($goals as $goal) {
            $studentNames[$goal->id] = $goal->student->user->last_name . ' ' . $goal->student->user->first_name;
        }
        return view('teacher.goals.index', compact(['studentNames', 'goals']));
    }

    /**
     * 目標の作成画面表示
     */
    public function create(int $studentId)
    {
        return view('teacher.goals.create', compact('studentId'));
    }

    /**
     * 目標・ToDoの作成画面表示
     */
    public function createGoalTodo(int $studentId)
    {
        return view('teacher.goals.create-goal-todo', compact('studentId'));
    }

    /**
     * 目標の保存処理
     */
    public function store(StoreGoalRequest $request)
    {
        $goal = new Goal();
        $goal->student_id      = $request->student_id;
        $goal->goal            = $request->goal;
        $goal->goal_background = $request->goal_background;
        $goal->goal_deadline   = $request->goal_deadline;
        $goal->save();
        return redirect()->route('teacher.showGoalProcessForStudent', [
            'studentId' => $goal->student_id,
        ]);
    }

    /**
     * 目標・ToDoの保存処理
     */
    public function storeGoalTodo(StoreGoalTodoRequest $request)
    {
        DB::transaction(function () use ($request) {
            //親テーブルGoalに値を保存
            $goal = new Goal();
            $goal->student_id      = $request->student_id;
            $goal->goal            = $request->goal;
            $goal->goal_background = $request->goal_background;
            $goal->goal_deadline   = $request->goal_deadline;
            $goal->save();
            //子テーブルToDoに値を保存
            $todos = $request->input('todo');
            foreach ($todos as $item) {
                $todoModel = new Todo();
                $todoModel->goal()->associate($goal);
                $todoModel->todo = $item;
                $todoModel->save();
            }
        });
        return redirect()->route('teacher.top');
    }

    /**
     * 目標編集画面表示
     */
    public function edit(Goal $goal, int $goalId)
    {
        $goal = Goal::findOrFail($goalId);
        return view('teacher.goals.edit', compact('goal'));
    }

    /**
     * 目標更新処理
     */
    public function update(UpdateGoalRequest $request, Goal $goal, int $goalId)
    {
        $goal = Goal::findOrFail($goalId);
        $goal->student_id      = $request->student_id;
        $goal->goal            = $request->goal;
        $goal->goal_background = $request->goal_background;
        $goal->goal_deadline   = $request->goal_deadline;
        $goal->teacher_comment = $request->teacher_comment;
        $goal->save();
        return redirect()->route('teacher.showGoalProcessForStudent', [
            'studentId' => $goal->student_id,
        ]);
    }

    /**
     * 目標達成処理
     */
    public function achieve(int $goalId)
    {
        $goal = Goal::findOrFail($goalId);
        $goal->achievement_date = Carbon::now();
        $goal->save();
        return redirect()->route('teacher.progress', [
            'studentId' => $goal->student_id,
        ]);
    }

    /**
     * 目標削除処理
     */
    public function destroy(Goal $goal, int $goalId)
    {
        $goal = Goal::findOrFail($goalId);
        $goal->delete();
        return redirect()->route('teacher.goals.index');
    }
}
