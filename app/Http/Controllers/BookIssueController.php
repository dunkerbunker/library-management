<?php

namespace App\Http\Controllers;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\Borrower;
use App\Models\LateReturn;
use Illuminate\Http\Request;

class BookIssueController extends Controller
{
    
    public function index(Request $request)
    {
        return view('admin.bookissue');
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_title' => 'required',
            'ISBN' => 'required',
            'borrower_name' => 'required',
            'issue_date' => 'required',
            'due_date' => 'required',
            
        ]);

        $borrow = new Borrow;

        $a = $request->input('borrower_name');
        $b = $request->input('ISBN');

        $borrower_id = Borrower::where('borrower_name', $a)->first()->id;
        $book_id = Book::where('ISBN', $b)->first()->id;

        $borrow->borrower_id = $borrower_id;
        $borrow->book_id = $book_id;

        $borrow->issue_date = $request->input('issue_date');
        $borrow->due_date = $request->input('due_date');

        // late return set 
        $due_date = \Carbon\Carbon::parse($request->input('due_date'));
        $today = \Carbon\Carbon::now();
        // getting difference between due date and today
        $result = $due_date->diffInDays($today, false);
        // late
        if ($result > 0) {
            $borrow->late_return_status = 1;
        } 
        // on time
        else {
            $borrow->late_return_status = 0;
        }
        $borrow->save();

        if ($result > 0){
            // fine
            $fine = $result * 5;
            $late_books = new LateReturn;
            $late_books->borrower_id = $borrow->borrower_id;
            $late_books->book_id = $borrow->book_id;
            $late_books->borrow_id = $borrow->id;
            $late_books->late_return_fines = $fine;
            $late_books->overdue_days = $result;
            $late_books->save();
        }

        return redirect()->back()->with('success', 'Book Borrowed Successfully');
    }
}

