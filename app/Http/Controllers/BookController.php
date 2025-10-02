<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $searchTitle = $request->query('title');
        $searchAuthor = $request->query('author_id');

        $books = Book::when($searchTitle, function($query, $title) {
            $query->where('title', 'like', "%{$title}%");
        })
            ->when($searchAuthor, function($query, $authorId) {
                $query->whereHas('authors', function($q) use($authorId) {
                    $q->where('authors.id', $authorId);
                });
            })
            ->get();

        $authors = Author::all();

        return view('books.index', compact('books', 'authors'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer',
            'status' => 'required|in:available,borrowed',
            'authors' => 'required|array',
        ]);

        $book = Book::create($request->only('title', 'year', 'status'));
        $book->authors()->attach($request->authors);

        return redirect()->route('books.index')->with('success', 'Book created successfully!');
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $bookAuthors = $book->authors->pluck('id')->toArray();

        return view('books.edit', compact('book', 'authors', 'bookAuthors'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer',
            'status' => 'required|in:available,borrowed',
            'authors' => 'required|array',
        ]);

        $book->update($request->only('title', 'year', 'status'));
        $book->authors()->sync($request->authors);

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        $book->authors()->detach();
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}
