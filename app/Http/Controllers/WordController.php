<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWordRequest;
use App\Http\Requests\UpdateWordRequest;
use App\Models\LMS\Word;
use App\Models\LMS\PartOfSpeech;
use Illuminate\Http\Request;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Word::with('partOfSpeech');
        if (!empty($search)) {
            $query->where('en_word', 'LIKE', '%' . $search . '%');
        }
        $words = $query->paginate(10);
        return view('admin.words.index', compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $partOfSpeeches = PartOfSpeech::all();
        return view('admin.words.create', [
            'partOfSpeeches' => $partOfSpeeches,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWordRequest $request)
    {
        $word = new Word();
        $word->part_of_speech_id = $request->part_of_speech_id;
        $word->en_word        = $request->en_word;
        $word->ja_word        = $request->ja_word;
        $word->en_example     = $request->en_example;
        $word->ja_example     = $request->ja_example;
        $word->save();
        return redirect()->route('admin.words.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Word $word, int $wordId)
    {
        $word = Word::findOrFail($wordId);
        return view('admin.words.show', [
            'word' => $word,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Word $word, int $wordId)
    {
        $word = Word::with('partOfSpeech')->findOrFail($wordId);
        $partOfSpeeches = PartOfSpeech::all();
        return view('admin.words.edit', [
            'word' => $word,
            'partOfSpeeches' => $partOfSpeeches,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWordRequest $request, Word $word, int $wordId)
    {
        $word = Word::findOrFail($wordId);
        $word->part_of_speech_id = $request->part_of_speech_id;
        $word->en_word        = $request->en_word;
        $word->ja_word        = $request->ja_word;
        $word->en_example     = $request->en_example;
        $word->ja_example     = $request->ja_example;
        $word->save();
        return redirect()->route('admin.words.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Word $word, int $wordId)
    {
        $word = Word::findOrFail($wordId);
        $word->delete();
        return redirect()->route('admin.words.index');
    }
}
