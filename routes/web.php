<?php

use App\Http\Controllers\GoalController;
use App\Http\Controllers\GrammarController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SentencePartQuizController;
use App\Http\Controllers\ShowGrammarController;
use App\Http\Controllers\ShowWordsController;
use App\Http\Controllers\StudentCommentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentPageController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherPageController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\WordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/practice-component', function () {
    return view('practice-component');
});

Route::get('/practice-layout', function () {
    return view('practice-layout');
});

require __DIR__ . '/auth.php';


//管理者権限ページ
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    //トップ画面
    Route::get('', function () {
        return view('admin.top');
    })->name('top');

    //先生CRUD画面
    Route::prefix('teachers')->controller(TeacherController::class)->name('teachers.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::post('{teacherId}/destroy', 'destroy')->name('destroy');
    });
    //生徒CRUD画面
    Route::prefix('students')->controller(StudentController::class)->name('students.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{studentId}/edit', 'edit')->name('edit');
        Route::post('{studentId}/update', 'update')->name('update');
        Route::post('{studentId}/destroy', 'destroy')->name('destroy');
    });

    //文法CRUD画面
    Route::prefix('grammars')->controller(GrammarController::class)->name('grammars.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{grammarId}/edit', 'edit')->name('edit');
        Route::post('{grammarId}/update', 'update')->name('update');
        Route::post('{grammarId}/destroy', 'destroy')->name('destroy');
    });

    //単語CRUD画面
    Route::prefix('words')->controller(WordController::class)->name('words.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{wordId}', 'show')->name('show');
        Route::get('{wordId}/edit', 'edit')->name('edit');
        Route::post('{wordId}/update', 'update')->name('update');
        Route::post('{wordId}/destroy', 'destroy')->name('destroy');
    });

    //並び替えクイズCRUD画面
    Route::prefix('sentencePartQuizzes')->controller(SentencePartQuizController::class)->name('sentencePartQuizzes.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{quizId}', 'show')->name('show');
        Route::get('{quizId}/edit', 'edit')->name('edit');
        Route::post('{quizId}/update', 'update')->name('update');
        Route::post('{quizId}/destroy', 'destroy')->name('destroy');
    });
});

//先生権限ページ
Route::prefix('teacher')->middleware(['auth', 'teacher'])->name('teacher.')->group(function () {
    //先生ページ管理
    Route::prefix('')->controller(TeacherPageController::class)->group(function () {
        //先生トップ
        Route::get('', 'top')->name('top');
        //このアプリについて
        Route::get('about-app', 'about')->name('about');
        //生徒トップ
        Route::get('{studentId}/progress', 'showStudentProgress')->name('progress');
        //目標・進捗管理一覧
        Route::get('{studentId}/show-goal-process', 'showGoalProcess')->name('showGoalProcessForStudent');
        //授業一覧
        Route::get('{studentId}/lessons', 'showLessonsForStudent')->name('showLessonsForStudent');
        //生徒個人情報
        Route::get('{studentId}/student-info', 'showStudentInfo')->name('showStudentInfo');
        //生徒個人情報編集
        Route::get('{studentId}/edit-student-info', 'editStudentInfo')->name('editStudentInfo');
        //生徒個人情報更新
        ROute::post('{studentId}/update-student-info', 'updateStudentInfo')->name('updateStudentInfo');
    });

    //目標CRUD画面
    Route::prefix('goals')->controller(GoalController::class)->name('goals.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{studentId}/create', 'create')->whereNumber('studentId')->name('create');
        Route::get('{studentId}/create-goal-todo', 'createGoalTodo')->name('createGoalTodo');
        Route::post('store', 'store')->name('store');
        Route::post('store-goal-todo', 'storeGoalTodo')->name('storeGoalTodo');
        Route::get('{goalId}/edit', 'edit')->name('edit');
        Route::post('{goalId}/update', 'update')->name('update');
        Route::post('{goalId}/achieve', 'achieve')->name('achieve'); //後で名前変える
        Route::post('{goalId}/destroy', 'destroy')->name('destroy');
    });

    //ToDo CRUD画面
    Route::prefix('todos')->controller(TodoController::class)->name('todos.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::get('{goalId}/create-todo-for-goal', 'createTodoForGoal')->whereNumber('goalId')->name('createTodoForGoal');
        Route::post('store', 'store')->name('store');
        Route::get('{todoId}/edit', 'edit')->name('edit');
        Route::get('{goalId}/edit-todo-progress', 'editTodoProgress')->whereNumber('goalId')->name('editTodoProgress');
        Route::get('{goalId}/edit-todo-progress/{flag}', 'editTodoProgressFlag')->whereNumber('goalId')->name('editTodoProgressFlag');
        Route::post('{todoId}/update', 'update')->name('update');
        Route::post('update-progress', 'updateProgress')->name('updateProgress');
        Route::post('{todoId}/destroy', 'destroy')->name('destroy');
    });

    //lesson
    Route::prefix('lessons')->controller(LessonController::class)->name('lessons.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{studentId}/create', 'create')->name('create');
        Route::get('{studentId}/createLessonHomework', 'createLessonHomework')->whereNumber(['studentId'])->name('createLessonHomework');
        Route::post('store', 'store')->name('store');
        Route::get('{lessonId}/edit', 'edit')->name('edit');
        Route::post('{lessonId}/update', 'update')->name('update');
        Route::post('{lessonId}/destroy', 'destroy')->name('destroy');
    });

    //Homework CRUD画面
    Route::prefix('homework')->controller(HomeworkController::class)->name('homework.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::get('{lessonId}/create', 'createHomeworkForLesson')->whereNumber('studentId')->name('createHomeworkForLesson');
        Route::post('store', 'store')->name('store');
        Route::get('{homeworkId}', 'show')->name('show');
        Route::get('{homeworkId}/edit', 'edit')->name('edit');
        Route::post('{homeworkId}/update', 'update')->name('update');
        Route::post('{homeworkId}/destroy', 'destroy')->name('destroy');
    });
});

//管理者権限ページ
Route::prefix('student')->middleware(['auth', 'student'])->name('student.')->group(function () {
    Route::prefix('')->controller(StudentPageController::class)->group(function () {
        Route::get('', 'top')->name('top');
        Route::get('{studentId}/progress', 'showProgress')->name('progress');
        Route::get('{studentId}/lessons', 'showLessons')->name('lessons');
        Route::get('movie', 'movie')->name('movie');
        Route::get('sorry', 'sorry')->name('sorry');
    });

    //コメント処理
    Route::prefix('comment')->controller(StudentCommentController::class)->name('comments.')->group(function () {
        Route::get('{lessonId}/add-lesson-comment', 'addLessonComment')->name('addLessonComment');
        Route::post('{lessonId}/store-lesson-comment', 'storeLessonComment')->name('storeLessonComment');
        Route::get('{lessonId}/edit-lesson-comment', 'editLessonComment')->name('editLessonComment');
        Route::post('{lessonId}/update-lesson-comment', 'updateLessonComment')->name('updateLessonComment');
        Route::get('{goalId}/add-goal-comment', 'addGoalComment')->name('addGoalComment');
        Route::post('{goalId}/store-goal-comment', 'storeGoalComment')->name('storeGoalComment');
        Route::get('{goalId}/edit-goal-comment', 'editGoalComment')->name('editGoalComment');
        Route::post('{goalId}/update-goal-comment', 'updateGoalComment')->name('updateGoalComment');
    });

    //単語ページ
    Route::prefix('words')->controller(ShowWordsController::class)->name('words.')->group(function () {
        Route::get('', 'index')->name('index');
    });

    //文法ページ
    Route::prefix('grammars')->controller(ShowGrammarController::class)->name('grammars.')->group(function () {
        Route::get('', 'index')->name('index');
    });
});
