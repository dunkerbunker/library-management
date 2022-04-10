<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Borrower;
use Illuminate\Http\Request;

class BookIssueController extends Controller
{
    // load book issue page with search info
    public function index(Request $request)
    {
        $book_search = $request['book_search'] ?? '';
        if ($book_search != ''){
            $books = Book::where('book_title', 'like', '%'.$book_search.'%')->orWhere('ISBN', 'like', '%'.$book_search.'%')->orWhere('author', 'like', '%'.$book_search.'%')->get();
            $book = $books->first();
            if ($book != null){
                $book_title = $book->book_title;
                $ISBN = $book->ISBN;
            }
            else{
                $book_title = "No Book Found";
                $ISBN = "No ISBN Found";
            }
        }
        else{
            
            $book_title = "No Book Found";
            $ISBN = "No ISBN Found";
        }

        $borrower_search = $request['borrower_search'] ?? '';
        if ($borrower_search != ''){
            $borrowers = Borrower::where('borrower_name', 'like', '%'.$borrower_search.'%')->get();
            $borrower = $borrowers->first();
            if ($borrower != null){
                $borrower_name = $borrower->borrower_name;
            }
            else{
                $borrower_name = "No Borrower Found";
            }
        }
        else{
            $borrower_name = "No Borrower Found";
        }
        
        return view('admin.bookissue', compact('book_title', 'ISBN', 'book_search', 'borrower_name', 'borrower_search'));
    }
}
