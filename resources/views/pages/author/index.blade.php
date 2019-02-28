@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @include('partials.status')


                <div class="card">
                    <div class="card-header">Author List</div>

                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Birthday</th>
                                <th scope="col">Book Count</th>
                                <th scope="col">Biography</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($authors as $author)
                                <tr>
                                    <td><a href="{{ route('authors.show', $author) }}">{{ $author->name }}</a></td>
                                    <td>{{ $author->birthday }}</td>
                                    <td>{{ $author->books->count() }}</td>
                                    <td>{{ $author->biography }}</td>
                                    <td><a href="{{ route('authors.edit', $author) }}" class="btn btn-info btn-sm">Edit</a></td>
                                    <td>
                                        <form action="{{ route('authors.destroy', $author->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-danger btn-sm">Delete Author</button>
                                            <input type="hidden" name="_method" value="delete" />
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection