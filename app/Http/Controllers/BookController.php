<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    public function show() {
        $books = Book::orderBy('id', 'desc')->get();
        
       // return view('books.show', ['books' => $books]);
       return view('book.show', compact('books'));
    }
    //
    public function store(Request $request) {
        // Logic to store a book would go here
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:books,slug',
        ]);
        $book = new Book();
        $book->title = $request->title;
        $book->slug = $request->slug;
        $book->slug = strtolower(str_replace(' ', '-', $request->slug));
        $book->save();
        return redirect()->route('book.create');
        
    }
    public function edit($id) {
       $book = Book::where('id', $id)->first();
         return view('book.edit', compact('book'));
    }
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:books,slug,'.$id,
        ]);
        $book = Book::find($id);
        $book->title = $request->title;
        $book->slug = $request->slug;
        $book->slug = strtolower(str_replace(' ', '-', $request->slug));
        $book->update();
        return redirect()->route('book.show');
    }
    public function delete($id) {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('book.show');
    }
}