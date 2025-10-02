@extends('layout')
@section('content')
    <h1>Authors</h1>
    <a href="{{ route('authors.create') }}" class="btn btn-success mb-2">Add Author</a>
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        @foreach($authors as $author)
            <tr>
                <td>{{ $author->name }}</td>
                <td>
                    <a href="{{ route('authors.edit', $author) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
