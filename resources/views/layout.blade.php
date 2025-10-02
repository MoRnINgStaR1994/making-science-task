<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <nav class="mb-3">
        <a href="{{ route('authors.index') }}" class="btn btn-primary btn-sm">Authors</a>
        <a href="{{ route('books.index') }}" class="btn btn-primary btn-sm">Books</a>
    </nav>

    @yield('content')
</div>
</body>
</html>
