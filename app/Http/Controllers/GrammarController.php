<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrammarRequest;
use App\Http\Requests\UpdateGrammarRequest;
use App\Models\LMS\Grammar;
use Illuminate\Http\Request;

class GrammarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Grammar::query();
        if (!empty($search)) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        }
        $grammars = $query->paginate(10);
        return view('admin.grammars.index', compact('grammars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.grammars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGrammarRequest $request)
    {
        $grammar = new Grammar();
        $grammar->name = $request->grammar_name;
        $grammar->save();
        return redirect()->route('admin.grammars.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grammar $grammar, int $grammarId)
    {
        $grammar = Grammar::findOrFail($grammarId);
        return view('admin.grammars.edit', [
            'grammar' => $grammar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGrammarRequest $request, Grammar $grammar, int $grammarId)
    {
        $grammar = Grammar::findOrFail($grammarId);
        $grammar->name = $request->grammar_name;
        $grammar->save();
        return redirect()->route('admin.grammars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grammar $grammar, int $grammarId)
    {
        $grammar = Grammar::findOrFail($grammarId);
        $grammar->delete();
        return redirect()->route('admin.grammars.index');
    }
}
