@extends('layout')
@section('content')
    <h1>Add Author</h1>
    <form method="POST" action="{{ route('authors.store') }}">
        @csrf
        <input type="text" name="name" class="form-control mb-2" placeholder="Author Name" required>
        <button class="btn btn-success">Save</button>
    </form>
@endsection
