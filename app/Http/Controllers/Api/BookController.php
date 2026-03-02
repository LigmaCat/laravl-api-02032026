<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // List all books
    public function index()
    {
        return response()->json(Book::all());
    }

    // Create a new book
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'release_date' => 'required|date'
        ]);

        $book = Book::create($request->all());

        return response()->json($book, 201);
    }
    public function update(Request $request, $id){
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'book not found', 404]);
        }

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'author' => 'sometimes|required|string|max:255',
            'release_date' => 'sometimes|required|date'
        ]);

        $book->update($request->all());

        return response()->json($book);
    }

    public function destroy($id){
        $book = Book::find($id);
        if(!$book){
            return response()->json(['message' => 'Book bot found'], 404);
        }
         $book->delete();

         return response()->json(['message' => 'book deleted succsessfully']);
    }

}
