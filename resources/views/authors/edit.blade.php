@extends('layout')
@section('content')
    <h1>Edit Author</h1>
    <form method="POST" action="{{ route('authors.update', $author) }}">
        @csrf
        @method('PUT')
        <input type="text" name="name" class="form-control mb-2" value="{{ $author->name }}" required>
        <button class="btn btn-primary">Update</button>
    </form>
@endsection
