<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $title = "List of All Questions";

        $questions = Question::orderBy('question')->paginate(10);

        return view('questions.index', compact('title', 'questions'));
    }

    public function search(Request $request)
    {
        $question = $request->question;

        $questions = Question::whereRaw('MATCH (question, answer) AGAINST (? IN NATURAL LANGUAGE MODE)' , array($question))->paginate(10);
        $questions->appends(['question' => $question]);

        return view('questions.index', compact('question', 'questions'));
    }

    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }
}
