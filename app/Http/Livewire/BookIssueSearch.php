<?php

namespace App\Http\Livewire;
use App\Models\Book;
use App\Models\Borrower;
use Illuminate\Http\Request;
use Livewire\Component;

class BookIssueSearch extends Component
{
    public $book_search;
    public $borrower_search;
    public $book_title;
    public $ISBN;
    public $borrower_name;



    public function booksearch(Request $request){
        $book_search = $this->book_search ?? '';
        if ($book_search != ''){
            $books = Book::where('book_title', 'like', '%'.$book_search.'%')->orWhere('ISBN', 'like', '%'.$book_search.'%')->orWhere('author', 'like', '%'.$book_search.'%')->get();
            $this->$book_search = $book_search;
            $book = $books->first();
            if ($book != null){
                $this->book_title = $book->book_title;
                $this->ISBN = $book->ISBN;
            }
            else{
                $this->book_title = "No Book Found";
                $this->ISBN = "No ISBN Found";
            }
        }
        else{
            
            $this->book_title = "No Book Found";
            $this->ISBN = "No ISBN Found";
        }

    }

    public function borrowersearch(Request $request){
        $borrower_search = $this->borrower_search ?? '';
        if ($borrower_search != ''){
            $borrowers = Borrower::where('borrower_name', 'like', '%'.$borrower_search.'%')->get();
            $this->$borrower_search = $borrower_search;
            $borrower = $borrowers->first();
            if ($borrower != null){
                $this->borrower_name = $borrower->borrower_name;
            }
            else{
                $this->borrower_name = "No Borrower Found";
            }
        }
        else{
            $this->borrower_name = "No Borrower Found";
        }
    }

    public function render()
    {
        return view('livewire.book-issue-search');
    }
}
