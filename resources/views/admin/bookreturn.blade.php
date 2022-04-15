@extends('layout.layout')
@section("title", "Book Return")
@section('content')

<div class="container p-3">
    <div class="row">
        <div class="col-md-offset-1 col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-sm-3 col-xs-12">
                            <h4 class="title p-0 mb-3">Find <span>Borrower</span></h4>
                        </div>
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
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
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-sm-12 col-xs-12">
                            <h4 class="title p-0 mb-3">Find <span>Book to Return</span></h4>
                        </div>
                        <div class="autofill-group">
                            @if (isset($books_borrowed))
                                @foreach($books_borrowed as $books)
                                <p>{{$books->book_title}}</p>
                                @endforeach
                            @endif
                            
                        </div>
                    </div>
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
    .panel .panel-heading .btn{
        color: rgba(255,255,255,1);
        background: transparent;
        font-size: 16px;
        text-transform: capitalize;
        border: 2px solid #fff;
        border-radius: 50px;
        transition: all 0.3s ease 0s;
    }
    .panel .panel-heading .btn:hover{
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
    .panel .panel-body .table tbody tr:nth-child(even){ background-color: rgba(255,255,255,0.05); }
    .panel .panel-body .table tbody .action-list{
        padding: 0;
        margin: 0;
        list-style: none;
    }
    .panel .panel-body .table tbody .action-list li{
        display: inline-block;
        margin: 0 5px;
    }
    .panel .panel-body .table tbody .action-list li a{
        color: #fff;
        font-size: 24px;
        z-index: 1;
        transition: all 0.3s ease 0s;
    }
    
    .panel .panel-body .table tbody .action-list li .trash{
        color: #fff;
        font-size: 24px;
        position: relative;
        z-index: 1;
        transition: all 0.3s ease 0s;
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