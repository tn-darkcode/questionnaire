@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1>{{$questionnaire->title}}</h1>

                <form action="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}" method="POST">
                    @csrf

                    @foreach($questionnaire->questions as $key => $question)
                        <div class="card">
                            <div class="card-header"><strong>{{$key + 1}} </strong>{{$question->question}}</div>
                            @error('responses.' .$key. '.answer_id')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                                    <label for="answer{{$answer->id}}">
                                        <li class="list-group-item">
                                            <input type="radio" name="responses[{{$key}}][answer_id]"
                                                   {{old('responses.' .$key. '.answer_id') == $answer->id ? 'checked' : ''}}
                                                   id="answer{{$answer->id}}" class="mr-2" value="{{$answer->id}}">
                                            {{$answer->answer}}

                                            <input type="hidden" name="responses[{{$key}}][question_id]" value="{{$question->id}}">
                                        </li>
                                    </label>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach

                <div class="card mt-4">
                    <div class="card-header">Your Information</div>

                    <div class="card-body">

                            <div class="mb-3">
                                <label for="name" class="form-label">name</label>
                                <input type="text" class="form-control" id="name" name="survey[name]"
                                       aria-describedby="name" value="{{old('survey.name')}}">
                                <div id="name" class="form-text">Enter Your Name</div>

                                @error('survey.name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">e-mail</label>
                                <input type="email" class="form-control" id="email" name="survey[email]"
                                       aria-describedby="email" value="{{old('survey.email')}}">
                                <div id="email" class="form-text">Your E-mail Please</div>

                                @error('survey.email')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                    </div>
                </div>


                <button type="submit" class="btn btn-dark">Complete Survey</button>
                </form>


            </div>
        </div>
    </div>
@endsection
