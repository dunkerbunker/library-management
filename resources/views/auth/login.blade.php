@extends('layout.register_login_layout')

@section('title', 'Login')

@section('content')
<div class="container">
    <h2 class="title">Welcome Back!</h2>
    <div class="row justify-content-center align-content-center" style="min-height: 97vh;">
        <div class="col-md-11">
            <div class="login-box bg-white pr-lg-5 pr-0">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-6">
                        <div class="content text-center">
                            <div class="border-bottom pb-5 mb-5">
                                <h3 class="c-black">Don't have an account?</h3>
                            </div>
                            <div class="col-12 mt-30">
                                <form action="{{ route('auth.register') }}">
                                    <button type="submit" id="submit" class="btn btn-lg btn-custom btn-dark">Register
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-wrap bg-white">
                            <h4 class="btm-sep pb-3">Log-In</h4>
                            <form class="form" action="{{ route('auth.check') }}" method="post">
                            
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
                            @method('get')
                            
                                <div class="row">
                                    <div class="col-12">
                                    <span class="text-danger">@error('username'){{ $message }} @enderror</span>
                                        <div class="form-group position-relative">
                                            <span class="zmdi zmdi-account"></span>
                                            <input type="username" name="username" id="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                                        <div class="form-group position-relative">
                                            <span class="zmdi zmdi-key"></span>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
                                        </div>
                                    </div>
                                    <div class="col-12 mt-30">
                                        <button type="submit" id="submit" class="btn btn-lg btn-custom btn-dark btn-block">Log-In
                                        </button>
                                    </div>
                                </div>
                            </form>
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
        right: 41%;
        font-size: 50px;
        font-weight: bold;
        color: #FFF;
        padding-top: 125px;
    }
</style>
<script src="" async defer></script>
@endsection