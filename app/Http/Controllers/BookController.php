<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Ensure you have this line to import the Book model

class BookController extends Controller
{
    public function index()
    {
        // Use paginate directly on the query
        $books = Book::paginate(5); // Fetch books with pagination, 4 books per page
    
        return view('books.index', compact('books')); // Pass the paginated books to the view
    }
    


    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:5',
            'author' => 'required|min:5',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index');

    }
    public function destroy($id)
{
    // Find the book by ID or fail with a 404 error if not found
    $book = Book::findOrFail($id);

    // Perform the deletion (soft delete if using SoftDeletes trait)
    $book->delete();

    // Redirect to the books index page with a success message
    return redirect()->route('books.index')->with('success', 'Book deleted successfully');
}
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|string|min:5',
            'author' => 'required|min:5',
        ]);
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect()->route('books.index')->with('success','book updated..');
    }
}
