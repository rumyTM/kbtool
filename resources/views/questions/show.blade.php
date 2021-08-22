@extends('layouts.app')

@section('title')
    {{ "QuestionAnswer - " . $question->question }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="row justify-content-center mb-3">
                    <div class="col-md-8">
                        <div class="pt-3 pb-4">
                            <form action="{{ route('search.questions') }}" method="GET">
                                <div class="input-group">
                                    <input type="search" name="question" class="form-control"
                                           placeholder="Enter question here..." required>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-success">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="search-item">
                            <h4 class="mb-1"><a
                                    href="{{ route('questions.show', $question) }}">{{ $question->question }}</a></h4>
                            <p class="mb-0 text-muted">{{ $question->answer }}</p>
                        </div>
                    </div>
                </div>

                @if(auth()->check() && auth()->user()->is_admin == true)
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('admin.questions.edit', $question) }}"
                           class="btn btn-primary">Edit</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
