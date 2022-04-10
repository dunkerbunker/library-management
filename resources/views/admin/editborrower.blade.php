@extends('layout.layout')
@section("title", "Borrower")
@section('content')
<div class="custom-shape-divider-bottom-1648996474">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
    </svg>
</div>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>
                        Edit Borrower
                        <a href = "{{ url('admin/borrowers') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ url('admin/borrowers/'.$borrower->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="name">Borrower's Name</label>
                                <input type="text" class="form-control" id="borrower_name" name="borrower_name" placeholder="Enter the Borrower's Name" value="{{ $borrower->borrower_name }}">
                                <span class="text-danger">@error('borrower_name'){{ $message }} @enderror</span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">IC</label>
                                <input type="text" class="form-control" id="IC" name="IC" placeholder="Enter the Borrower's IC" value="{{ $borrower->IC }}">
                                <span class="text-danger">@error('IC'){{ $message }} @enderror</span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Phone Number</label>
                                <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter the Borrower's Phone Number" value="{{ $borrower->phone_no }}">
                                <span class="text-danger">@error('phone_no'){{ $message }} @enderror</span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Address</label>
                                <textarea type="text" class="form-control" id="address" name="address" placeholder="Enter the Borrower's Address"  value="" rows="3">{{ $borrower->address }}</textarea>
                                <span class="text-danger">@error('address'){{ $message }} @enderror</span>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
        html, body {
        margin: 0;
        height: 100%;
        overflow: hidden
        }
       .card-header{
           background-color:  #4723D9;
       }
        .card-header h4{
              color: white;
         }
         .custom-shape-divider-bottom-1648996474 {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
        }

        .custom-shape-divider-bottom-1648996474 svg {
            position: relative;
            display: block;
            width: calc(168% + 1.3px);
            height: 346px;
        }

        .custom-shape-divider-bottom-1648996474 .shape-fill {
            fill: #4723D9;
        }
</style>

@endsection  