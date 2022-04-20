@extends('layout.layout')
@section("title", "Book Return")
@section('content')

<div class="container p-3">
    <div class="row">
        <div class="col-md-offset-1 col-md-12">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-sm-3 col-xs-12">
                            <h4 class="title p-0 mb-3">Find <span>Borrower</span></h4>
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <form class="" type="get" action="">
                                <div class="btn_group d-flex flew-row align-items-center justify-content-start">
                                    <input class="form-control" style="margin-right: 1rem;" type="search" name="borrower_search" id="borrower_search" placeholder="Search Borrowers By Name" value="{{$borrower_search}}"> 
                                    <button class="btn btn-outline-success my-2" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="autofill-group">
                            <label class="p-2" for="name">Borrower's Name</label>
                            <input class="form-control" id="name" style="margin-right: 1rem;" type="text" name="search" value="{{ $borrower_name }}" readonly="readonly"> 
                            <br><br>
                            <label class="p-2" for="IC">IC Number</label>
                            <input class="form-control" id="IC" style="margin-right: 1rem;" type="text" name="search" value="{{ $IC }}" readonly="readonly"> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container p-3">
    <div class="row">
        <div class="col-md-offset-1 col-md-12">
            @if (isset($books_borrowed))
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-sm-6 col-xs-12">
                            <h4 class="title">Choose <span>Book to Return</span></h4>
                        </div>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Select Book</th>
                                <th>Book Title</th>
                                <th>ISBN</th>
                                <th>Year</th>
                                <th>Author</th>
                                <th>Publisher</th>
                                <th>Issue Date</th>
                                <th>Due Date</th>
                                <th>Late Return Status</th>
                                <th>Late Fine</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books_borrowed as $books)
                            <tr>
                                <td  style="text-align:center;">
                                    <input form="all-submit" class="form-check-input" type="checkbox" value="{{$books->id}}" id="books_to_return[]" name="books_to_return[]">
                                </td>
                                <td>{{$books->book_title}}</td>
                                <td>{{$books->ISBN}}</td>
                                <td>{{$books->year}}</td>
                                <td>{{$books->author}}</td>
                                <td>{{$books->publisher_name}}</td>
                                <td>{{$books->issue_date}}</td>
                                <td>{{$books->due_date}}</td>
                                <!-- late return status -->
                                @if($books->late_return_status == 0)
                                    <td style="text-align:center;">No</td>
                                @else
                                    <td style="text-align:center;">Yes</td>
                                @endif
                                <!-- fines -->
                                @if($books->late_return_status == 0)
                                    <td style="text-align:center;">No</td>
                                @else
                                    <td style="text-align:center;"><a href="/admin/late-return" class="btn btn-danger">Pay Fines</a></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-12 p-3">
                        <form method="POST" id="all-submit" action="{{ route('admin.book-return.store') }}">
                            @csrf
                            <button class="btn btn-success m-0 position-relative" type="submit">Return</button>
                        </form>                            
                    </div>
                @else
                <div class="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-sm-6 col-xs-12">
                                <h4 class="title">No <span>Books to Return</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .btn_group{
        padding-top: 45px;
    }
    .demo{ font-family: 'Noto Sans', sans-serif; }
    .panel{
        background: #4723D9;
        padding: 0;
        border-radius: 10px;
        border: none;
        box-shadow: 0 0 0 5px rgba(0,0,0,0.05),0 0 0 10px rgba(0,0,0,0.05);
    }
    .panel .panel-heading{
        width: 100%;
        padding: 20px 15px;
        border-radius: 10px 10px 0 0;
        margin: 0;
    }
    .panel .panel-heading .title{
        color: #fff;
        font-size: 28px;
        padding-top: 10px;
        font-weight: 500;
        text-transform: capitalize;
        line-height: 40px;
        margin: 0;
    }
    .btn{
        color: rgba(255,255,255,1);
        background: transparent;
        font-size: 16px;
        text-transform: capitalize;
        border: 2px solid #fff;
        border-radius: 50px;
        transition: all 0.3s ease 0s;
    }
    .btn:hover{
        color:#4723D9;
        background: #fff;
    }
    .panel .panel-heading .form-control{
        color: #fff;
        background-color: transparent;
        height: 40px;
        border: 2px solid #fff;
        border-radius: 20px;
        display: inline-block;
        transition: all 0.3s ease 0s;
    }
    
    .panel .panel-heading .form-control::placeholder{
        color: rgba(255,255,255,0.5);
        font-size: 15px;
        font-weight: 500;
    }
    .panel .panel-body{ padding: 0; }
    .panel .panel-body .table thead tr th{
        color: #fff;
        background-color: rgba(255, 255, 255, 0.2);
        font-size: 16px;
        font-weight: 500;
        text-transform: uppercase;
        padding: 12px;
        border: none;
    }
    .panel .panel-body .table tbody tr td{
        color: #fff;
        font-size: 15px;
        padding: 10px 12px;
        vertical-align: middle;
        border: none;
    }
    .autofill-group{
        color: #fff;
    }
        
    @media only screen and (max-width:767px){
        .panel .panel-heading .title{
            text-align: center;
            margin: 0 0 10px;
        }
        .panel .panel-heading .btn_group{ text-align: center; }
    }


</style>
@endsection  