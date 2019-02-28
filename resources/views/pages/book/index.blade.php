@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('partials.status')

                <div class="card">
                    <div class="card-header">Book List</div>

                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Publication Date</th>
                                <th scope="col">Description</th>
                                <th scope="col">Page Count</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($books as $book)
                                <tr>
                                    <td><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></td>
                                    <td>{{ $book->author->name }}</td>
                                    <td>{{ $book->publication_date }}</td>
                                    <td>{{ $book->description }}</td>
                                    <td>{{ $book->pages }}</td>
                                    <td>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-danger btn-sm">Delete Book</button>
                                            <input type="hidden" name="_method" value="delete" />
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td>No books have been added.</td>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection