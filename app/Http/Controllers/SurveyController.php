<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;


class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Questionnaire $questionnaire, $slug){
        $questionnaire->load('questions.answers');
        return view('Survey.show', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire){
        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'survey.name' => 'required',
            'survey.email' => 'required|email'
        ]);

        $survey = $questionnaire->surveys()->create($data['survey']);
        $survey->responses()->createMany($data['responses']);

        return 'thanks';
    }
}
