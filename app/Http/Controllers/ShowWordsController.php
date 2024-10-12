<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LMS\Word;
use App\Models\LMS\PartOfSpeech;

class ShowWordsController extends Controller
{
    /**
     * 単語検索トップ画面表示
     */
    public function index(Request $request)
    {
        $partOfSpeeches = PartOfSpeech::all();
        $search = $request->input('search');

        // 検索がある場合
        if (!empty($search)) {
            $words = Word::with('partOfSpeech')->where('en_word', '=', $search)->get();
            // 結果がない場合
            if ($words->isEmpty()) {
                $noResults = true;
            } else {
                $noResults = false;
            }
            return view('student.words.index', compact('words', 'partOfSpeeches', 'noResults'));
        }

        return view('student.words.index', compact('partOfSpeeches'));
    }
}
