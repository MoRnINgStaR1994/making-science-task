@extends('layout')
@section('content')
    <h1>Edit Book</h1>
    <form method="POST" action="{{ route('books.update', $book) }}">
        @csrf
        @method('PUT')
        <div class="mb-2">
            <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>
        <div class="mb-2">
            <input type="number" name="year" class="form-control" value="{{ $book->year }}" required>
        </div>
        <div class="mb-2">
            <select name="status" class="form-control" required>
                <option value="available" @selected($book->status=='available')>Available</option>
                <option value="borrowed" @selected($book->status=='borrowed')>Borrowed</option>
            </select>
        </div>
        <div class="mb-2">
            <label>Authors</label>
            <select name="authors[]" class="form-control" multiple required>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" @selected($book->authors->contains($author->id))>{{ $author->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
@endsection
