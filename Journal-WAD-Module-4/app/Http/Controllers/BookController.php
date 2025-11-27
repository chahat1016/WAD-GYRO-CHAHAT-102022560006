<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // ===============1==============
    public function index()
    {
        $books = Book::latest()->get();
        return view('books.index', compact('books'));
    }

    // ===============2==============
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // ===============3==============
    public function create()
    {
        return view('books.create');   // correct view folder
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'isbn' => 'required|unique:books',
            'description' => 'required',
            'published_year' => 'required|integer|min:1800|max:' . date('Y'),
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        Book::create($validated);
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    // ===============4==============
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));   // correct view folder
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'isbn' => 'required|unique:books,isbn,' . $book->id,
            'description' => 'required',
            'published_year' => 'required|integer|min:1800|max:' . date('Y'),
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('cover_image')) {

            // delete old cover
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }

            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    // ===============5==============
    public function destroy(Book $book)
    {
        // delete image if exists
        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book successfully deleted!');
    }
}
