<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Borrower;
use App\Models\LateReturn;
use App\Models\User;
use PDF;

class LateReturnController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? '';
        if ($search != ''){
            $late_books = LateReturn::join('borrows', 'late_returns.borrow_id', '=', 'borrows.id')
                                        ->join('books', 'borrows.book_id', '=', 'books.id')
                                        ->join('borrowers', 'borrows.borrower_id', '=', 'borrowers.id')
                                        ->where('borrows.late_return_status', '=', 1)
                                        ->where('borrows.return_date', '=', null)
                                        ->where(function ($query) use ($search) {
                                            $query->where('borrowers.borrower_name', 'like', '%' . $search . '%')
                                                ->orWhere('borrowers.IC', 'like', '%' . $search . '%');
                                        })
                                        ->get(['borrowers.borrower_name', 'borrowers.IC', 'borrowers.phone_no' ,'books.ISBN', 'books.book_title', 'books.year','books.author', 'books.publisher_name',
                                            'borrows.issue_date', 'borrows.due_date', 'late_returns.late_return_fines', 'late_returns.id']);
        }else{
            $late_books = LateReturn::join('borrows', 'late_returns.borrow_id', '=', 'borrows.id')
                                                    ->join('books', 'borrows.book_id', '=', 'books.id')
                                                    ->join('borrowers', 'borrows.borrower_id', '=', 'borrowers.id')
                                                    ->where('borrows.late_return_status', '=', 1)
                                                    ->where('borrows.return_date', '=', null)
                                                    ->get(['borrowers.borrower_name', 'borrowers.IC', 'borrowers.phone_no' ,'books.ISBN', 'books.book_title', 'books.year','books.author', 'books.publisher_name',
                                                        'borrows.issue_date', 'borrows.due_date', 'late_returns.late_return_fines', 'late_returns.id']);
            
        }
        return view('admin.latereturn', compact('late_books', 'search'));
    }

    public function invoice($id){
        $late_return = LateReturn::find($id);
        $late_return->payment = $late_return ->late_return_fines;
        $late_return->date_of_payment = date('Y-m-d');
        $late_return->save();

        $a = $late_return->borrow_id;
        $borrow = Borrow::where('id', '=', $a)->first();
        $borrow->return_date = date('Y-m-d');
        $borrow->save();

        if (LateReturn::where('id', '=', $id)->exists()){
            $late_book = LateReturn::join('borrows', 'late_returns.borrow_id', '=', 'borrows.id')
                                        ->join('books', 'borrows.book_id', '=', 'books.id')
                                        ->join('borrowers', 'borrows.borrower_id', '=', 'borrowers.id')
                                        ->where('late_returns.id', '=', $id)
                                        ->get(['borrowers.borrower_name', 'borrowers.IC', 'borrowers.phone_no', 'borrowers.address' ,'books.ISBN', 'books.book_title',
                                             'late_returns.late_return_fines', 'late_returns.id', 'late_returns.payment']);

            $due_date = \Carbon\Carbon::parse($late_return->due_date);
            $today = \Carbon\Carbon::now();
            $overdue = $due_date->diffInDays($today, false);
            $today = date('Y-m-d');
            $time = date('H:i:s');
            $admin = ['LoggedUserInfo' => User::where('id', "=", session('LoggedUser'))->first()];

            $data = [
                'late_book' => $late_book,
                'overdue' => $overdue,
                'time' => $time,
                'today' => $today,
            ];
            
            // below line maybe marked as an error, it is NOT an error. The code works fine.
            $pdf = PDF::loadView('admin.invoice', $data, $admin);
    
            return $pdf->download('invoice.pdf');
            // return view('admin.invoice', compact('late_book', 'today', 'time', 'overdue', 'admin'));
        }
    }
}

