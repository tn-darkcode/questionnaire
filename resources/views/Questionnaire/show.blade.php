@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$questionnaire->title}}</div>

                    <div class="card-body">
                        <a class="btn btn-dark" href="/questionnaires/{{$questionnaire->id}}/questions/create">Create
                            New Question</a>
                    </div>
                </div>

                @foreach($questionnaire->questions as $question)
                    <div class="card">
                        <div class="card-header">{{$question->question}}</div>

                        <ul class="list-group">
                            @foreach($question->answers as $answer)
                            <li class="list-group-item">{{$answer->answer}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
