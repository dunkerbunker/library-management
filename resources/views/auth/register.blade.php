@extends('layout.register_login_layout')

@section('content')
<div class="container">
    <h2 class="title">Join Us!</h2>
    <div class="row justify-content-center align-content-center" style="min-height: 97vh;">
        <div class="col-md-11">
            <div class="login-box bg-white pl-lg-5 pl-0">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-6">
                        <div class="form-wrap bg-white">
                            <h4 class="btm-sep pb-3">Register</h4>
                            <form class="form" action="{{ route('auth.save') }}" method="post">

                            @if (Session::get('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @elseif (Session::get('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif

                            <br>

                            @csrf
                                <div class="row">

                                    <div class="col-12">
                                    <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                                        <div class="form-group position-relative">
                                            <span class="zmdi zmdi-account"></span>
                                            <input type="name" name="name" id="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                    <span class="text-danger">@error('staff_id'){{ $message }} @enderror</span>
                                        <div class="form-group position-relative">
                                            <span class="zmdi zmdi-star"></span>
                                            <input type="staff_id" name="staff_id" id="staff_id" class="form-control" placeholder="Staff ID" value="{{ old('staff_id') }}">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                    <span class="text-danger">@error('phone_no'){{ $message }} @enderror</span>
                                        <div class="form-group position-relative">
                                            <span class="zmdi zmdi-phone"></span>
                                            <input type="phone_no" name="phone_no" id="phone_no" class="form-control" placeholder="Phone Number" value="{{ old('phone_no') }}">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                    <span class="text-danger">@error('username'){{ $message }} @enderror</span>
                                        <div class="form-group position-relative">
                                            <span class="zmdi zmdi-android-alt"></span>
                                            <input type="username" name="username" id="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                                        <div class="form-group position-relative">
                                            <span class="zmdi zmdi-key"></span>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 mt-30">
                                        <button type="submit" id="submit" class="btn btn-lg btn-custom btn-dark btn-block">Create Account
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="content text-center">
                            <div class="border-bottom pb-5 mb-5">
                                <h3 class="c-black">Already have an account?</h3>
                            </div>
                            <div class="col-12 mt-30">
                                <form action="{{ route('auth.login') }}">
                                    <button type="submit" id="submit" class="btn btn-lg btn-custom btn-dark">Log-In
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .title{
        position: absolute;
        right: 44%;
        font-size: 50px;
        font-weight: bold;
        color: #FFF;
        padding-top: 90px;
    }
</style>
<script src="" async defer></script>
@endsection
    