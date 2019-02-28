@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @include('partials.status')


                <div class="card">
                    <div class="card-header">Add Book</div>

                    <div class="card-body">
                        <form action="{{ route('books.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" type="text" class="form-control" id="title" placeholder="Book Title">
                            </div>
                            <div class="form-group">
                                <label for="author_id">Author</label>
                                <select name="author_id" class="form-control" id="author_id">
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="publication_date">Publication Date</label>
                                <input name="publication_date" type="text" class="form-control" id="publication_date" placeholder="YYYY-MM-DD Format">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="pages">Page Count</label>
                                <input name="pages" type="number" class="form-control" id="pages" placeholder="Enter a number only">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection