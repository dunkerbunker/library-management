<?php

namespace App\Http\Controllers;
use App\Models\Borrower;
use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Http\Request;

class BookReturnController extends Controller
{
    public $table = 'borrows';
    // load book return page with search info
    public function index(Request $request)
    {
        $borrower_search = $request['borrower_search'] ?? '';
        if ($borrower_search != ''){
            $borrowers = Borrower::where('borrower_name', 'like', '%'.$borrower_search.'%')->get();
            $borrower = $borrowers->first();

            if ($borrower != null){
                $borrower_name = $borrower->borrower_name;
                $IC = $borrower->IC;
                $id = $borrower->id;
                $books_borrowed = Borrow::join('books', 'borrows.book_id', '=', 'books.id')
                                        ->join('borrowers', 'borrows.borrower_id', '=', 'borrowers.id')
                                        ->where('borrows.borrower_id', '=', $id)
                                        ->get(['books.ISBN', 'books.book_title', 'books.year','books.author', 'books.publisher_name',
                                            'borrows.issue_date', 'borrows.due_date', 'borrows.late_return_status']);
            }
            else{
                $borrower_name = "No Borrower Found";
                $IC = "No IC Found";
                $books_borrowed = null;
            }
        }
        else{
            $borrower_name = "No Borrower Found";
            $IC = "No IC Found";
            $books_borrowed = null;
        }
        return view('admin.bookreturn', compact('borrower_name', 'borrower_search', 'IC', 'books_borrowed'));
    }

    public function store(){
        
    }
}
