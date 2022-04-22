<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
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
            $books = Book::where('book_title', 'like', '%'.$search.'%')->orWhere('ISBN', 'like', '%'.$search.'%')
            ->orWhere('author', 'like', '%'.$search.'%')->get();
        }else{
            $books = Book::all();
        }
        return view('admin.bookdetails', compact('books', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createbook');
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
            'book_title' => 'required',
            'ISBN' => 'required|unique:books|min:4|integer',
            'author' => 'required',
            'publisher_name' => 'required',
            'category' => 'required',
            'year' => 'required',
        ]);
        $books = new Book;
        $books->book_title = $request->input('book_title');
        $books->author = $request->input('author');
        $books->publisher_name = $request->input('publisher_name');
        $books->category = $request->input('category');
        $books->ISBN = $request->input('ISBN');
        $books->year = $request->input('year');
        $books->save();
        return redirect()->back()->with('success', 'Book Added Successfully');
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
        $book = Book::find($id);
        return view('admin.editbook', compact('book'));
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
            'book_title' => 'required',
            'ISBN' => 'required|integer',
            'author' => 'required',
            'publisher_name' => 'required',
            'category' => 'required',
            'year' => 'required',
        ]);
        $books = Book::find($id);
        $books->book_title = $request->input('book_title');
        $books->author = $request->input('author');
        $books->publisher_name = $request->input('publisher_name');
        $books->category = $request->input('category');
        $books->ISBN = $request->input('ISBN');
        $books->year = $request->input('year');
        $books->update();
        return redirect()->back()->with('success', 'Book Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $books = Book::find($id);
        $books->delete();
        return redirect()->back()->with('success', 'Book Deleted Successfully');
    }
}
