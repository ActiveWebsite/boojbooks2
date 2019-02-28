@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @include('partials.status')

                <div class="card">
                    <div class="card-header">{{ $book->title }}</div>

                    <div class="card-body">
                        <p><b>Description</b></p>
                        <p>{{ $book->description }}</p>

                        <p><b>Publication Date</b></p>
                        <p>{{ $book->publication_date }}</p>

                        <p><b>Author</b></p>
                        <a href="{{ route('authors.show', $book->author) }}">{{ $book->author->name }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection