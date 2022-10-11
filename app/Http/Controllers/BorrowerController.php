<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Http\Request;


class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? '';
        if ($search != ''){
            $borrowers = Borrower::where('borrower_name', 'like', '%'.$search.'%')->get();
        }else{
            $borrowers = Borrower::all();
        }
        foreach ($borrowers as $borrower){
            $borrower->load('borrows', 'borrows.book', 'borrows.lateReturn');
        }
        // for ($i=0; $i < count($borrowers); $i++) { 
        //     $borrowed_books[$i] = Borrower::join('borrows', 'borrows.borrower_id', '=', 'borrowers.id')
        //                 ->join('late_returns', 'late_returns.borrow_id', '=', 'borrows.id')
        //                 ->join('books', 'borrows.book_id', '=', 'books.id')
        //                 ->where('borrowers.id', '=', $borrowers[$i]->id)
        //                 ->get(['borrowers.id','books.book_title','books.year','books.author', 'books.publisher_name', 'books.ISBN', 'borrows.issue_date', 'borrows.return_date', 'late_returns.late_return_fines', 'late_returns.overdue_days']);
        // }
        
        return view('admin.borrowers', compact('borrowers', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createborrower');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'borrower_name' => 'required|string|max:255',
            'phone_no' => 'required|integer|min:7',
            'IC' => 'required|max:12|unique:borrowers',
        ]);
        $borrowers = new Borrower;
        $borrowers->borrower_name = $request->input('borrower_name');
        $borrowers->IC = $request->input('IC');
        $borrowers->phone_no = $request->input('phone_no');
        $borrowers->address = $request->input('address');
        $borrowers->save();
        return redirect()->back()->with('success', 'Borrower Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $borrower = Borrower::find($id);
        return view('admin.editborrower', compact('borrower'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'address' => 'required',
            'borrower_name' => 'required|string|max:255',
            'phone_no' => 'required|integer|min:7',
            'IC' => 'required|max:12',
        ]);
        $borrowers = Borrower::find($id);
        $borrowers->borrower_name = $request->input('borrower_name');
        $borrowers->IC = $request->input('IC');
        $borrowers->phone_no = $request->input('phone_no');
        $borrowers->address = $request->input('address');
        $borrowers->update();
        return redirect()->back()->with('success', 'Borrower Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrowers = Borrower::find($id);
        $borrowers->delete();
        return redirect()->back()->with('success', 'Borrower Deleted Successfully');
    }
}