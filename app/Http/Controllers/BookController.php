<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/* Made controller with just book related functions.  An update function would need to be added also.  As of right now they can only create, read and delete. There would also need to be a way on the site to update the information.  The view does not contain a way to do this either, so that would need to be added. */

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function books()
    {
        $books = Book::all();

        return view('books', compact('books'));
    }

    public function addBook()
    {
        $book = new Book;
        $book->title = $_POST['title'];
        $book->author_id = $_POST['author_id'];
        $book->publication_date = $_POST['publication_date'];
        $book->description = $_POST['description'];
        $book->pages = $_POST['pages'];
        $book->save();

        session()->flash('status', 'Book Added!');
        return redirect('books');
    }

    public function deleteBook($book_id)
    {
        DB::table('books')->where('id', $book_id)->delete();

        session()->flash('status', 'Book Deleted!');
        return redirect('books');
    }
}