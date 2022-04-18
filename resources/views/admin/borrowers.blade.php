@extends('layout.layout')
@section("title", "Borrowers")
@section('content')

<div class="container panel-heading">
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
                      
            <div class="action-list flex-row align-items-end">
                <a href="{{ url('admin/borrowers/'.$borrower->id.'/edit') }}" data-tip="edit" class="btn mb-2" id="edit"><i class="fa fa-edit "></i></a>
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
                  books borrow
                </button>
              </h2>
              <div id="flush-collapse{{$borrower->id}}" class="accordion-collapse collapse" style="border: none;" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <div class="accordion-inner">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Book Name</th>
                          <th scope="col">Author</th>
                          <th scope="col">Borrow Date</th>
                          <th scope="col">Return Date</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>

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
