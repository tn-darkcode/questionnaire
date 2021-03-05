@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Question</div>

                    <div class="card-body">
                        <form action="/questionnaires/{{$questionnaire->id}}/questions" method="POST">
                            @csrf

                            <div class="mb-3">
                                <legend for="question" class="form-label">Question</legend>
                                <input type="text" class="form-control" id="question" name="question[question]"
                                       aria-describedby="question" value="{{old('question.question')}}">

                                @error('question.question')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                           <div class="form-group mt-5">
                               <fieldset>
                                   <legend>Choises</legend>

                                   <div>
                                       <div class="mb-3">
                                           <label for="answer1" class="form-label">Choise1</label>
                                           <input type="text" class="form-control" id="answer1" name="answers[][answer]"
                                                  aria-describedby="choicesHelp" placeholder="Enter Choise 1" value="{{old('answers.0.answer')}}">

                                           @error('answers.0.answer')
                                           <small class="text-danger">{{$message}}</small>
                                           @enderror
                                       </div>
                                   </div>

                                   <div>
                                       <div class="mb-3">
                                           <label for="answer2" class="form-label">Choise2</label>
                                           <input type="text" class="form-control" id="answer2" name="answers[][answer]"
                                                  aria-describedby="choicesHelp" placeholder="Enter Choise 2" value="{{old('answers.1.answer')}}">

                                           @error('answers.1.answer')
                                           <small class="text-danger">{{$message}}</small>
                                           @enderror
                                       </div>
                                   </div>

                                   <div>
                                       <div class="mb-3">
                                           <label for="answer3" class="form-label">Choise3</label>
                                           <input type="text" class="form-control" id="answer3" name="answers[][answer]"
                                                  aria-describedby="choicesHelp" placeholder="Enter Choise 3" value="{{old('answers.2.answer')}}">

                                           @error('answers.2.answer')
                                           <small class="text-danger">{{$message}}</small>
                                           @enderror
                                       </div>
                                   </div>

                                   <div>
                                       <div class="mb-3">
                                           <label for="answer4" class="form-label">Choise4</label>
                                           <input type="text" class="form-control" id="answer4" name="answers[][answer]"
                                                  aria-describedby="choicesHelp" placeholder="Enter Choise 4" value="{{old('answers.3.answer')}}">

                                           @error('answers.3.answer')
                                           <small class="text-danger">{{$message}}</small>
                                           @enderror
                                       </div>
                                   </div>
                               </fieldset>
                           </div>

                            <button type="submit" class="btn btn-primary">Add Question</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
