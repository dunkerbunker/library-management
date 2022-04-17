<div>
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
</div>
<div class="container p-3">
    <div class="row">
        <div class="col-md-offset-1 col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-sm-3 col-xs-12">
                            <h4 class="title p-0 mb-3">Find <span>Book</span></h4>
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <form class="" wire:submit.prevent="booksearch" method="POST">
                                <div class="btn_group d-flex flew-row align-items-center justify-content-start">
                                    <input class="form-control" style="margin-right: 1rem;" type="search" wire:model="book_search" name="book_search" id="book_search" placeholder="Search Books By Name, ISBN, Author" value="{{$book_search}}"> 
                                    <button class="btn btn-outline-success my-2" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="autofill-group">
                            <label class="p-2" for="name">Book Title</label>
                            <input form="all-submit" class="form-control" id="book_title" style="margin-right: 1rem;" type="text" name="book_title" value="{{ $book_title }}" readonly="readonly">
                            <span class="text-danger">@error('book_title'){{ $message }} @enderror</span> 
                            <br><br>
                            <label class="p-2" for="age">ISBN</label>
                            <input form="all-submit" class="form-control" id="ISBN" style="margin-right: 1rem;" type="text" name="ISBN" value="{{ $ISBN }}" readonly="readonly"> 
                            <span class="text-danger">@error('ISBN'){{ $message }} @enderror</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Second box - find borrower name -->
<div class="container p-3">
    <div class="row">
        <div class="col-md-offset-1 col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-sm-3 col-xs-12">
                            <h4 class="title p-0 mb-3">Find <span>Borrower</span></h4>
                            @if ($borrower_name == "No Borrower Found")
                                <a href="" class="btn btn-outline-success my-2">Add Borrower</a>
                            @endif
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <form class="" wire:submit.prevent="borrowersearch" method="POST">
                                <div class="btn_group d-flex flew-row align-items-center justify-content-start">
                                    <input class="form-control" style="margin-right: 1rem;" type="search" wire:model="borrower_search" name="borrower_search" id="borrower_search" placeholder="Search Books By Name" value="{{$borrower_search}}"> 
                                    <button class="btn btn-outline-success my-2" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="autofill-group">
                            <label class="p-2" for="name">Borrower's Name</label>
                            <input form="all-submit" class="form-control" id="borrower_name" style="margin-right: 1rem;" type="text" name="borrower_name" value="{{ $borrower_name }}" readonly="readonly">
                            <span class="text-danger">@error('borrower_name'){{ $message }} @enderror</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
