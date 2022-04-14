<?php

namespace App\Http\Controllers;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\Borrower;
use Illuminate\Http\Request;

class BookIssueController extends Controller
{
    
    public function index(Request $request)
    {
        return view('admin.bookissue');
    }

    public function store(Request $request)
    {
       

        $borrow = new Borrow;

        $a = $request->input('borrower_name');
        $b = $request->input('ISBN');
        $borrow->borrower_id = Borrower::where('borrower_name', $a)->first()->id;
        $borrow->book_id = Book::where('ISBN', $b)->first()->id;

        $borrow->issue_date = $request->input('issue_date');
        $borrow->due_date = $request->input('due_date');

        $borrow->save();

        return redirect()->back()->with('success', 'Book Borrowed Successfully');
    }
}

