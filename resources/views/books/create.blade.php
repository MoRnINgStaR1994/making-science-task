@extends('layout')
@section('content')
    <h1>Add Book</h1>
    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        <div class="mb-2">
            <input type="text" name="title" class="form-control" placeholder="Book Title" required>
        </div>
        <div class="mb-2">
            <input type="number" name="year" class="form-control" placeholder="Year" required>
        </div>
        <div class="mb-2">
            <select name="status" class="form-control" required>
                <option value="available">Available</option>
                <option value="borrowed">Borrowed</option>
            </select>
        </div>
        <div class="mb-2">
            <label>Authors</label>
            <select name="authors[]" class="form-control" multiple required>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Save</button>
    </form>
@endsection
