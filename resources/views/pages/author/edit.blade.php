@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @include('partials.status')

                <div class="card">
                    <div class="card-header">Edit Author</div>

                    <div class="card-body">
                        <form action="{{ route('authors.update', $author) }}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Author Name"
                                       value="{{ $author->name }}">
                            </div>
                            <div class="form-group">
                                <label for="birthday">Birthday</label>
                                <input name="birthday" type="text" class="form-control" id="birthday"
                                       placeholder="YYYY-MM-DD Format" value="{{ $author->birthday }}">
                            </div>
                            <div class="form-group">
                                <label for="biography">Biography</label>
                                <textarea name="biography" class="form-control" id="biography" rows="3">{{ $author->biography }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Author</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection