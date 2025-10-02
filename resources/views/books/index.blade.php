@extends('layout')
@section('content')
    <h1>Books</h1>

    <form method="GET" class="mb-2 d-flex gap-2">
        <input type="text" name="title" placeholder="Search by title" value="{{ request('title') }}" class="form-control">
        <select name="author_id" class="form-control">
            <option value="">All Authors</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}" @selected(request('author_id') == $author->id)>{{ $author->name }}</option>
            @endforeach
        </select>
        <button class="btn btn-primary">Search</button>
    </form>

    <a href="{{ route('books.create') }}" class="btn btn-success mb-2">Add Book</a>

    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Year</th>
            <th>Status</th>
            <th>Authors</th>
            <th>Actions</th>
        </tr>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ ucfirst($book->status) }}</td>
                <td>
                    @foreach($book->authors as $author)
                        {{ $author->name }}@if(!$loop->last), @endif
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
