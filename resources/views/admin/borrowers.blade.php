@extends('layout.layout')
@section("title", "Borrowers")
@section('content')

<div class="container panel-heading">
@if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
    <div class="row">
        <div class="col col-sm-3 col-xs-12">
          <h1 class="title p-0 mb-3" style="color:#4723D9;" >Borrowers <span>List</span></h1>
        </div>
        
        <div class="col-sm-12 d-flex flex-row col-xs-12 text-right justify-content-between">
          <a href="{{ url('admin/borrowers/create') }}" id="add" class="btn btn.sm btn-primary">Add Borrower</a>
          <form class="" type="get" action="">
              <div class="btn_group d-flex flew-row align-items-center justify-content-start">
                  <input class="form-control rounded-pill" style="width: 800px;" type="search" name="search" placeholder="Search Borrowers By Name" value="{{$search}}">
                  <button class="btn btn.sm ms-2 btn-primary" type="submit">Search</button>
              </div>
          </form>
        </div>

        <div class="panel-body table-responsive">
        @foreach($borrowers as $borrower)
        <div class="p-4">
          <div class="d-flex py-4 justify-content-between">
            <div class="flex-column align-items-start" style="width: 100vh">
              <h2 class="p-2 m-0" style="color:#4723D9;">{{ $borrower->borrower_name }}</h2>
              <br>
              <p class="p-2 m-0"><span style="font-weight: bold;">IC Number: </span> {{ $borrower->IC }}</p>
              <p class="p-2 m-0"><span style="font-weight: bold;">Phone Number: </span>{{ $borrower->phone_no }}</p>
              <p class="p-2 m-0"><span style="font-weight: bold;">Address: </span>{{ $borrower->address }}</p>
            </div>
                      
            <div class="action-list d-flex flex-row align-items-start">
                <a href="{{ url('admin/borrowers/'.$borrower->id.'/edit') }}" data-tip="edit" class="btn me-2" id="edit"><i class="fa fa-edit "></i></a>
                <form action="{{ url('admin/borrowers/'.$borrower->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn trash px-3" id="trash"><i class="fa fa-trash"></i></button>
                </form>
            </div>
          </div>
          
          <div class="accordion" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$borrower->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                  Books Borrowed
                </button>
              </h2>
              <div id="flush-collapse{{$borrower->id}}" class="accordion-collapse collapse" style="border: none;" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body p-0 pt-4" style="width: 1248px">
                  <div class="accordion-inner">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">ISBN</th>
                          <th scope="col">Year</th>
                          <th scope="col">Title</th>
                          <th scope="col">Author</th>
                          <th scope="col">Publisher</th>
                          <th scope="col">Date borrowed</th>
                          <th scope="col">Date Returned</th>
                          <th scope="col">Overdue days</th>
                          <th scope="col">Fines</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                          @foreach ($borrower->borrows as $borrow)
                            <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>{{ $borrow->book?->ISBN }}</td>
                              <td>{{ $borrow->book?->year }}</td>
                              <td>{{ $borrow->book?->book_title }}</td>
                              <td>{{ $borrow->book?->author }}</td>
                              <td>{{ $borrow->book?->publisher_name }}</td>
                              <td>{{ $borrow->issue_date }}</td>

                              @if ($borrow->return_date == null)
                                <td>Not Returned</td>
                              @else
                                <td>{{ $borrow->return_date }}</td>
                              @endif

                              @if ($borrow->lateReturn?->overdue_days == null)
                                <td style="text-align:center;">0</td>
                              @else
                                <td style="text-align:center;">{{ $borrow->lateReturn?->overdue_days }} days</td>
                              @endif

                              @if ($borrow->lateReturn?->late_return_fines == null)
                                <td>No Fine</td>
                              @else
                                <td>{{ $borrow->lateReturn?->late_return_fines }} MVR</td>
                              @endif
                            </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        </div>
    </div>
</div>

<style>
  
    .accordion-body{
        width: 100vh;
    }
    .demo{ font-family: 'Noto Sans', sans-serif; }


    .btn{
        color: rgba(255,255,255,1);
        background:  #4723D9;
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
    #trash{
        color: #fff;
        border: unset;
        font-size: 24px;
        position: relative;
        z-index: 1;
        transition: all 0.3s ease 0s;
    }
    #edit{
      
        color: #fff;
        border: unset;
        font-size: 24px;
        position: relative;
        z-index: 1;
        transition: all 0.3s ease 0s;
    }
    #edit:hover{
      color:#4723D9;
        background: #fff;
    }
    #trash:hover{
      color:#4723D9;
        background: #fff;
    }
</style>

@endsection
