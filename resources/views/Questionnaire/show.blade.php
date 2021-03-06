@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$questionnaire->title}}</div>

                    <div class="card-body">
                        <a class="btn btn-dark" href="{{$questionnaire->path()}}/questions/create">Create New
                            Question</a>
                        <a class="btn btn-dark"
                           href="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}">Take Survey</a>
                    </div>
                </div>

                @foreach($questionnaire->questions as $question)
                    <div class="card mb-5">
                        <div class="card-header">{{$question->question}}</div>

                        <ul class="list-group">
                            @foreach($question->answers as $answer)
                                <li class="list-group-item d-flex justify-content-between">{{$answer->answer}}
                                    @if($question->responses->count())
                                        <div>{{ intval(($answer->responses->count() * 100) / $question->responses->count()) }}
                                            %
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>

                        <form action="{{$questionnaire->path()}}/questions/{{$question->id}}" method="POST">
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="btn btn-small btn-outline-danger btn-block">DELETE</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
