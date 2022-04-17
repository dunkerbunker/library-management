<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Borrower;

class LateReturnController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? '';
        if ($search != ''){
            $late_books = Borrow::join('books', 'borrows.book_id', '=', 'books.id')
                                        ->join('borrowers', 'borrows.borrower_id', '=', 'borrowers.id')
                                        ->where('borrows.late_return_status', '=', 1)
                                        ->where('borrows.return_date', '=', null)
                                        ->where(function ($query) use ($search) {
                                            $query->where('borrowers.borrower_name', 'like', '%' . $search . '%')
                                                ->orWhere('borrowers.IC', 'like', '%' . $search . '%');
                                        })
                                        ->get(['borrowers.borrower_name', 'borrowers.IC', 'borrowers.phone_no' ,'books.ISBN', 'books.book_title', 'books.year','books.author', 'books.publisher_name',
                                            'borrows.issue_date', 'borrows.due_date']);
            // late return set 
            $due_date = \Carbon\Carbon::parse($late_books->first()->due_date);
            $today = \Carbon\Carbon::now();
            // getting difference between due date and today
            $result = $due_date->diffInDays($today);
            // fine
            $fine = $result * 5;

        }else{
            $late_books = Borrow::join('books', 'borrows.book_id', '=', 'books.id')
                                        ->join('borrowers', 'borrows.borrower_id', '=', 'borrowers.id')
                                        ->where('borrows.late_return_status', '=', 1)
                                        ->where('borrows.return_date', '=', null)
                                        ->get(['borrowers.borrower_name', 'borrowers.IC', 'borrowers.phone_no' ,'books.ISBN', 'books.book_title', 'books.year','books.author', 'books.publisher_name',
                                            'borrows.issue_date', 'borrows.due_date']);
            // late return set 
            $due_date = \Carbon\Carbon::parse($late_books->first()->due_date);
            $today = \Carbon\Carbon::now();
            // getting difference between due date and today
            $result = $due_date->diffInDays($today);
            // fine
            $fine = $result * 5;
        }
        return view('admin.latereturn', compact('late_books', 'search', 'fine'));
    }

    public function invoice(){
        return view('admin.invoice');
    }
}
