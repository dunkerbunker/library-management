@extends('layout.layout')
@section("title", "Book Issue")
@section('content')


@livewireStyles

<!-- content (1st and 2nd boxes) -->
@livewire('book-issue-search')
<!-- third box - user input and submit -->
<div class="container p-3">
    <div class="row">
        <div class="col-md-offset-1 col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-sm-3 col-xs-12">
                            <h4 class="title p-0 mb-3">Enter <span>Date</span></h4>
                        </div>
                        <div class="autofill-group">
                            <label class="p-2" for="Issue_date">Issue Date</label>
                            <input form="all-submit" class="form-control" id="issue_date" style="margin-right: 1rem;" type="date" name="issue_date" value="{{ old('issue_date') }}" >
                            <span class="text-danger">@error('issue_date'){{ $message }} @enderror</span>
                            <br><br>
                            <label class="p-2" for="due_date">Due Date</label>
                            <input form="all-submit" class="form-control" id="due_date" style="margin-right: 1rem;" type="date" name="due_date" value="{{ old('due_date') }}" >
                            <span class="text-danger">@error('due_date'){{ $message }} @enderror</span>
                        </div>
                        <div class="col col-sm-6 col-xs-12 pt-4">
                            <form method="POST" id="all-submit" action="{{ route('admin.book-issue.store') }}">
                                @csrf
                                <button class="btn btn-outline-success my-2" type="submit">Submit</button>
                            </form>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@livewireScripts


<!-- styles -->
<style>
    ::-webkit-calendar-picker-indicator { background-color: #fff; }
    .btn_group{
        padding-top: 45px;
    }
    .autofill-group{
        color: #fff;
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
    .inp{
        color: rgba(255,255,255,1);
        background: transparent;
        font-size: 16px;
        text-transform: capitalize;
        border: 2px solid #fff;
        border-radius: 50px;
        padding: 8px;
    }

</style>

@endsection