<?php

namespace App\Http\Controllers;
use App\Models\Borrower;
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
