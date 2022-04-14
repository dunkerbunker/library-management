<?php

namespace App\Http\Controllers;
use App\Models\Borrower;
use App\Models\Borrow;
use Illuminate\Http\Request;

class BookReturnController extends Controller
{
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
                // $books_borrowed = Borrow::join('books', 'borrow.book_id', '=', 'books.id')
                //                         ->where('borrow.borrower_id', '=', $id)
                //                         ->get(['books.ISBN', 'books.book_title','books.year' ,'books.author', 'books.publisher_name', 
                //                         'borrow.issue_date', 'borrow.due_date', 'borrow.late_return_status']);
            }
            else{
                $borrower_name = "No Borrower Found";
                $IC = "No IC Found";
            }
        }
        else{
            $borrower_name = "No Borrower Found";
            $IC = "No IC Found";
        }
        
        

        return view('admin.bookreturn', compact('borrower_name', 'borrower_search', 'IC'));
    }
}
