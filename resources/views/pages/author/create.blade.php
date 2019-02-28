@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @include('partials.status')

                <div class="card">
                    <div class="card-header">Add Author</div>

                    <div class="card-body">
                        <form action="{{ route('authors.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Author Name">
                            </div>
                            <div class="form-group">
                                <label for="birthday">Birthday</label>
                                <input name="birthday" type="text" class="form-control" id="birthday"
                                       placeholder="YYYY-MM-DD Format">
                            </div>
                            <div class="form-group">
                                <label for="biography">Biography</label>
                                <textarea name="biography" class="form-control" id="biography" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection