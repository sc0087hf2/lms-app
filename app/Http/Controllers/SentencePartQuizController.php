<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSentencePartQuizRequest;
use App\Http\Requests\UpdateSentencePartQuizRequest;
use App\Models\LMS\SentencePartQuiz;
use App\Models\LMS\Grammar;
use App\Models\LMS\Reference;
use Illuminate\Http\Request;

class SentencePartQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $grammarId = $request->input('grammar_id');
        $referenceId = $request->input('reference_id');

        $query = SentencePartQuiz::query();

        if ($grammarId) {
            $query->whereHas('grammar', function ($q) use ($grammarId) {
                $q->where('id', $grammarId);
            });
        }

        if ($referenceId) {
            $query->whereHas('reference', function ($q) use ($referenceId) {
                $q->where('id', $referenceId);
            });
        }

        $quizzes = $query->with(['grammar', 'reference'])->paginate(10);
        $grammars = Grammar::all();
        $references = Reference::all();

        return view('admin.sentence_part_quizzes.index', [
            'quizzes' => $quizzes,
            'grammars' => $grammars,
            'references' => $references,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grammars = Grammar::all();
        $references = Reference::all();
        return view('admin.sentence_part_quizzes.create', [
            'grammars'   => $grammars,
            'references' => $references,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSentencePartQuizRequest $request)
    {
        $quiz = new SentencePartQuiz();
        $quiz->grammar_id = $request->grammar_id;
        $quiz->reference_id = $request->reference_id;
        $quiz->en_sentence = $request->en_sentence;
        $quiz->ja_sentence = $request->ja_sentence;
        $quiz->save();
        return redirect()->route('admin.sentencePartQuizzes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SentencePartQuiz $sentencePartQuiz, int $quizId)
    {
        $quiz = SentencePartQuiz::with(['grammar', 'reference'])->findOrFail($quizId);
        return view('admin.sentence_part_quizzes.show', [
            'quiz' => $quiz,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SentencePartQuiz $sentencePartQuiz, int $quizId)
    {
        $quiz = SentencePartQuiz::findOrFail($quizId);
        $grammars = Grammar::all();
        $references = Reference::all();
        return view('admin.sentence_part_quizzes.edit', [
            'quiz' => $quiz,
            'grammars' => $grammars,
            'references' => $references,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSentencePartQuizRequest $request, SentencePartQuiz $sentencePartQuiz, int $quizId)
    {
        $quiz = SentencePartQuiz::findOrFail($quizId);
        $quiz->grammar_id = $request->grammar_id;
        $quiz->reference_id = $request->reference_id;
        $quiz->en_sentence = $request->en_sentence;
        $quiz->ja_sentence = $request->ja_sentence;
        $quiz->save();
        return redirect()->route('admin.sentencePartQuizzes.show', ['quizId' => $quiz->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SentencePartQuiz $sentencePartQuiz, int $quizId)
    {
        $quiz = SentencePartQuiz::findOrFail($quizId);
        $quiz->delete();
        return redirect()->route('admin.sentencePartQuizzes.index');
    }
}
