@extends('layouts.app')

@section('title','Home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="row justify-content-center mt-20p">
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

            </div>
        </div>
    </div>
@endsection
