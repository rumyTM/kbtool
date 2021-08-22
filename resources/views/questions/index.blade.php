@extends('layouts.app')

@section('title')
    {{ $title ?? "Search Result Page - " . request()->question }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row justify-content-center mb-3">
                    <div class="col-md-8">
                        <div class="pt-3 pb-4">
                            <form action="{{ route('search.questions') }}" method="GET">
                                <div class="input-group">
                                    <input type="search" name="question" class="form-control" value="{{ request()->question }}"
                                           placeholder="Enter question here..." required>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-success">Search</button>
                                    </div>
                                </div>
                            </form>
                            @isset(request()->question)
                                <div class="mt-4 text-center">
                                    <h4>Search Results For "{{ request()->question }}"</h4>
                                </div>
                            @endisset
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @forelse($questions as $question)
                            <div class="search-item">
                                <h4 class="mb-1"><a
                                        href="{{ route('questions.show', $question) }}">{{ $question->question }}</a></h4>
                                <p class="mb-0 text-muted">{{ $question->answer }}</p>
                            </div>
                        @empty
                            <div class="mt-4 text-center">
                                <span class="text-muted">No Question Found!</span>
                            </div>
                        @endforelse

                        {{ $questions->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
