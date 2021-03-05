@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Questionnaire</div>

                    <div class="card-body">
                        <form action="/questionnaires" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       aria-describedby="title">
                                <div id="title" class="form-text">give your questionnaire a title</div>

                                @error('title')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="purpose" class="form-label">purpose</label>
                                <input type="text" class="form-control" id="purpose" name="purpose"
                                       aria-describedby="purpose">
                                <div id="purpose" class="form-text">give your questionnaire a purpose</div>

                                @error('purpose')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">create questionnaire</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
