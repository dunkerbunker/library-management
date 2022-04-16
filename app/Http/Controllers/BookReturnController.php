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
        $books_borrowed = null;
        if ($borrower_search != ''){
            $borrowers = Borrower::where('borrower_name', 'like', '%'.$borrower_search.'%')->get();
            $borrower = $borrowers->first();

            if ($borrower != null){
                $borrower_name = $borrower->borrower_name;
                $IC = $borrower->IC;
                $id = $borrower->id;

                $borrow = Borrow::where('borrower_id', $id)->get();
                $due_date = \Carbon\Carbon::parse($borrow->first()->due_date);
                $today = \Carbon\Carbon::now();
                $result = $due_date->diffInDays($today, false);
                if ($result < 0) {
                    $borrow->late_return_status = 1;
                } else {
                    $borrow->late_return_status = 0;
                }
        
                $books_borrowed = Borrow::join('books', 'borrows.book_id', '=', 'books.id')
                                        ->join('borrowers', 'borrows.borrower_id', '=', 'borrowers.id')
                                        ->where('borrows.borrower_id', '=', $id)
                                        ->where('borrows.return_date', '=', null)
                                        ->get(['books.ISBN', 'books.book_title', 'books.year','books.author', 'books.publisher_name',
                                            'borrows.issue_date', 'borrows.due_date', 'borrows.late_return_status', 'borrows.id']);
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
        return view('admin.bookreturn', compact('borrower_name', 'borrower_search', 'IC', 'books_borrowed'));
    }

    public function store(Request $request){
        $books_to_return = $request->input('books_to_return');
        foreach ($books_to_return as $book_id){
            $borrow = Borrow::find($book_id);
            $borrow->return_date = date('Y-m-d');
            $borrow->save();
        }
        return redirect()->back()->with('success', 'Book Borrowed Successfully');
    }
}
