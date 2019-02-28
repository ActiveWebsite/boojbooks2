@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @include('partials.status')

                <div class="card">
                    <div class="card-header">{{ $author->name }}</div>

                    <div class="card-body">
                        <p><b>Birthday</b></p>
                        <p>{{ $author->birthday }}</p>

                        <p><b>Biography</b></p>
                        <p>{{ $author->biography }}</p>

                        <p><b>Books</b></p>
                        <ul>
                            @forelse($author->books as $book)
                                <li><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></li>
                            @empty
                                <li>{{ $author->name }} hasn't published any books.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection