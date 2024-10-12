<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowGrammarController extends Controller
{
    public function index()
    {
        return view('student.grammars.index');
    }
}
