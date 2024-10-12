<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateToDoProgressRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\LMS\Todo;
use App\Models\LMS\Goal;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::with(['goal.student.user'])
            ->whereHas('goal', function ($query) {
                $query->whereHas('student', function ($query) {
                    $query->whereHas('teacher', function ($query) {
                        $query->where('user_id', Auth::user()->id);
                    });
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $studentName = [];
        foreach ($todos as $todo) {
            $studentNames[$todo->id] = $todo->goal->student->user->last_name . ' ' . $todo->goal->student->user->first_name;
        }
        return view('teacher.todos.index', compact(['studentNames', 'todos']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $goals = Goal::whereNull('achievement_date')->whereHas('student', function ($query) {
            $query->whereHas('teacher', function ($query) {
                $query->where('user_id', Auth::user()->id);
            });
        })
            ->get();
        return view('teacher.todos.create', compact('goals'));
    }

    /**
     * 目標が決まっているToDoの追加画面表示
     */
    public function createTodoForGoal(int $goalId)
    {
        $goal = Goal::with('student.user')->findOrFail($goalId);
        $studentName = $goal->student->user->last_name . $goal->student->user->first_name;
        $studentId = $goal->student_id;
        return view('teacher.todos.create-todo-for-goal', compact('studentId', 'studentName', 'goalId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        $todos = $request->input('todo');
        foreach ($todos as $item) {
            $todo = new Todo();
            $todo->goal_id = $request->goal_id;
            $todo->todo = $item;
            $todo->save();
        }
        if (isset($request->flag)) {
            $goal = Goal::findOrFail($request->goal_id);
            $studentId = $goal->student_id;
            return redirect()->route('teacher.showGoalProcessForStudent', compact('studentId'));
        }
        return redirect()->route('teacher.todos.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo, int $todoId)
    {
        $todo = Todo::with('goal')->findOrFail($todoId);
        $goal = $todo->goal;
        return view('teacher.todos.edit', compact('goal', 'todo'));
    }

    /**
     * Todo進捗編集（取り組み一覧画面から）
     */
    public function editTodoProgress(int $goalId)
    {
        $todos = Todo::with('goal.student.user')->where('goal_id', $goalId)->get();
        return view('teacher.todos.edit-todo-progress', compact('todos'));
    }

    /**
     * Todo進捗編集（現在取り組み画面から）
     */
    public function editTodoProgressFlag(int $goalId, $flag)
    {
        $todos = Todo::with('goal.student.user')->where('goal_id', $goalId)->get();
        return view('teacher.todos.edit-todo-progress', compact('todos', 'flag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo, int $todoId)
    {
        $todo = Todo::findOrFail($todoId);
        $todo->goal_id = $request->goal_id;
        $todo->todo = $request->todo;
        $todo->save();
        return redirect()->route('teacher.todos.index');
    }

    public function updateProgress(UpdateToDoProgressRequest $request)
    {
        $achievements = $request->input('is_achievement');

        $studentIds = collect();
        foreach ($achievements as $todoId => $isAchievement) {
            $todo = Todo::with('goal')->find($todoId);
            if ($todo) {
                $todo->is_achievement = $isAchievement;
                $todo->save();
                $studentIds->push($todo->goal->student_id);
            }
            $studentId = $studentIds->unique()->first();
        }
        if ($request->flag) {
            return redirect()->route('teacher.showGoalProcessForStudent', compact('studentId'));
        }
        return redirect()->route('teacher.progress', [
            'studentId' => $studentId,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo, int $todoId)
    {
        $todo = Todo::findOrFail($todoId);
        $todo->delete();
        return redirect()->route('teacher.todos.index');
    }
}
