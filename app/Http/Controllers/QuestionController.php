<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;


class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Questionnaire $questionnaire){
        return view('Question.create', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire){
        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required',
        ]);

//        $data['something'] = request()->get('something');

        $question = $questionnaire->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);

        return redirect('/questionnaires/'.$questionnaire->id);
    }
}
