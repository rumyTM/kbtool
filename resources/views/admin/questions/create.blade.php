@extends('layouts.app')

@section('title','Add Question')

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
                        <form action="{{ route('admin.questions.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input name="question" type="text"
                                       class="form-control @error('question') is-invalid @enderror"
                                       value="{{ old('question') }}"
                                       placeholder="Question...">
                                @error('question')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <textarea name="answer" class="form-control @error('answer') is-invalid @enderror"
                                          rows="5" placeholder="Answer...">{{ old('answer') }}</textarea>
                                @error('answer')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
