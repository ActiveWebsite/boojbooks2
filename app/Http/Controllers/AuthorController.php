<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/* Made controller with just author related functions.  An update function would need to be added also.  As of right now they can only create, read and delete.  There would also need to be a way on the site to update the information.  The view does not contain a way to do this either, so that would need to be added. */

class AuthorController extends Controller
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

    public function authors()
    {
        $authors = Author::all();

        return view('authors', compact('authors'));
    }

    public function addAuthor()
    {
        $author = new Author;
        $author->name = $_POST['name'];
        $author->birthday = $_POST['birthday'];
        $author->biography = $_POST['biography'];
        $author->save();

        session()->flash('status', 'Author Added!');
        return redirect('authors');
    }

    public function deleteAuthor($author_id)
    {
        DB::table('authors')->where('id', $author_id)->delete();

        session()->flash('status', 'Author Deleted!');
        return redirect('authors');
    }

}
